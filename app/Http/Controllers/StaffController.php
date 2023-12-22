<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Sample;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahUser = User::where('role', 'staff')->count();
        $data_pasien = Pasien::count();
        return view("staff.dashboard", compact('data_pasien'))->with('jumlahUser', $jumlahUser);
    }

    public function dataPasien(Request $request)
    {
        $data_pasien = Pasien::orderBy('id','desc')->Paginate(5);
        return view("staff.pasien",compact("data_pasien"));
    }

    public function create()
    {
        $pemeriksaans = Pemeriksaan::all();
        return view("staff.create",compact('pemeriksaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama"=> "required",
            "no_rm"=> "required",
            "jenis_kelamin"=> "required",
            "no_telpon"=> "required",
            "alamat"=> "required",
            // Menyatakan bahwa nilai bidang tersebut harus berupa sebuah array. Dalam konteks ini
            "pemeriksaans"=> "array",
            // Tanda asterisk (*) di sini adalah wildcard yang menunjukkan setiap elemen di dalam array.
            // exists:examinations,id: Menyatakan bahwa setiap nilai elemen dalam array examinations harus ada dalam tabel examinations di kolom id.
            //  Jika nilai yang diterima tidak ada dalam tabel, validasi akan gagal.
            "pemeriksaans.*"=> "exists:pemeriksaans,id",
        ]);

        $data_pasien = Pasien::Create([
            "nama"=> $request->nama,
            "no_rm"=> $request->no_rm,
            "jenis_kelamin"=> $request->jenis_kelamin,
            "no_telpon"=> $request->no_telpon,
            "alamat"=> $request->alamat,
        ]);
        // menambahkan status sample -> default(proses)
        $sample = new Sample (['status' => 'proses']);
        $data_pasien->samples()->save($sample);
        // menambah data pada tabel pivot
        $data_pasien->pemeriksaans()->attach($request->pemeriksaans);
        // dd(old('pemeriksaans'));

        return redirect()->route('staff pasien')->with('success', 'Data Berhasil Ditambahkan');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $data_pasien = Pasien::where('nama','LIKE','%'.$request->cari.'%')->Paginate(3);
        $searchNoRM = $request->input('search_no_rm');
        $searchNama = $request->input('search_nama');
        $searchDate = $request->input('search_date');

        $query = Pasien::query();

        if ($searchNoRM) {
            $query->where('no_rm', 'like', '%' . $searchNoRM . '%');
        }

        if ($searchNama) {
            $query->where('nama', 'like', '%' . $searchNama . '%');
        }

        if ($searchDate) {
            $query->whereDate('created_at', $searchDate);
        }

        $data_pasien = $query->Paginate(5);
        return view("staff.pasien",compact("data_pasien"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_pasien = Pasien::find($id);
        return view('staff.edit', compact('data_pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "nama"=> "required",
            "no_rm"=> "required",
            "jenis_kelamin"=> "",
            "no_telpon"=> "required",
            "alamat"=> "required",
            "tanggal_masuk"=> "required",
            // "pemeriksaan_status" => "",
            // "sample_status" => "",
        ]);
        $data_pasien = Pasien::find($id);
        $data_pasien->update($request->all());
        return redirect()->route('staff pasien')->with('success', 'Data Berhasil Di Edit');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pasien::find($id)->delete();
        return redirect()->route('staff pasien')->with('success', 'Data Berhasil Dihapus');
    }
}

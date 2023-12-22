<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahUser = User::where('role','dokter')->count();
        $data_pasien = Pasien::count();
        return view("dokter.dashboard", compact('data_pasien'))->with('jumlahUser', $jumlahUser);
    }

    public function dataPasien(){
        $data_pasien = Pasien::orderBy('id','desc')->Paginate(3);
        return view("dokter.pasien",compact("data_pasien"));
    }

    public function rujukan(){
        $pemeriksaan = Pemeriksaan::all();
        return view("dokter.rujukan", compact('pemeriksaan'));
    }


    public function detail($id)
    {
        //find post by ID
        $data_pasien = Pasien::with('pemeriksaans')->findOrFail($id);
        $pemeriksaan = $data_pasien->pemeriksaans;

        //return single post as a resource
        return view("dokter.detail", compact('data_pasien','pemeriksaan'));
    }

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

        $data_pasien = $query->Paginate(3);
        return view("dokter.pasien",compact("data_pasien"));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

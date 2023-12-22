<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan::orderBy('id','desc')->Paginate(5);
        return view("staff.pemeriksaan.pemeriksaan",compact("pemeriksaan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.pemeriksaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "type"=> "required",
            "satuan"=> "",
            "rujukan"=> "",
        ]);

        Pemeriksaan::Create([
            "type"=> $request->type,
            "satuan"=> $request->satuan,
            "rujukan"=> $request->rujukan,
        ]);

        return redirect()->route('staff pemeriksaan')->with('success', 'Data Berhasil Ditambahakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $pemeriksaan = Pemeriksaan::where('type','LIKE','%'.$request->cari.'%')->Paginate(5);
        return view("staff.pemeriksaan.pemeriksaan",compact("pemeriksaan"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        return view('staff.pemeriksaan.edit', compact('pemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "type"=> "required",
            "satuan"=> "nullable",
            "rujukan"=> "nullable",
        ]);

        $pemeriksaan = Pemeriksaan::find($id);
        $pemeriksaan->update($request->all());
        return redirect()->route('staff pemeriksaan')->with('success', 'Data Berhasil Di Edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemeriksaan::find($id)->delete();
        return redirect()->route('staff pemeriksaan')->with('success','Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Sample;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pasien = Pasien::with(['samples','pemeriksaans'])->Paginate(5);
        return view("staff.worklist.work",compact("data_pasien"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(Request $request)
    {
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
        return view("staff.worklist.work",compact("data_pasien"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_pasien = Pasien::findOrFail($id);
        $sample = $data_pasien->samples()->get();
        return view('staff.worklist.edit', compact(['data_pasien','sample']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data_pasien = Pasien::findOrFail($id);
        foreach ($data_pasien->samples as $sample) {
            $sample->update(['status' => $request->input('status')]);
        }
        // $sample = $data_pasien->samples()->get();
        // $sample->update([
        //     'status' => $request->input('status')
        // ]);
        
        $results = $request->input('result');

        // Simpan hasil pemeriksaan ke tabel pivot
        foreach ($results as $pemeriksaanId => $result) {
            $data_pasien->pemeriksaans()->updateExistingPivot($pemeriksaanId, ['result' => $result]);
        }

        return redirect()->route('staff work')->with('success', 'Hasil pemeriksaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

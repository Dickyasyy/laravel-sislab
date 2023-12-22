<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetakHasil($id){
        $data_pasien = Pasien::with('pemeriksaans')->findOrFail($id);
        $pemeriksaan = $data_pasien->pemeriksaans; // Sesuaikan dengan relasi antara Patient dan Examination;
        $pdf = PDF::loadView('staff.cetak', compact('data_pasien','pemeriksaan'));
        return $pdf->stream('staff.cetak.pdf');
    }

    public function cetakRujukan(Request $request)
    {
        $pengirim   = $request->input('pengirim');
        $nama       = $request->input('nama');
        $umur       = $request->input('umur');
        $jk         = $request->input('jk');
        $telpon     = $request->input('telpon');
        $alamat     = $request->input('alamat');
        $jenis      = $request->input('jenis');
        $asal       = $request->input('asal');
        $tgl        = $request->input('tgl');

        $selectedPemeriksaan = $request->input('pemeriksaans');
        // Mengambil informasi pemeriksaan yang dipilih
        $pemeriksaanData = Pemeriksaan::whereIn('id', $selectedPemeriksaan)->get();

        // Membuat file PDF
        $pdf = PDF::loadView('dokter.cetak', compact(
            'pengirim', 
            'nama',  
            'umur', 
            'jk',
            'telpon', 
            'alamat',
            'jenis',
            'asal',
            'tgl',
            'pemeriksaanData',
        ));

        // Mengembalikan respons PDF
        return $pdf->stream('dokter.cetak.pdf');
    }
}

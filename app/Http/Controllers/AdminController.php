<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $jumlahUser     = User::count();
        $jumlahStaff    = User::where('role', 'staff')->count();
        $jumlahDokter   = User::where('role', 'dokter')->count();
        $jumlahAdmin    = User::where('role', 'admin')->count();
        return view("admin.dashboard", compact('jumlahUser', 'jumlahStaff', 'jumlahDokter', 'jumlahAdmin'));     
    }

    public function dataPengguna(Request $request){
        $user = User::orderBy('id','desc')->Paginate(3);
        return view("admin.dataPengguna",compact("user"));
    }

    public function show(Request $request){
        $user = User::where('nama','LIKE','%'.$request->cari.'%')->Paginate(3);
        return view("admin.dataPengguna",compact("user"));
    }

    public function create(){
        return view("admin.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama"=> "required",
            "email"=> "required|email",
            "password"=> "required",
            "no_telpon"=>"required",
            "alamat"=>"required",
            "role" =>"required",
        ]);

            User::create([
            "nama"=> $request->nama,
            "email"=> $request->email,   
            "password"=> bcrypt($request->input('password')),
            "no_telpon"=> $request->no_telpon,   
            "alamat"=> $request->alamat,   
            "role"=> $request->role,   
        ]);

        return redirect()->route('pengguna')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('pengguna')->with('success','Data Berhasil Dihapus');
    }
}

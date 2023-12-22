@extends('layout.master')
@section('title','Rujukan')
@section('content')
    <div class="container">
        <form id="cetakForm" action="{{ route('dokter cetak') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pengirim">{{ __('Dokter Pengirim') }}</label>
                        <input id="pengirim" type="text" class="form-control" name="pengirim">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nama">{{ __('Nama Pasien') }}</label>
                        <input id="nama" type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telpon">{{ __('No. Telpon') }}</label>
                        <input id="telpon" type="text" class="form-control" name="telpon">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="alamat">{{ __('Alamat') }}</label>
                        <input id="alamat" type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="umur">{{ __('Umur') }}</label>
                        <input id="umur" type="text" class="form-control" name="umur">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>              
                </div>
            </div>
        </div>
        <!-- resources/views/input.blade.php -->
        <div class="card">
            <div class="card-body">
                <div class="spesimen mt-3">
                    <h1>Spesimen Rujukan</h1>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="jenis">{{ __('Jenis') }}</label>
                        <input id="jenis" type="text" class="form-control" name="jenis">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="asal">{{ __('Asal Bahan') }}</label>
                        <input id="asal" type="text" class="form-control" name="asal">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tgl">{{ __('tanggal Pengambilan Sample') }}</label>
                        <input id="tgl" type="date" class="form-control" name="tgl">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="spesimen mt-3">
                    <h1>Pemeriksaan Laboratorium</h1>
                </div>
                @foreach ($pemeriksaan as $cek)         
                <div class="form-row">
                    <div class="form-check col-md-6">
                        <input class="form-check-input" name="pemeriksaans[]" value="{{ $cek->id }}" style="position: relative; top: 0; left: 0; margin: 0;" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $cek->type }}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-sm mr-2">Cetak</button>
            <button type="reset" class="btn btn-primary btn-sm">Refresh</button>
        </div>
        </form>
    </div>
@endsection
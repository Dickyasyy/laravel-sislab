@extends('layout.master')
@section('title','Detail Data Pasien')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_rm">{{__("No RM")}}</label>
                        <input id="no_rm" type="text" class="form-control" style="color: black" name="no_rm" value="{{ $data_pasien->no_rm }}" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nama">{{__("Nama")}}</label>
                        <input id="nama" type="text" class="form-control" style="color: black" name="nama" value="{{ $data_pasien->nama }}" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="jenis_kelamin">{{__("Jenis Kelamin")}}</label>
                        <input id="jenis_kelamin" type="text" class="form-control" style="color: black" name="jenis_kelamin" value="{{ $data_pasien->jenis_kelamin }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_telepon">{{__("No Telepon")}}</label>
                        <input id="no_telepon" type="text" class="form-control" style="color: black" name="no_telepon" value="{{ $data_pasien->no_telpon }}" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="alamat">{{__("Alamat")}}</label>
                        <input id="alamat" type="text" class="form-control" style="color: black" name="alamat" value="{{ $data_pasien->alamat }}" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_periksa">{{__("Tanggal Periksa")}}</label>
                        <input id="tanggal_periksa" type="text" class="form-control" style="color: black" name="tanggal_periksa" value="{{ date("d F Y", strtotime($data_pasien->created_at)) }}" disabled>
                    </div>   
                </div>
            </div>
        </div>

        <div class="spesimen my-3">
            <h1>Pemeriksaan pasien</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Satuan</th>
                                <th>Hasil</th>
                                <th>Rujukan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pemeriksaan as $cek)
                            <tr>
                                <td>{{ $cek->type }}</td>
                                <td>{{ $cek->satuan }}</td>
                                <td>{{ $cek->pivot->result }}</td>
                                <td>{{ $cek->rujukan }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
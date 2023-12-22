@extends('layout.master')
@section('title','Pemeriksaan')
@section('content')

    <div class="container">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-6">
                <a href="{{route('create pemeriksaan')}}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <form action="{{route('show pemeriksaan')}}" method="GET">
                    <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="cari" class="form-control float-right" placeholder="Masukkan Nama">
                      {{-- Icon Search --}}
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Nilai Rujukan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaan as $cek)     
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$cek->type}}</td>
                            <td>{{$cek->satuan}}</td>
                            <td>{{$cek->rujukan}}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <a href="{{route('edit pemeriksaan', $cek->id)}}" class="btn btn-warning btn-sm mr-1 ">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('destroy pemeriksaan', $cek->id)}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" id="btn-hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </div>
                                </td>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>        
            </div>
        </div>
    </div>

@endsection
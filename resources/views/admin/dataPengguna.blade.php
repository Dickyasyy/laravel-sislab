@extends('layout.master')
@section('title','Data Pengguna')
@section('content')

<div class="container">
    <div class="row mb-3 d-flex justify-content-between">
        <div class="col-6">
            <a href="{{route('create pengguna')}}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <form action="{{route('show pengguna')}}" method="GET">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="cari" class="form-control float-right" placeholder="Cari Data">
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $pengguna)     
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$pengguna->nama}}</td>
                        <td>{{$pengguna->email}}</td>
                        <td>{{$pengguna->no_telpon}}</td>
                        <td>{{$pengguna->alamat}}</td>
                        <td>{{$pengguna->role}}</td> 
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-3 ">
                                <form action="/admin/pengguna/{{$pengguna->id}}" method="POST">
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
                {{-- paginate --}}
                <div class="d-flex justify-content-end">
                    {{ $user->links() }}
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection
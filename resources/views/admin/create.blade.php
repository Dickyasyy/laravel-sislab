@extends('layout.master')
@section('title','Tambah Data')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <a href="{{route('pengguna')}}" class="btn btn-primary">Kembali</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="card">
                <!-- /.card-header -->
                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('pengguna')}}">
                    @csrf
                  <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Nama" value="{{old('nama')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Password" value="{{old('password')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Phone</label>
                        <input type="text" name="no_telpon" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan No Phone" value="{{old('no_telpon')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Alamat" value="{{old('alamat')}}">
                    </div>  
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option  selected disabled>Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="Dokter">Dokter</option>
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
</div>
@endsection
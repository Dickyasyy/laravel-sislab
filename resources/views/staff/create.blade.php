@extends('layout.master')
@section('title','Tambah Data')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <a href="{{route('staff pasien')}}" class="btn btn-primary">Kembali</a>
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
                <form class="form-horizontal" method="POST" action="{{route('staff pasien')}}">
                    @csrf
                  <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Nama" value="{{old('nama')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No RM</label>
                        <input type="text" name="no_rm" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan No RM" value="{{old('no_rm')}}">
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control mb-2">
                            <option selected disabled>Jenis Kelamin</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
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
                    {{-- <div class="mb-3">
                      <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                      </div>
                    </div>  --}}
                    <div class="form-group">
                      <label for="pemeriksaans">Pemeriksaan</label>
                      @foreach ($pemeriksaans as $cek)
                        <div class="form-check">
                            <input class="form-check-input" style="position: relative; top: 0; left: 0; margin: 0;" name="pemeriksaans[]" type="checkbox" value="{{$cek->id}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$cek->type}}
                            </label>
                        </div>
                      @endforeach
                      {{-- <select name="pemeriksaans[]" multiple class="form-control">
                          @foreach ($pemeriksaans as $cek)
                              <option value="{{ $cek->id }}">{{ $cek->type }}</option>
                          @endforeach
                      </select> --}}
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
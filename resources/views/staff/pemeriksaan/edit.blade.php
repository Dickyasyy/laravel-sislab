@extends('layout.master')
@section('title','Edit Data')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <a href="{{route('staff pemeriksaan')}}" class="btn btn-primary">Kembali</a>
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
                <form class="form-horizontal" method="POST" action="{{route('update pemeriksaan', $pemeriksaan->id)}}">
                    @csrf
                    @method('put')
                  <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" name="type" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Nama" value="{{ $pemeriksaan->type }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Satuan" value="{{ $pemeriksaan->satuan }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nilai Rujukan</label>
                        <input type="text" name="rujukan" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Nilai Rujukan" value="{{ $pemeriksaan->rujukan }}">
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
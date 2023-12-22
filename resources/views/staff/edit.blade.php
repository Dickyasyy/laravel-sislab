@extends('layout.master')
@section('title','Edit Data')
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
                <form class="form-horizontal" method="POST" action="{{route('update pasien', $data_pasien->id)}}">
                    @csrf
                    @method('put')
                  <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Nama" value="{{ $data_pasien->nama }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">No RM</label>
                      <input type="text" name="no_rm" class="form-control" id="exampleFormControlInput1" 
                      placeholder="Masukkan No RM" value="{{ $data_pasien->no_rm }}">
                  </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control mb-2">
                            <option  selected disabled>{{ $data_pasien->jenis_kelamin }}</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Phone</label>
                        <input type="text" name="no_telpon" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan No Phone" value="{{ $data_pasien->no_telpon }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Masukkan Alamat" value="{{ $data_pasien->alamat }}">
                    </div> 
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                      <input type="date" name="tanggal_masuk" class="form-control" id="exampleFormControlInput1" value="{{ $data_pasien->tanggal_masuk }}" >
                  </div>

                    {{-- <div class="form-group row">
                      <label for="exampleFormControlInput1" class="form-label">Pemeriksaan Status</label>
                      <select name="pemeriksaan_status" class="form-control">
                          <option  selected disabled>{{ $data_pasien->pemeriksaan_status }}</option>
                          <option value="Proses">Proses</option>
                          <option value="Selesai">Selesai</option>
                          <option value="Ditolak">Ditolak</option>
                      </select>
                    </div>
                    <div class="form-group row">
                    <label for="exampleFormControlInput1" class="form-label">Sample Status</label>
                    <select name="sample_status" class="form-control">
                        <option  selected disabled>{{ $data_pasien->sample_status }}</option>
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                    </div>   --}}
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
@extends('layout.master')
@section('title','Update Hasil')
@section('content')

<div class="container">
    <div class="card">
        <div class="col-md-12">
            <br>
            <div class="card-header d-flex justify-content-between">
                <h3>Hasil Pemeriksaan Pasien {{ $data_pasien->nama }}</h3><hr>
                <a href="{{route('staff work')}}" class="btn btn-primary">Kembali</a>
            </div>
            <form action="{{ route('update hasil', $data_pasien->id) }}" method="post">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="status">Status:</label>
                    @foreach ($data_pasien->samples as $sample)
                    <select class="form-control" id="status" name="status">
                        <option value="proses" {{ $sample->status === 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $sample->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $sample->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @endforeach
                </div>

                <div class="card-body">
                    @foreach ($data_pasien->pemeriksaans as $pemeriksaan)
                    <div class="row mb-3">
                        <label for="result_{{ $pemeriksaan->id }}" class="col-md-2 col-form-label text-md-end" style="font-weight: bold;">{{ $pemeriksaan->type }} </label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.4);" name="result[{{ $pemeriksaan->id }}]" value="{{ $pemeriksaan->pivot->result }}" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Tampilkan formulir untuk setiap pemeriksaan --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layout.master')
@section('title','Work List')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('show hasil') }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="search_no_rm">{{ __('No. RM') }}</label>
                                    <input id="search_no_rm" type="text" class="form-control" name="search_no_rm">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="search_nama">{{ __('Nama') }}</label>
                                    <input id="search_nama" type="text" class="form-control" name="search_nama">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="search_date">{{ __('Tanggal') }}</label>
                                    <input id="search_date" type="date" class="form-control" name="search_date">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Refresh') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <th>No RM</th>
                            <th>tanggal Periksa</th>
                            <th>Sample</th>        
                            <th>Action</th>      
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pasien as $pasien)     
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$pasien->nama}}</td>
                            <td>{{$pasien->no_rm}}</td>
                            <td>{{date("d F Y", strtotime($pasien->created_at))}}</td>                
                            <td>
                                @foreach ($pasien->samples as $sample)
                                    @if($sample->status === 'Proses')
                                        <button class="btn btn-warning btn-sm">Proses</button>
                                    @elseif($sample->status === 'Selesai') 
                                        <button class="btn btn-success btn-sm">Selesai</button>
                                    @elseif($sample->status === 'Ditolak') 
                                        <button class="btn btn-danger btn-sm">Ditolak</button>
                                    @endif
                                @endforeach
                            </td>
                            {{-- <td>
                                @foreach ($pasien->pemeriksaans as $pemeriksaan)
                                <i class="fa-solid fa-circle fa-2xs"></i> {{$pemeriksaan->type}} <br>
                                @endforeach
                            </td> --}}
                            {{-- <td>
                                @foreach ($pasien->pemeriksaans as $pemeriksaan)
                                <label for="result_{{ $pemeriksaan->id }}">
                                    <input type="text" name="result[{{ $pemeriksaan->id }}]" value="{{ $pemeriksaan->pivot->result }}">
                                </label><br>
                                @endforeach
                            </td> --}}
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <a href="{{route('edit hasil', $pasien->id)}}" class="btn btn-warning btn-sm mr-1 ">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <a href="{{route('cetak hasil', $pasien->id)}}" class="btn btn-success btn-sm ">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </div>
                            </td>
                            {{-- <td>
                                @foreach ($pasien->pemeriksaans as $pemeriksaan)
                                <td>{{ $pemeriksaan->pivot->result}}</td>
                                @endforeach
                            </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                <div class="d-flex justify-content-end">
                    {{ $data_pasien->links() }}
                </div>      
            </div>
        </div>
    </div>

@endsection
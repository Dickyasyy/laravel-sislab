<!-- resources/views/cetak.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <div class="container d-flex justify-content-between">
        <h1 style="text-align: center">Formulir Permintaan Rujukan</h1>
        <div class="border border-1">
            <div class="left float-start border border-2 px-2 py-3" style="width: 40%">    
                <p>Dokter Pengirim      : {{ $pengirim }}</p>
                <p>Nama                 : {{ $nama }}</p>
                <p>Umur                 : {{ $umur }}</p>
                <p>Jenis Kelamin        : {{ $jk }}</p>
                <p>No Telpon            : {{ $telpon }}</p>
                <p>Alamat               : {{ $alamat }}</p>
            </div>
            <div class="right float-end border border-2 px-3 pt-3 pb-5" style="width: 50%">
                <p>Spesimen Rujukan</p>
                <p>Jenis                      : {{ $jenis }}</p>
                <p>Asal Bahan                 : {{ $asal }}</p>
                <p>Tanggal Pengambilan Sample : {{ date("d F Y", strtotime($tgl)) }}</p>
            </div>
        </div>
        <h3>Pemeriksaan Pasien:</h3>
            @foreach($pemeriksaanData as $cek)
                <p>{{$loop->iteration}} - {{ $cek->type }}</p>
            @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


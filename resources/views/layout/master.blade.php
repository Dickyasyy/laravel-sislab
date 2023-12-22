<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
	<title>EchoLab</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" href="{{ asset('Azzahra/assets/img/icon.svg') }}"/>

	<!-- Fonts and icons -->
	{{-- <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script> --}}
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	{{-- Sweet Alert --}}
	{{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}"> --}}

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('Azzahra/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('Azzahra/assets/css/azzara.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('Azzahra/assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.html" class="logo">
					<img src="{{asset('images/logo-laboratorium.png')}}" class="img-fluid" width="50px" alt="">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid d-flex justify-content-end">
					{{-- <div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> --}}
					<a class="btn btn-dark btn-rounded" href="{{ route('logout') }}"
            			onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						Keluar
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">	
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user d-flex justify-content-around align-items-center">
						
						<div style="user d-flex">
							<i class="fa-solid fa-user fa-2xl" style="color: #000000;"></i>
						</div>

						<div class="info d-flex flex-column">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span class="user-name">{{ Auth::user()->nama }}</span>
								
								<div class="d-flex justify-content-around align-items-center">
									<span class="user-level" style="color: #000000;">{{ Auth::user()->role}}</span>
									<i class="fa-solid fa-caret-down" style="color: #000000;"></i>
								</div>
							</a>

							<div class="collapse in" id="collapseExample" class="">
								<ul class="nav">
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						@if (auth()->user()->role == "admin")
						<li class="nav-item {{ url()->current() == route('admin.dashboard') ? 'active' : '' }}">
							<a href="{{route('admin.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@endif
						@if (auth()->user()->role == "staff")
						<li class="nav-item {{ url()->current() == route('staff.dashboard') ? 'active' : '' }}">
							<a href="{{route('staff.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@endif
						@if (auth()->user()->role == "dokter")
						<li class="nav-item {{ url()->current() == route('dokter.dashboard') ? 'active' : '' }}">
							<a href="{{route('dokter.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@endif
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
						{{-- <li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
						</li> --}}
						@if (auth()->user()->role == "admin")
						<li class="nav-item {{ url()->current() == route('pengguna') ? 'active' : '' }}">
							<a href="{{route('pengguna')}}">
								<i class="fa-solid fa-database"></i>
								<p>Data Pengguna</p>
							</a>
						</li>
						@endif
						@if (auth()->user()->role == "staff")
						<li class="nav-item {{ url()->current() == route('staff pasien') ? 'active' : '' }}">
							<a href="{{route('staff pasien')}}">
								<i class="fa-solid fa-person"></i>
								<p>Data Pasien</p>
							</a>
						</li>
						<li class="nav-item {{ url()->current() == route('staff work') ? 'active' : '' }}">
							<a href="{{route('staff work')}}">
								<i class="fa-solid fa-file-circle-check"></i>
								<p>Work List</p>
							</a>
						</li>
						<li class="nav-item {{ url()->current() == route('staff pemeriksaan') ? 'active' : '' }}">
							<a href="{{route('staff pemeriksaan')}}">
								<i class="fa-solid fa-flask-vial"></i>
								<p>Pemeriksaan</p>
							</a>
						</li>
						@endif
						@if (auth()->user()->role == "dokter")
						<li class="nav-item {{ url()->current() == route('dokter pasien') ? 'active' : '' }}">
							<a href="{{route('dokter pasien')}}">
								<i class="fa-solid fa-person"></i>
								<p>Data Pasien</p>
							</a>
						</li>
						<li class="nav-item {{ url()->current() == route('dokter rujukan') ? 'active' : '' }}">
							<a href="{{route('dokter rujukan')}}">
								<i class="fa-solid fa-truck-medical"></i>
								<p>Rujukan</p>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">@yield('title')</h4>
					</div>
					{{-- @include('component/pesan') --}}
					@include('sweetalert::alert')
					@yield('content')
				</div>
			</div>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
							<button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
							<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeMainHeaderColor" data-color="green"></button>
							<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
							<button type="button" class="changeMainHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
</div>

{{-- sweet alert --}}
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<!--   Core JS Files   -->
<script src="{{ asset('Azzahra/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('Azzahra/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('Azzahra/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('Azzahra/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('Azzahra/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('Azzahra/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('Azzahra/assets/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('Azzahra/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('Azzahra/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('Azzahra/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('Azzahra/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('Azzahra/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Toggle -->
<script src="{{ asset('Azzahra/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('Azzahra/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('Azzahra/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Google Maps Plugin -->
<script src="{{ asset('Azzahra/assets/js/plugin/gmaps/gmaps.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('Azzahra/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Azzara JS -->
<script src="{{ asset('Azzahra/assets/js/ready.min.js') }}"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="{{ asset('Azzahra/assets/js/setting-demo.js') }}"></script>
{{-- <script src="{{ asset('Azzahra/assets/js/demo.js') }}"></script> --}}
<script>
    $('#btn-hapus').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#32CD32',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>

{{-- <script>
    function cetak() {
        // Mengumpulkan data dari formulir
        let nama = document.getElementById('nama').value;
        let telpon = document.getElementById('no_telp').value;
        let alamat = document.getElementById('alamat').value;

		let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Menggunakan FormData untuk mengirim data formulir secara AJAX
        let formData = new FormData();
		formData.append('_token', csrfToken);
        formData.append('nama', nama);
        formData.append('no_telp', telpon);
        formData.append('alamat', alamat);

        // Menggunakan AJAX untuk mengirim data tanpa me-refresh halaman
        fetch("{{ route('dokter cetak') }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Mencetak data yang diterima
            printData(data);
        });
    }

    function printData(data) {
        // Membuat jendela popup untuk mencetak
        let printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Cetak Data</title></head><body>');
        printWindow.document.write('<h1>Data yang Akan Dicetak:</h1>');
        printWindow.document.write('<p>' + data + '</p>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        // Mencetak jendela popup
        printWindow.print();
    }
</script> --}}
</body>
</html>
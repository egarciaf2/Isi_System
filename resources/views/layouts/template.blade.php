<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!--=========================
    =            CSS            =
    ==========================-->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> --}}

     <!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('/vendor/adminlte/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('/vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/vendor/datatables/css/responsive.bootstrap4.min.css') }}">


    {{-- Datatables --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}



    <!--========================
    =            JS            =
    =========================-->
    <!-- jQuery -->
	<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>

	<!-- Bootstrap 4 -->
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- DataTables -->
	<script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('/vendor/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('/vendor/datatables/js/responsive.bootstrap4.min.js') }}"></script>

	<!-- AdminLTE App -->
	<script src="{{ asset('/vendor/adminlte/js/adminlte.min.js') }}"></script>
	 
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-success navbar-dark">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>

			<li class="nav-item d-none d-sm-inline-block">
		      <a href="inicio" class="nav-link text-white">Bienvenido {{ Auth::user()->name }}</a>
		    </li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<div class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ Auth::user()->name }}
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<button type="submit" class="dropdown-item">Salir</button>
					</form>
				</div>
			</div>
		</ul>
	</nav>

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
	  	<!-- Brand Logo -->
	  	<a href="{{ url('/') }}" class="brand-link">
	  		<img src="/img/logo4.png"
	  		alt="AdminLTE Logo"
	  		class="brand-image img-circle elevation-3"
	  		style="opacity: .8">
	  		<span class="brand-text font-weight-light">ISI Solutions</span>
	  	</a>

	  	<!-- Sidebar -->
	  	<div class="sidebar">
	  		<!-- Sidebar Menu -->
	  		<nav class="mt-2">
	  			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	  				<li class="nav-item">
	  					<a href="{{ route('empresa.index') }}" class="nav-link">
	  						{{-- <i class="nav-icon fas fa-th"></i> --}}
	  						<i class="nav-icon fas fa-building"></i>
	  						<p>
	  							Empresas
	  						</p>
	  					</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="{{ url('/') }}" class="nav-link">
	  						{{-- <i class="nav-icon fas fa-th"></i> --}}
	  						<i class="nav-icon fas fa-user-tie"></i>
	  						<p>
	  							Empleados
	  						</p>
	  					</a>
	  				</li>
	  			</ul>
	  		</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

  <div class="content-wrapper pt-4">
	    @yield('content')
  </div>

  <footer class="main-footer">
  	<div class="float-right d-none d-sm-block">
  		<b>Version</b> 3.0.5
  	</div>
  	<strong>Copyright &copy; 2021 <a href="https://www.linkedin.com/in/egarciaf2" target="_blank">Emilio Garcia</a>.</strong> All rights reserved.
  </footer>



  	{{-- Muestra gif cargando --}}
    <div id="divLoading"></div>

	{{-- Alerta Success --}}
	@if (session('status'))
		<script type="application/javascript">
			Swal.fire({
				title: 'Completado',
				text: '{{ session('message') }}',
				icon: 'success',
				confirmButtonText: 'OK',
				confirmButtonColor: '#17A2B8',
			})
		</script>
	@endif

	{{-- Alerta Error --}}
	@if (!session('status') and session('message') != null)
         <script type="application/javascript">
            Swal.fire({
                  title: 'Error',
                  text: '{{ session('message') }}',
                  icon: 'error',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#17A2B8',
                }) 
          </script>
    @endif

    {{-- Scripts --}}    
    @stack('scripts')

</body>
</html>
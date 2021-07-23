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

	{{-- SweetAlert --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	 
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

	<!-- Navbar -->
	@include('layouts._componentes._navbar')

	<!-- Menu Container -->
	@include('layouts._componentes._menu')

	<!-- Contenido Principal -->
	<div class="content-wrapper pt-4">
	    @yield('content')
	</div>

	<!-- Footer -->
	@include('layouts._componentes._footer')


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
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
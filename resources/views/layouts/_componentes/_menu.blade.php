<aside class="main-sidebar sidebar-dark-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="{{ url('/') }}" class="brand-link">
  		<img src="{{ asset('/img/logo.png') }}"
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
  					<a href="{{ route('empleado.index') }}" class="nav-link">
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
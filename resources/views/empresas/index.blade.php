@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card shadow card-success card-outline">
              <div class="card-header">
              	<div class="d-flex justify-content-between">
              		<h3 class="card-title mt-2">Empresas</h3>

                	<a href="{{ route('empresa.create') }}" class="btn btn-success">Nueva Empresa</a>
              	</div>
                
              </div>
              <div class="card-body">
						  	<div class=""> 
						  		{{-- table table-bordered table-striped dataTable dtr-inline collapsed --}}
						  		<table id="tblEmpresas" class="table table-striped table-hover dtr-inline dt-responsive">
						  			<caption>Lista de empresas</caption>
						  			<thead class="thead-dark|thead-light">
						  				<tr>
						  					<th>Logo</th>
						  					<th>Nombre</th>
						  					<th>Correo</th>
						  					<th>Web</th>
						  					<th class="text-center">Acciones</th>
						  				</tr>
						  			</thead>
						  			<tbody>

						  				<tr>
						  					<th>
						  						<img class="img-thumbnail align-middle" width="60" height="60" src="img/logo.png" alt="">
						  					</th>
						  					<td class="align-middle">ISI</td>
						  					<td class="align-middle">isi@isisolutions.com</td>
						  					<td class="align-middle">isisolutions.com</td>
						  					<td class="align-middle text-center">
						  						<div class='btn-group'>
						  							<button class="btn btn-warning btn-sm btnEditarCliente text-white" title="Editar Empresa">
						  								<i class="fas fa-pencil-alt"></i>
						  							</button>
						  							<button class="btn btn-danger btn-sm btnEliminarCliente">
						  								<i class="fas fa-trash-alt"></i>
						  							</button>
						  						</div>
						  					</td>
						  				</tr>

						  				<tr>
						  					<th>
						  						<img class="img-thumbnail align-middle" width="60" height="60" src="img/apple.png" alt="">
						  					</th>
						  					<td class="align-middle">apple</td>
						  					<td class="align-middle">apple@apple.com</td>
						  					<td class="align-middle">apple.com</td>
						  					<td class="align-middle  text-center">
						  						<div class='btn-group'>
						  							<button class="btn btn-warning btn-sm btnEditarCliente text-white">
						  								<i class="fas fa-pencil-alt"></i>
						  							</button>
						  							<button class="btn btn-danger btn-sm btnEliminarCliente">
						  								<i class="fas fa-trash-alt"></i>
						  							</button>
						  						</div>
						  					</td>
						  				</tr>

						  			</tbody>
						  		</table>
						  	</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>


@endsection

@push('scripts')
    <script src="js/empresas.js"></script>
@endpush
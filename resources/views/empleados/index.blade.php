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
              		<h3 class="card-title mt-2">Empleados</h3>

                	<button class="btn btn-success">Nuevo Empleado</button>
              	</div>
                
              </div>
              <div class="card-body">
				  	<div class=""> 
				  		{{-- table table-bordered table-striped dataTable dtr-inline collapsed --}}
				  		<table id="tblEmpleados" class="table table-striped table-hover dtr-inline dt-responsive" width="100%">
				  			<caption>Lista de Empleados</caption>
				  			<thead class="thead-dark|thead-light">
				  				<tr>
				  					<th>Nombre</th>
				  					<th>Empresa</th>
				  					<th>Correo</th>
				  					<th>Telefono</th>
				  					<th class="text-center">Acciones</th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  				<tr>
				  					<td class="align-middle">Emilio Garcia</td>
				  					<td class="align-middle">isisolutions</td>
				  					<td class="align-middle">isi@isisolutions.com</td>
				  					<td class="align-middle">23542354</td>
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
    <script src="js/empleados.js"></script>
@endpush
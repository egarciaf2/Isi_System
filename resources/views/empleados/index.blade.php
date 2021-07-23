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

                	<a href="{{ route('empleado.create') }}" class="btn btn-success">Nuevo Empleado</a>
              	</div>

              </div>
              <div class="card-body">
						  	<div class="">
						  		<table id="tblEmpleados" class="table table-striped table-hover dtr-inline dt-responsive" width="100%">
						  			<caption>Lista de Empleados</caption>
						  			<thead class="thead-dark|thead-light">
						  				<tr>
						  					<th>Nombre</th>
						  					<th>Empresa</th>
						  					<th>Correo</th>
						  					<th>telefono</th>
						  					<th class="text-center">Acciones</th>
						  				</tr>
						  			</thead>
						  			<tbody>
						  				@if (isset($empleados) and count($empleados) > 0)
								  				@foreach ($empleados as $empleado)
								  					<tr>
									  					<td class="align-middle">{{ ($empleado->nombre)? $empleado->nombre.' '.$empleado->apellido : '' }}</td>
									  					<td class="align-middle">{{ ($empleado->empresa->nombre)? $empleado->empresa->nombre : '' }}</td>
									  					<td class="align-middle">{{ ($empleado->email)? $empleado->email : '' }}</td>
									  					<td class="align-middle">{{ ($empleado->telefono)? $empleado->telefono : '' }}</td>
									  					<td class="align-middle text-center">
									  						<div class='btn-group'>
									  							<a href="{{ route('empleado.edit', $empleado) }}" class="btn btn-warning btn-sm text-white">
										  							<i class="fas fa-pencil-alt"></i>
										  						</a>

										  						    <form method="POST" action="{{ route('empleado.destroy', $empleado) }}" id="frmDeleteempleado{{$empleado->id}}">
																	    	@csrf
																	    	@method('DELETE')
																	    	<button type="button" class="btn btn-danger btn-sm" onclick="deleteEmpleado('frmDeleteempleado{{$empleado->id}}')">
																	    		<i class="fas fa-trash-alt"></i>
																	    	</button>

																	    </form>
									  									
									  								</a>
									  						</div>
									  					</td>
									  				</tr>
								  				@endforeach
							  			@endif	

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

    {{-- form utilizado para eliminar una empresa --}}



@endsection

@push('scripts')
    <script src="{{ asset('js/empleados.js') }}"></script>
@endpush

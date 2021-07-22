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
						  		<table id="tblEmpresas" class="table table-striped table-hover dtr-inline dt-responsive" width="100%">
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
						  				@foreach ($empresas as $empresa)
						  					<tr>
							  					<th>
							  						<img class="img-thumbnail align-middle" width="60" height="60" src="{{ ($empresa->logoTipo)?  '/showImg?ruta='.$empresa->logoTipo : asset(Config('constantes.img_default')) }}" alt="">
							  					</th>
							  					<td class="align-middle">{{ ($empresa->nombre)? $empresa->nombre : '' }}</td>
							  					<td class="align-middle">{{ ($empresa->email)? $empresa->email : '' }}</td>
							  					<td class="align-middle">{{ ($empresa->url)? $empresa->url : '' }}</td>
							  					<td class="align-middle text-center">
							  						<div class='btn-group'>
							  							<a href="{{ route('empresa.edit', $empresa) }}" class="btn btn-warning btn-sm text-white">
								  							<i class="fas fa-pencil-alt"></i>
								  						</a>

								  						    <form method="POST" action="{{ route('empresa.destroy', $empresa) }}" id="frmDeleteEmpresa{{$empresa->id}}">
															    	@csrf
															    	@method('DELETE')
															    	<button type="button" class="btn btn-danger btn-sm" onclick="deleteEmpresa('frmDeleteEmpresa{{$empresa->id}}')">
															    		<i class="fas fa-trash-alt"></i>
															    	</button>

															    </form>
							  									
							  								</a>
							  						</div>
							  					</td>
							  				</tr>
						  				@endforeach
						  				
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
    <script src="{{ asset('js/empresas.js') }}"></script>
@endpush
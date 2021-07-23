@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-7">
            <!-- Default box -->
            <div class="card shadow card-success card-outline">
              <div class="card-header">
              	<div class="d-flex justify-content-between">
              		<h3 class="card-title mt-2">Nuevo Empleado</h3>
              	</div>
                
              </div>
              <div class="card-body">
                <!-- Validation Errors -->
                    @if ($errors->any())
                       <div class="alert alert-danger mb-3 my-3">
                           <div class=" text-left">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 text-left">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                       </div>
                    @endif

              	<form method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data">
                  @csrf                  
              		<div class="row">
              			{{-- Info --}}
              			<div class="col-12">
              				<div class="row">
              					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              						<div class="form-group">
              							<label for="txtNombre">Nombre</label>
              							<input type="text" class="form-control" id="txtNombre" name="txtNombre" value="{{ old('txtNombre') }}" placeholder="Nombre de empleado">
              						</div>
              					</div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="txtApellido">Apellido</label>
                                        <input type="text" class="form-control" id="txtApellido" name="txtApellido" value="{{ old('txtApellido') }}" placeholder="Apellido de empleado">
                                    </div>
                                </div>
              					<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
              						<div class="form-group">
              							<label for="slcEmpresa">Empresa</label>
                                        <select name="slcEmpresa" id="slcEmpresa" class="form-control">
                                            <option value="">Seleccióne una empresa</option>
                                            @if (isset($empresas) and count($empresas) > 0)
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{ ($empresa->id)? $empresa->id : '' }}"
                                                        {{-- Selecciona la opcion anterior añadiendo selected --}}
                                                        {{ (old('slcEmpresa') ==  $empresa->id)? 'selected' : ''}}>
                                                        {{ ($empresa->nombre)? $empresa->nombre : '' }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
              						</div>
              					</div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="txtEmail">Correo</label>
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="{{ old('txtEmail') }}" placeholder="Ingrese correo electronico">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="txtTelefono">Teléfono</label>
                                        <input type="number" class="form-control" id="txtTelefono" name="txtTelefono" value="{{ old('txtTelefono') }}" min="8" placeholder="Ingrese telefono">
                                    </div>
                                </div>
              				</div>	

              			</div>	
              		</div>

              		<div class="d-flex justify-content-between mt-4">
              			<a href="{{ route('empleado.index') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-info">Registrar</button>
              		</div>
              	</form>
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
    <script src="{{ asset('js/empleados.js') }}"></script>
@endpush
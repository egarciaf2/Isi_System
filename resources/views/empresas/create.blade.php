@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
            <!-- Default box -->
            <div class="card shadow card-success card-outline">
              <div class="card-header">
              	<div class="d-flex justify-content-between">
              		<h3 class="card-title mt-2">Nueva Empresa</h3>
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

              	<form method="POST" action="{{ route('empresa.store') }}" enctype="multipart/form-data">
                  @csrf
                  
              		<div class="row">

              			{{-- Logo --}}
              			<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center mb-3">
              				<div class="form-group mb-3">
              					<label for="imgLogo">Logo Empresa</label>
              					<div class="custom-file">
              						<input type="file" class="custom-file-input uploadLogo" id="imgLogo" name="imgLogo" accept="image/*">
              						<label class="custom-file-label" for="imgLogo" data-browse="Buscar">Buscar Logo</label>
              					</div>
              				</div>
              				<img src="{{ asset(Config('constantes.img_default')) }}" id="vwNewImg" class="img-fluid" alt="" style="max-height: 400px;">
              			</div>

              			{{-- Info --}}
              			<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
              				<div class="row">
              					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              						<div class="form-group">
              							<label for="txtNombre">Nombre de Empresa</label>
              							<input type="text" class="form-control" id="txtNombre" name="txtNombre" value="{{ old('txtNombre') }}">
              						</div>
              					</div>
              					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              						<div class="form-group">
              							<label for="txtEmail">Correo</label>
              							<input type="email" class="form-control" id="txtEmail" name="txtEmail" value="{{ old('txtEmail') }}">
              						</div>
              					</div>
              					<div class="col-12">
              						<div class="form-group">
              							<label for="txtUrl">Url Web</label>
              							<input type="text" class="form-control" id="txtUrl" name="txtUrl" value="{{ old('txtUrl') }}">
              						</div>
              					</div>
              				</div>	

              			</div>	
              		</div>

              		<div class="d-flex justify-content-between mt-4">
              			<a href="{{ route('empresa.index') }}" class="btn btn-danger">Cancelar</a>
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
    <script src="{{ asset('js/empresas.js') }}"></script>
@endpush
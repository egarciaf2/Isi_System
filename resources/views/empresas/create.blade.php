@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-8">
            <!-- Default box -->
            <div class="card shadow card-success card-outline">
              <div class="card-header">
              	<div class="d-flex justify-content-between">
              		<h3 class="card-title mt-2">Nueva Empresa</h3>
              	</div>
                
              </div>
              <div class="card-body">
              	<form action="">
              		<div class="row">

              			{{-- Logo --}}
              			<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              				<div class="form-group mb-3">
              					<label for="imgLogo">Logo Empresa</label>
              					<div class="custom-file">
              						<input type="file" class="custom-file-input uploadPhoto" id="imgLogo" name="imgLogo" >
              						<label class="custom-file-label" for="imgLogo" data-browse="Buscar">Buscar Logo</label>
              					</div>
              				</div>
              				<img src="{{ asset('img/logo-default.jpg') }}" id="vwNewImg" class="img-fluid" alt="" style="max-height: 400px;">
              			</div>

              			{{-- Info --}}
              			<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
              				<div class="row">
              					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              						<div class="form-group">
              							<label for="txtNombre">Nombre</label>
              							<input type="text" class="form-control" id="txtNombre" name="txtNombre">
              						</div>
              					</div>
              					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              						<div class="form-group">
              							<label for="txtEmail">Correo</label>
              							<input type="email" class="form-control" id="txtEmail" name="txtEmail">
              						</div>
              					</div>
              					<div class="col-12">
              						<div class="form-group">
              							<label for="txtEmail">Url Web</label>
              							<input type="email" class="form-control" id="txtEmail" name="txtEmail">
              						</div>
              					</div>
              				</div>	

              			</div>	
              		</div>

              		<div class="d-flex justify-content-between mt-4">
              			<a href="{{ route('empresa.index') }}" class="btn btn-danger">Cancelar</a>
              			<a href="{{ route('empresa.store') }}" class="btn btn-info">Registrar</a>
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

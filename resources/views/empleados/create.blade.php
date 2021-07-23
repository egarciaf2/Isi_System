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
              	<form method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data">
                    @method('post')
                    @csrf                  
              		{{-- Mismo formulario reutilizado para editar y crear --}}
                    @include('empleados._form', ['btnText' => 'Registrar Empleado'])
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
@extends('layouts.template')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <!-- Default box -->
                <div class="card shadow card-success card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title mt-2">Detalle Empresa</h3>
                        </div>

                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <input type="hidden" id="idEmp" value="{{ (isset($empresa->id))? $empresa->id : '' }}">
                            {{-- Logo --}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center mb-3">
                                <div class="form-group mb-3">
                                    <label for="imgLogo">Logo Empresa</label>
                                </div>
                                   
                                <img src="{{ (isset($empresa->logoTipo))?  '/showImg?ruta='.$empresa->logoTipo : asset(Config('constantes.img_default')) }}" id="vwNewImg" class="img-fluid" alt="" style="max-height: 400px;">
                                </div>

                            {{-- Info --}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="txtNombre">Nombre de Empresa</label>
                                            <input readonly type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingresar Nombre " value="{{ (isset($empresa->nombre))? $empresa->nombre : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="txtEmail">Correo Electronico</label>
                                            <input readonly type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ingresar Correo Electronico" value="{{ (isset($empresa->email))? $empresa->email : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="txtUrl">Url Web</label>
                                            <input readonly type="text" class="form-control" id="txtUrl" name="txtUrl" placeholder="Ingresar Url ej. http://ejemplo.com" value="{{ (isset($empresa->url))? $empresa->url : '' }}">
                                        </div>
                                    </div>
                                </div>  
                                <hr class="py-2">

                                <h5>Empleados</h5>
                                <div class="border p-2">
                                    <table id="tblEmpresas" class="table table-striped table-hover dtr-inline dt-responsive" width="100%">
                                        <caption>Lista de Empleados</caption>
                                        <thead class="thead-dark|thead-light">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($empleados) and count($empleados) > 0)
                                                    @foreach ($empleados as $empleado)
                                                        <tr>
                                                            <td class="align-middle">{{ ($empleado->nombre)? $empleado->nombre.' '.$empleado->apellido : '' }}</td>
                                                            <td class="align-middle">{{ ($empleado->email)? $empleado->email : '' }}</td>
                                                            <td class="align-middle">{{ ($empleado->telefono)? $empleado->telefono : '' }}</td>
                                                        </tr>
                                                    @endforeach
                                            @endif  

                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('empresa.index') }}" class="btn btn-danger">Cerrar</a>
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
    <script src="{{ asset('js/empresas.js') }}"></script>
@endpush
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
                        <form method="POST" action="{{ route('empresa.store') }}" enctype="multipart/form-data" id="frmEmpresa">
                            @csrf
                            {{-- Mismo formulario reutilizado para editar y crear --}}
                            @include('empresas._form', ['btnText' => 'Registrar Empresa'])   

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
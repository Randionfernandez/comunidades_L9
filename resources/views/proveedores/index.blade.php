@extends('adminlte.layout')


@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Proveedores de esta comunidad</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Proveedores</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        <a class="btn btn-primary mr-2"
           href="{{ route('proveedores.create') }}">
            <i class="fa fa-plus"></i>  Crear proveedor
        </a>

        <button type="button" class="btn btn-primary pull-right" id="ayuda" data-toggle="modal" data-target="#help_proveedores">
            <i class="fa fa-info"></i> Ayuda
        </button>

        <!-- The Modal -->
        <div class="modal" id="help_proveedores">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ayuda</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        proveedores <b>blabla</b> blabla
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Continuar</button>
                    </div>

                </div>
            </div>
        </div>      <!-- the modal ayuda -->  

    </div>
</div>
@endsection



@section('content')
@forelse($proveedores as $proveedor)

@empty
No hay proveedores
@endforelse
@endsection


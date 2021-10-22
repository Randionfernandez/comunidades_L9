@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Listado de documentos de esta comunidad</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Documentos</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        <a class="btn btn-primary mr-2"
           href="{{ route('documentos.create') }}">
            <i class="fa fa-plus"></i>  Subir documento
        </a>

        <button type="button" class="btn btn-primary pull-right" id="ayuda" data-toggle="modal" data-target="#help_documentos">
            <i class="fa fa-info"></i> Ayuda
        </button>

        <!-- The Modal -->
        <div class="modal" id="help_documentos">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ayuda</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        documentos <b>blabla</b> blabla
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

@if (!count($documentos ))
<div class="alert alert-danger">@lang('No existe ningún documento todavía.')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('Carpeta')</th>
            <th>@lang('Título')</th>
            <th>@lang('Descrición')</th>
            <th>@lang('Nombre')</th>
            <th>@lang('Acción')</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($documentos as $model)
        <tr>
            <td>{{ $model->carpeta }}</td>
            <td>{{ $model->titulo}}</td>
            <td>{{ $model->descripcion }}</td>
            <td>{{ $model->name }}</td>

            <td class="flex border-2 text-center">

                <!-- Seleccionar comunidad -->
                <a class="btn btn-sm btn-success" href="{{ route('comunidades.edit',['comunidad' => $comunidad ])}}">
                    <span class="fa fa-check-circle"></span>
                </a>

            </td> 

        </tr>
        @empty
        <p>No hay ningún documento en esta comunidad.</p>
        @endforelse

    </tbody>
</table>

@endif

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });

    });
</script>
@endpush

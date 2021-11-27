@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Tus comunidades</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        @can('crear-comunidad')
        <a class="btn btn-primary mr-2"
           href="{{ route('comunidades.create') }}">
            <i class="fa fa-plus"></i>  Crear comunidad
        </a>
        @endcan

        <button type="button" class="btn btn-primary pull-right" id="ayuda" data-toggle="modal" data-target="#help_comunidades">
            <i class="fa fa-info"></i> Ayuda
        </button>

        <!-- The Modal -->
        <div class="modal" id="help_comunidades">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ayuda</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Blablabla <b>blabla</b> blabla
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

@if (!count( $comunidades ))
<div class="alert alert-danger">@lang('There are not communities created yet')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('CP')</th>
            <th>@lang('CIF')</th>
            <th>@lang('Activa')</th>
            <th>@lang('Gratuita')</th>
            <th>@lang('Denominación')</th>
            <th>@lang('Acción')</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($comunidades as $comunidad)
        <tr>
            <td>{{ $comunidad->cp }}</td> 
            <td>{{ $comunidad->cif }}</td>
            <td>@if ( $comunidad->activa ) @lang('Sí') @else @lang('No') @endif</td>
            <td>@if ( $comunidad->gratuita ) {{ __('Sí') }} @else {{ __('No') }} @endif</td>
            <td>{{ $comunidad->denom }}</td>

            <td class="flex border-2 text-center">

                <!-- Seleccionar comunidad -->
                <a class="btn btn-sm btn-success" href="{{ route('comunidades.seleccionar',['comunidad' => $comunidad ])}}">
                    <span class="fa fa-check-circle"></span>
                </a>

            </td> 

        </tr>
        @endforeach

    </tbody>
</table>

@endif

@endsection

<!--@section('datatables')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable();
    });
</script>
@endsection-->

@push('scripts')
<script>
    $(document).ready(function () {
//    $(function () {
//        $('#tcmd').DataTable({
//            "responsive": true,
//            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
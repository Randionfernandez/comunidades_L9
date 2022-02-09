@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Propiedades de esta comunidad</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Propiedades</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        <a class="btn btn-primary mr-2"
           href="{{ route('propiedades.create') }}">
            <i class="fa fa-plus"></i>  Crear propiedad
        </a>

        <x-ayuda>
            {{__('help.propiedades')}}    
        </x-ayuda>

    </div>
</div>
@endsection



@section('content')

@if (!count( $propiedades ))
<div class="alert alert-danger">@lang('No existe ninguna propiedad todavía.')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('parte')</th>
            <th>@lang('Tipo')</th>
            <th>@lang('Denominación')</th>
            <th>@lang('Coef.prop.')</th>
            <th>@lang('Ver')</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($propiedades as $item)
        <tr>
            <td>{{ $item->parte }}</td>
            <td>{{ $item->tipo }}</td>
            <td>{{ $item->denominacion }}</td>
            <td>{{ $item->coeficiente }}</td>

            <td class="flex border-2 text-center">

                <!-- Seleccionar propiedad -->
                <a class="btn btn-sm btn-success" href="{{ route('propiedades.edit',['propiedad' => $item ])}}">
                    <span class="fa fa-check-circle"></span>
                </a>

            </td> 

        </tr>
        @endforeach

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

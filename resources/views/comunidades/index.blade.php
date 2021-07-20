@extends('adminlte.layout')

<!--@section('datatables')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable();
    });
</script>
@endsection-->


@section('title', 'Tus comunidades')



@section('cabecera')<!-- comment -->
<div class="row">
    <a class="col-auto btn btn-primary mb-1"
       href="{{ route('comunidades.create') }}">@lang('Nueva comunidad')</a>
</div>
@endsection



@section('content')

@if (!count( $comunidades ))
<div class="alert alert-danger">@lang('There are not communities created yet')</div>
@else
<div class="content">
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th class="col-1">@lang('CP')</th>
            <th class="col-1">@lang('CIF')</th>
            <th class="col-1">@lang('Activa')</th>
            <th class="col-1">@lang('Gratuita')</th>
            <th class="col-5">@lang('Denominación')</th>
            <th class="col-3">@lang('Acción')</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($comunidades as $comunidad)
        <tr>
            <td class="col-1">{{ $comunidad->cp }}</td>
            <td class="col-1">{{ $comunidad->cif }}</td>
            <td class="col-1">{{ $comunidad->activa }}</td>
            <td class="col-1">{{ $comunidad->gratuita }}</td>
            <td class="col-5">{{ $comunidad->denom }}</td>

            <td class="flex border-2 text-center">
                <div class="row">
                    <button class="m-1 btn btn-small btn-info" href="{{ route('comunidades.seleccionar', $comunidad) }}">@lang('Selec')</button>
                    <button class="m-1 btn btn-small btn-success" href="{{ route('comunidades.show', $comunidad) }}">@lang('Mostrar')</button>
                </div>
            </td> 

        </tr>
        @endforeach

    </tbody>
</table>
</div>

@endif

{{-- $comunidades->links() --}}

@endsection

@extends('adminlte.layout')

<?php $title = 'Comunidades'; ?>
@section('title', $title )


@section('content')

<div class="row">
    <h1>@lang('Comunidades')</h1>
    <a class="col-auto btn btn-primary mb-1"
       href="{{ route('comunidades.create') }}"
       >@lang('Crear comunidad')</a>
</div>
<table class="table table-striped table-bordered">
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

        @foreach($comunidades as $comunidad)
        <tr>
            <td>{{ $comunidad->cp }}</td>
            <td>{{ $comunidad->cif }}</td>
            <td>{{ $comunidad->activa }}</td>
            <td>{{ $comunidad->gratuita }}</td>
            <td>{{ $comunidad->denom }}</td>

            <td class="flex border-2 text-center">
                <a class="btn btn-small btn-info btn-block" href="{{ route('comunidades.seleccionar', $comunidad) }}">@lang('Selec')</a>
                <a class="btn btn-small btn-success btn-block" href="{{ route('comunidades.show', $comunidad) }}">@lang('Mostrar')</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- $comunidades->links() --}}

@endsection

@extends('layouts.layout')

<?php $title= 'Comunidades'; ?>
@section('title', $title )


@section('content')

<div class="row">
    <h1>@lang('Comunidades')</h1>
    <a class="col-auto btn btn-primary mb-1"
       href="{{ route('comunidades.create') }}"
       >@lang('Crear comunidad')</a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>@lang('CIF')</th>
            <th>@lang('CP')</th>
            <th>@lang('Denominación')</th>
            <th>@lang('Acción')</th>
        </tr>
    </thead>
    <tbody>

        @foreach($comunidades as $comunidad)
        <tr>
            <td>{{ $comunidad->cif }}</td>
            <td>{{ $comunidad->cp }}</td>
            <td>{{ $comunidad->denom }}</td>
            <td class="text-center">
                <!-- show  -->
                <a class="btn btn-small btn-success" href="{{ route('comunidades.show', $comunidad) }}">@lang('Mostrar')</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- $comunidades->links() --}}

@endsection
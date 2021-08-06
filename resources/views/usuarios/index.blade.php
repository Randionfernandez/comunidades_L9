@extends('adminlte.layout')

@section('header')

@endsection


@section('content')

@if (!count( $users ))
<div class="alert alert-danger">@lang('No hay ningun usuario todavía')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('fechalta')</th>
            <th>@lang('DOI')</th>
            <th>@lang('Nombre')</th>
            <th>@lang('Apellidos')</th>
            <th>@lang('Email')</th>
            <th>@lang('Acciones')</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->fechalta }}</td> 
            <td>{{ $user->doi }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->email }}</td>

            <td class="flex border-2 text-center">

                <!-- Seleccionar comunidad -->
                <a class="btn btn-sm btn-success" href="{{ route('usuarios.show',['usuario' => $user ])}}">
                    <span class="fa fa-check-circle"></span>
                </a>

            </td> 

        </tr>
        @endforeach

    </tbody>
</table>

@endif

@endsection
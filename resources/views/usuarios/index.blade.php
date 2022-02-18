@extends('adminlte.layout')
@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Usuarios de esta comunidad</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Usuarios</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        <a class="btn btn-primary mr-2"
           href="{{ route('usuarios.create') }}">
            <i class="fa fa-plus"></i>  Crear usuario
        </a>

        <x-ayuda>
            {{__('help.usuarios')}}    
        </x-ayuda>


    </div>
</div>
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
            <th>@lang('Apellidos')</th>
            <th>@lang('Nombre')</th>
            <th>@lang('Email')</th>
            <th>@lang('Acciones')</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->fechalta }}</td> 
            <td>{{ $user->doi }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->name }}</td>
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
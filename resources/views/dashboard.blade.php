@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Ficha de la comunidad</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-9 col-sm-9 col-lg-9 p-0 bg-white overflow-hidden sm:rounded-lg">
    <!-- Añadir aquí un dashboard -->
    <h3> Has seleccionado la comunidad de nombre: <br/>{{ $comunidad->denom}}  </h3> 
</div>
@endsection
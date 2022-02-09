@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">@lang('Cuentas bancarias de esta comunidad')</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">Comunidades</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">Cuentas bancarias</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-header">
    <div class='row'>
        <a class="btn btn-primary float-left mr-2"
           href="{{ route('cuentas.create') }}">
            <i class="fa fa-plus"></i>  Crear cuenta
        </a>

        <x-ayuda>
            {{__('help.cuentas')}}    
        </x-ayuda>

    </div>
</div>
@endsection



@section('content')

@if (!count( $cuentas ))
<div class="alert alert-danger">@lang('No existe ninguna cuenta todavía.')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('Activa')</th>
            <th>@lang('Siglas')</th>
            <th>@lang('IBAN')</th>
            <th>@lang('Denominación')</th>
            <th>@lang('Saldo')</th>
            <th>@lang('Divisa')</th>
            <th>@lang('Ver')</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($cuentas as $cuenta)
        <tr>
            <td>@if ( $cuenta->activa ) @lang('Sí') @else @lang('No') @endif</td> 
            <td>{{ $cuenta->siglas }}</td>
            <td>{{ $cuenta->iban}}</td>
            <td>{{ $cuenta->denominacion }}</td>
            <td>{{ $cuenta->saldo }}</td>
            <td>{{ $cuenta->divisa }}</td>

            <td class="flex border-2 text-center">

                <!-- Seleccionar comunidad -->
                <a class="btn btn-sm btn-success" href="{{ route('cuentas.edit',['cuenta' => $cuenta ])}}">
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

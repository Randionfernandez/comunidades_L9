@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Cuenta seleccionada</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cuentas.index') }}">Cuentas</a></li>
            <li class="breadcrumb-item">Ficha de la cuenta</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')

<!-- Main content -->
<!--<section class="content">-->
<form method="post" id="update-cuenta" enctype="multipart/form-data"
      action="{{route('cuentas.update', $cuenta) }}">
    @csrf @method('PUT')
    @include('partials.validation-errors')
    @include('cuentas._cuenta')
</form>

<form class="d-none" id="delete-cuenta" onsubmit="return confirm('Estas seguro de querer eliminar esta comnidad')"
      method="POST" action="{{ route('cuentas.destroy', $cuenta) }}">
    @csrf @method('DELETE')
</form>
<!-- /.content -->
<!-- ./Main content -->

@push('scripts')
<!-- bs-custom-file-input -->
<script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

@endpush

@endsection


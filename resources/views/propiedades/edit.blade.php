@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Cuenta seleccionada</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('propiedades.index') }}">Propiedades</a></li>
            <li class="breadcrumb-item">Ficha de la propiedad</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')

<!-- Main content -->
<!--<section class="content">-->
<form method="post" id="update-propiedad" enctype="multipart/form-data"
      action="{{route('propiedades.update', $propiedad) }}">
    @csrf @method('PUT')
    @include('partials.validation-errors')
    @include('propiedades._propiedad')
</form>

<form class="d-none" id="delete-propiedad" onsubmit="return confirm('Estas seguro de querer eliminar esta propiedad')"
      method="POST" action="{{ route('propiedad.destroy', $propiedad) }}">
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


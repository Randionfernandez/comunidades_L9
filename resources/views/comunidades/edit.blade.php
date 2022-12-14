@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">@lang('Comunidad seleccionada')</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('comunidades.index') }}">@lang('Comunidades')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comunidades.edit',$comunidad) }}">{{ $comunidad->denom }}</a></li>
            <li class="breadcrumb-item">@lang('Ficha de la comunidad')</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')

<!-- Main content -->
<!--<section class="content">-->
<form method="post" id="update-comunidad" enctype="multipart/form-data"
      action="{{route('comunidades.update', $comunidad) }}">
    @csrf @method('PUT')
    @include('partials.validation-errors')
    @include('comunidades._comunidad')
</form>

<form class="d-none" id="delete-comunidad" onsubmit="return confirm('Estas seguro de querer eliminar esta comunidad')"
      method="POST" action="{{ route('comunidades.destroy', $comunidad) }}">
    @csrf @method('DELETE')
</form>
<!-- /.content -->
<!-- ./Main content -->
@endsection

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

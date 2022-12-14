@extends('adminlte.layout')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">@lang('Introduzca los datos de la comunidad')</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
@include('partials.validation-errors')
<!-- Main content -->
<!--<section class="content">-->
<form method="post" id="create-comunidad" enctype="multipart/form-data"
      action="{{route('comunidades.store')}}">
    @csrf
    @include('comunidades._comunidad')
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

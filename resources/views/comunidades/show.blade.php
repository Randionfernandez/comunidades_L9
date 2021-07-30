@extends('adminlte.layout')
@section('header')
{{-- __('Community Show | ') . $comunidad->denom --}}
@endsection

@section('content')

@include('comunidades._comunidad')

@endsection

@extends('adminlte.layout')


@section('content')
<h1>La ruta solicitada no existe</h1>

<x-ayuda>
{{__('help.fallback')}}    
</x-ayuda>

@endsection
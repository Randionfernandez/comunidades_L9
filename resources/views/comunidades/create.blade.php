@extends('adminlte.layout')

@section('content')
<form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('comunidades.store') }}">
    <h1 class="display-4"> @lang('New Community') </h1>
    <hr>

    @include('comunidades._form', ['btnText1' =>'Save', 'btnText2' => 'Cancel'])
</form>
@endsection
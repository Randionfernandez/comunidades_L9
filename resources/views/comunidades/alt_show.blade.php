<x-layout>

    @section('title')
    {{ __('Community Show | ') . $comunidad->denom }}
    @endsection



    @section('content')

    <div class="bg-white p-5 shadow rounded">

        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('comunidades.index') }}">@lang('Back')</a>

            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('comunidades.edit', $comunidad) }}">@lang('Edit')</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-comunidad').submit()">@lang('Eliminate')</a>
            </div>
            <form class="d-none" id="delete-comunidad" method="POST" action="{{ route('comunidades.destroy', $comunidad) }}">
                @csrf @method('DELETE')
            </form>
            @endauth
        </div>

        <h3>@lang('Denomination') {{ $comunidad->denom }}</h3>

        @include('comunidades._comunidad')

    </div>
    @endsection

</x-layout>

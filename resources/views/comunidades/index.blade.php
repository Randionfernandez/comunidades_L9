<x-app-layout>

    @if(session('status'))

    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index Communities') }}
        </h2>
    </x-slot>

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('comunidades.create') }}"> @lang('New')</a>
            </div>


            <!--  con button no funciona no coge href y usamos la etiqueta a

             <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <button class="btn btn-primary btn-lg btn-block"> @lang('Delete')</button>
            </div>
            -->

        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>@lang('id')</th>
                        <th>@lang('denom')</th>
                        <th>@lang('cif')</th>
                        <th>@lang('president')</th>
                        <th>@lang('secretary')</th>
                        <th>@lang('responsable')</th>
                    </tr>
                </thead>
                @forelse($comunidades as $comunidad)
                <tbody>

                    <tr>
                        <td>{{$comunidad->id}}</td>
                        <td>{{$comunidad->denom}}</td>
                        <td>{{$comunidad->cif}}</td>
                        <td>{{$comunidad->president}}</td>
                        <td>{{$comunidad->secretary}}</td>
                        <td>{{$comunidad->responsable}}</td>
                        <td><x-jet-button onclick="location.href='{{ route('comunidades.edit', $comunidad) }}'">{{ __('Edit') }}</x-jet-button></td>
                        <td><x-jet-danger-button onclick="location.href='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button></td>
                    </tr>

                </tbody>
                @empty
                <h1>@lang('There are not communities created yet')</h1>
                @endforelse
            </table>

        </div>

        {{ $comunidades->links() }}
    </div>
</x-app-layout>
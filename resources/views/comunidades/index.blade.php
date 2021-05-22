<x-app-layout>

    @if(session('status'))
    <div class="alert {{ session('status')[1] }} alert-dismissible fade show" role="alert">
        {{ session('status')[0] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    @if( auth()->user()->comunidades->count() < auth()->user()->limitMaxFreeCommunities)
        <x-jet-button onclick="location.href ='{{ route('comunidades.create') }}'">@lang('New')</x-jet-button>
    @endif


    <!--  con button no funciona no coge href y usamos la etiqueta a

     <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    <button class="btn btn-primary btn-lg btn-block"> @lang('Delete')</button>
    </div>
    -->
    @if ($user->comunidades->count() > 0)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>@lang('denom')</th>
                    <th>@lang('cif')</th>
                    <th>@lang('president')</th>
                    <th>@lang('secretary')</th>
                    <th>@lang('responsable')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </thead>
            @forelse($user->comunidades as $comunidad )
            <tbody>

                <tr>
                    <td>{{$comunidad->denom}}</td>
                    <td>{{$comunidad->cif}}</td>
                    <td>{{$comunidad->president}}</td>
                    <td>{{$comunidad->secretary}}</td>
                    <td>{{$comunidad->responsable}}</td>
                    <td>
                        <x-jet-button onclick="location.href ='{{ route('comunidades.index', $comunidad) }}'">{{ __('Select') }}</x-jet-button>
                        <x-jet-danger-button onclick="location.href ='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button>
                    </td>
                </tr>

            </tbody>
            @empty
            <div class="alert alert-danger">@lang('There are not communities created yet')</div>
            @endforelse
        </table>
    @else
        <h1>@lang('There are not communities created yet')</h1>
    @endif
</x-app-layout>
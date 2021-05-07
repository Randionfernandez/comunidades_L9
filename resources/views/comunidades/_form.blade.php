@csrf

<x-jet-validation-errors></x-jet-validation-errors>

<div class="form-group">
    <label for="denom">@lang('denom')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="denom" placeholder=@lang('denom') value="{{ old('denom', $comunidad->denom) }}" required>
    @if ($errors->has('denom'))
        <span class="error-message">{{ $errors->first('denom') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="nif">@lang('cif')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="cif" placeholder=@lang('cif') value="{{ old('cif', $comunidad->cif) }}" required>
</div>
<div class="form-group">
    <label for="president">@lang('president')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="president" placeholder=@lang('president') value="{{ old('president', $comunidad->president) }}">
</div>
<div class="form-group">
    <label for="secretary">@lang('secretary')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="secretary" placeholder=@lang('secretary') value="{{ old('secretary', $comunidad->secretary) }}">
</div>
<div class="form-group">
    <label for="responsable">@lang('responsable')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="responsable" placeholder=@lang('responsable') value="{{ old('responsable', $comunidad->responsable) }}">
</div>
<div class="form-group">
    <label for="banksuf">@lang('banksuf')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="banksuf" placeholder=@lang('banksuf') value="{{ old('banksuf', $comunidad->banksuf) }}" required>
</div>
<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        @lang('notifications direction')
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="direccion">@lang('direccion')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="direccion" placeholder=@lang('direccion') value="{{ old('direccion', $comunidad->direccion) }}" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="doorway">@lang('doorway')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="doorway" placeholder=@lang('doorway') value="{{ old('doorway', $comunidad->doorway) }}" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="block">@lang('block')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="block" placeholder=@lang('block') value="{{ old('block', $comunidad->block) }}" required>
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="stair">@lang('stair')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="stair" placeholder=@lang('stair') value="{{ old('stair', $comunidad->stair) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="floor">@lang('floor')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="floor" placeholder=@lang('floor') value="{{ old('floor', $comunidad->floor) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="door">@lang('door')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="door" placeholder=@lang('door') value="{{ old('door', $comunidad->door) }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="countrycode">@lang('countrycode')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="countrycode" placeholder=@lang('countrycode') value="{{ old('countrycode', $comunidad->countrycode) }}" required>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="cp" placeholder=@lang('cp') value="{{ old('cp', $comunidad->cp) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="pais">@lang('pais')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="pais" placeholder=@lang('pais') value="{{ old('pais', $comunidad->pais) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="provincia">@lang('provincia')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="provincia" placeholder=@lang('provincia') value="{{ old('provincia', $comunidad->provincia) }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="localidad">@lang('localidad')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="localidad" placeholder=@lang('localidad') value="{{ old('localidad', $comunidad->localidad) }}" required>
                </div>
            </div>
            <div class="form-group" hidden>
                <input class="form-control border-0 bg-light shadow-sm" type="text" name="fechalta"  value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
    </div>
</div>
<x-jet-button>{{ __($btnText1) }}</x-jet-button>
<x-jet-danger-button onclick="location.href='{{ route('comunidades.index') }}'">{{ __($btnText2) }}</x-jet-danger-button>
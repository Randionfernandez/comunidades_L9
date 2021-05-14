@csrf

<x-jet-validation-errors></x-jet-validation-errors>

<div class="form-group">
    <label for="denom">@lang('denom')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="denom" placeholder=@lang('denom') value="{{ old('denom', $comunidad->denom) }}" required>
    @if ($errors->has('denom'))
    <span class="error-message">{{ $errors->first('denom') }}</span>
    @endif
</div>
<div class="row form-group">
    <div class="col-4">
        <label for="cif">@lang('cif')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="9" name="cif" placeholder=@lang('cif') value="{{ old('cif', $comunidad->cif) }}" required>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="fechalta">@lang('Create Date')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechalta" placeholder=@lang('fechalta') value="{{ old('fechalta', $comunidad->fechalta) }}" required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="partes">@lang('partes')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="number" name="partes" min="1" placeholder=@lang('partes') value="{{ old('partes', $comunidad->partes) }}">
        </div>
    </div>
</div>


<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications direction')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="direccion">@lang('direction')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="direccion" placeholder=@lang('direction') value="{{ old('direccion', $comunidad->direccion) }}" required>
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="cp" placeholder=@lang('cp') value="{{ old('cp', $comunidad->cp) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="pais">@lang('Country')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="pais" placeholder=@lang('Country') value="{{ old('pais', $comunidad->pais) }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="provincia">@lang('province')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="provincia" placeholder=@lang('province') value="{{ old('provincia', $comunidad->provincia) }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="localidad">@lang('locality')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="localidad" placeholder=@lang('locality') value="{{ old('localidad', $comunidad->localidad) }}">
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="logo">@lang('logo')</label>
                    <input type="file" id="avatar" class="form-control border-0 bg-light shadow-sm" name="logo">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="observaciones">@lang('observaciones')</label>
                    <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="name" rows="5" cols="10" " name="observaciones" placeholder=@lang('observaciones') value="{{ old('observaciones', $comunidad->observaciones) }}"> </textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<x-jet-button>{{ __($btnText1) }}</x-jet-button>
<x-jet-danger-button onclick="location.href ='{{ route('comunidades.index') }}'">{{ __($btnText2) }}</x-jet-danger-button>
<br><br>
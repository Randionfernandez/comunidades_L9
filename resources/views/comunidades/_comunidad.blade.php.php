<div class="d-flex justify-content-between align-items-center">
    <div class=" col-12 panel-body">
        <div class="row form-group">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="street">@lang('cif')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->cif }} </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="street">@lang('banksuf')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->banksuf }} </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="street">@lang('president')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->president }} </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="street">@lang('secretary')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->secretary }} </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="street">@lang('responsable')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->responsable }} </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="direccion">@lang('Direction')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->direccion }} </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doorway">@lang('doorway')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->doorway }} </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="block">@lang('block')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->block }} </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="stair">@lang('stair')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->stair }} </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="floor">@lang('floor')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->floor }} </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="door">@lang('door')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->door }} </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="countrycode">@lang('countrycode')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->countrycode }} </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->cp }} </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="country">@lang('country')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->pais }} </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="province">@lang('province')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->provincia }} </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="location">@lang('location')</label>
                    <div class="form-control border-0 bg-light shadow-sm"> {{ $comunidad->localidad }} </div>
                </div>
            </div>
        </div>				
    </div>
</div>
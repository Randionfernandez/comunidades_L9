<!--
Estos valores serán tratados automaticamente por la aplicación o por el superadmin
de la aplicación. El usuario no puede manipularlos. Por eso se retiraron del
form _comunidad.blade.php-->

<div class="col-3">
    <!-- status de la comunidad -->
    <div class="form-group">
        <!-- activa -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                   name="activa"
                   value="{{ old('activa', $comunidad->activa ?? true) }}" {{ old('activa') ? 'checked' :'' }}>
            <label class="form-check-label">@lang('Activa')</label>
        </div>

    </div>
</div>
<div class="col-3">
    <!-- gratuita: No se le cobra cuota -->
    <div class="form-check">
        <input class="form-check-input" type="checkbox" checked
               name='gratuita' value="{{ old('gratuita', $comunidad->gratuita ?? true) }}" {{ old('gratuita') ? 'checked' :'' }}>
        <label class="form-check-label">@lang('Gratuita')</label>
    </div>
</div>
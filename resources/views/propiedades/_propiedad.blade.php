<!-- TODO. Añadir campos 'activa' y 'saldo' después de reevaluar su necesidad; figuran en la migración -->

<div class="row">
    <div class="col-md-8">

        <div class= "card card-warning"> 
            <div class="card-header">
                <h3 class="card-title">@lang('Ficha de la propiedad')</h3>
            </div>

            <div class="card-body">


                <div class="row">
                    <!-- Número de propiedad según consta en el registro de la propiedad -->
                    <div class="col-2">
                        <div class="form-group">
                            <label>@lang('Parte')</label>
                            <input type="number" name="parte" value="{{ old('parte', $propiedad->parte ?? '') }}"
                                   class="form-control" min="1" required>
                        </div>
                    </div>

                    <!-- Tipo de propiedad -->
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tipo" class="form-label">@lang('Tipo')</label>
                            <select class="form-control select2" name="tipo" id="tipo" required>
                                @foreach($tipos_propiedad as $item)
                                <option value="{{ $item->codigo }}" @if (old('tipo') === "{{ $item->codigo}}") selected @endif>
                                    {{ $item->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Coeficiente de participación en los gasto generales, según consta en el registro de la propiedad -->
                    <div class="col-2">
                        <div class="form-group">
                            <label>@lang('Coeficiente')</label>
                            <input type="number" class="form-control" name="coeficiente" 
                                   value="{{ old('coeficiente', $propiedad->coeficiente ?? '') }}" min="0" max="100" required>
                        </div>
                    </div>

                    <!-- Valor catastral, según consta en el catastro -->
                    <div class="col-3">
                        <div class="form-group">
                            <label>@lang('Valor catastral')</label>
                            <input type="number" class="form-control" name="valor_catastral" 
                                   value="{{ old('valor_catastral', $propiedad->valor_catastral ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- denominación, p.e., 1ºA, 3ª-izda, Ático B, Local 1, etc. -->
                    <div class="col-6">
                        <div class="form-group">
                            <label>@lang('Denominación')</label>
                            <input type="text" class="form-control" name="denominacion" maxlength="10" required
                                   value="{{ old('denominacion', $propiedad->denominacion ?? '')}}">
                        </div>
                    </div>

                    <!-- Propietario -->
                    <div class="col-6">
                        <div class="form-group">
                            <label>@lang('Propietario')</label>
                            <input type="text" name="user_id" value="{{ old('user_id', $propiedad->user->name ?? '') }}"
                                   class="form-control">
                        </div>
                    </div>
                </div><!-- ./row -->






                <div class="row">
                    <!-- Domiciliada -->
                    <div class="form-group col-2">
                        <label for="domiciliada" class="form-label">@lang('Domiciliada')</label>
                        <select class="form-control select2" name='domiciliada' id="domiciliada">
                            <option value="false" @if (old('domiciliada') === 'false') selected @endif>@lang('No')</option>
                            <option value="true" @if (old('domiciliada') === 'true') selected @endif>@lang('Sí')</option>
                        </select>
                    </div>

                    <!-- IBAN -->
                    <div class="col-5">
                        <div class="form-group">
                            <label>IBAN</label>
                            <input type="text" class="form-control" name="iban" maxlength="24"
                                   value="{{ old('iban', $propiedad->iban ?? '')}}">
                        </div>
                    </div>

                    <!-- BIC -->
                    <div class="col-5">
                        <div class="form-group">
                            <label>BIC</label>
                            <input type="text" name="bic" maxlength="11"
                                   value="{{ old('bic', $propiedad->bic ?? '') }}" class="form-control">
                        </div>
                    </div>
                </div><!-- ./row -->



                <!-- observaciones -->
                <div class="form-group">
                    <label>@lang('Observaciones')</label>
                    <textarea class="form-control" rows="3"
                              name="observaciones">{{ old('observaciones', $propiedad->observaciones ?? '') }}
                    </textarea>
                </div>
            </div>   <!-- ./card-body -->  
        </div> <!-- ./card card-warning -->


        <div class="card-footer">
            <a class="btn btn-primary"
               href="{{ route('propiedades.index') }}">@lang('Ver todas')</a>



            @if ((Request::route()->getName()=='propiedades.create'))
            <button type="submit" name="guardar" class="btn btn-secondary"
                    >@lang('Guardar')</button>
            @else
            <button type="submit" name="guardar" class="btn btn-secondary"
                    >@lang('Guardar')</button>
            <button type='button' class="btn btn-danger"
                    onclick="document.getElementById('delete-propiedad').submit()">@lang('Dar de baja')
            </button>
            @endif
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ayuda">
                <i class="fa fa-info"></i> @lang('Ayuda')
            </button>

            <!-- The Modal -->
            <div class="modal" id="ayuda">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">@lang('Ayuda')</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Propiedad Blablabla <b>blabla</b> blabla
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">@lang('Continuar')</button>
                        </div>

                    </div>
                </div>
            </div>      <!-- the modal ayuda -->  


        </div><!-- ./card-footer -->




    </div> <!-- ./col-md-8 -->

    <div class="col-md-4">

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">@lang('Añadir documento')</h3>
            </div> <!-- ./card-header -->

            <div class="card-body">
                <div class="form-group">

                    <!-- Título -->
                    <div class="form-group">
                        <label>@lang('Título')</label>
                        <input type="text" class="form-control"  maxlength="35"
                               name="titulo" value="{{ old('titulo')}}">
                    </div>

                    <!-- Descripción -->
                    <div class="form-group">
                        <label>@lang('Descripción')</label>
                        <textarea class="form-control" rows="2"
                                  name="descripcion">{{ old('descripcion') }}
                        </textarea>
                    </div>


                    <div class="custom-file">
                        <input name="doc" type="file" class="custom-file-input" id="doc_comunidad">
                        <label class="custom-file-label" for="doc_comunidad">@lang('Elige un archivo')</label>
                    </div>
                </div>
            </div> <!-- card-body -->

        </div>
    </div><!-- ./col-md-4 -->
</div>   <!-- ./row -->

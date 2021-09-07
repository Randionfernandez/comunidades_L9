<!-- TODO. Añadir campos 'activa' y 'saldo' después de reevaluar su necesidad; figuran en la migración -->

<div class="row">
    <div class="col-md-8">

        <div class= "card card-warning"> 
            <div class="card-header">
                <h3 class="card-title">Ficha de la cuenta</h3>
            </div>

            <div class="card-body">


                <div class="row">
                    <div class="col-3">
                        <!-- fecha de apertura -->
                        <div class="form-group">
                            <label>Fecha apertura</label>
                            <input type="date" class="form-control" required
                                   name="fecha_apertura" value="{{ old('fecha_apertura', $cuenta->fecha_apertura ?? '') }}">
                        </div>
                    </div>

                    <!-- Siglas -->
                    <div class="col-2">
                        <div class="form-group">
                            <label>Siglas</label>
                            <input type="text" name="siglas" value="{{ old('siglas', $cuenta->siglas ?? '') }}"
                                   class="form-control" maxlength="4" required>
                        </div>
                    </div>


                    <!-- denominación -->
                    <div class="col-5">
                        <div class="form-group">
                            <label>Denominación</label>
                            <input type="text" class="form-control" name="denominacion" maxlength="35" required
                                   value="{{ old('denominacion', $cuenta->denominacion ?? '')}}">
                        </div>
                    </div>

                    <!-- Divisa -->
                    <div class="col-2">
                        <div class="form-group">
                            <label>Divisa</label>
                            <input type="text" name="divisa" value="{{ old('divisa', $cuenta->divisa ?? 'EUR') }}"
                                   class="form-control" maxlength="3" required>
                        </div>
                    </div>
                </div><!-- ./row -->

                <div class="row">
                    <!-- IBAN -->
                    <div class="col-7">
                        <div class="form-group">
                            <label>IBAN</label>
                            <input type="text" class="form-control" name="iban" maxlength="24" required
                                   value="{{ old('iban', $cuenta->iban ?? '')}}">
                        </div>
                    </div>

                    <!-- BIC -->
                    <div class="col-5">
                        <div class="form-group">
                            <label>BIC</label>
                            <input type="text" name="bic" maxlength="11"
                                   value="{{ old('bic', $cuenta->bic ?? '') }}" class="form-control">
                        </div>
                    </div>
                </div><!-- ./row -->
                
                
                
                <!-- observaciones -->
                <div class="form-group">
                    <label>Observaciones</label>
                    <textarea class="form-control" rows="3"
                              name="observaciones">{{ old('observaciones', $cuenta->observaciones ?? '') }}
                    </textarea>
                </div>
            </div>   <!-- ./card-body -->  
        </div> <!-- ./card card-warning -->


        <div class="card-footer">
            <a class="btn btn-primary"
               href="{{ route('cuentas.index') }}">@lang('Ver todas')</a>



            @if ((Request::route()->getName()=='cuentas.create'))
            <button type="button" name="guardar" class="btn btn-secondary"
                    onclick="document.getElementById('create-cuenta').submit()"
                    >@lang('Guardar')</button>
            @else
            <button type="submit" name="guardar" class="btn btn-secondary"
                    >@lang('Guardar')</button>
            <button type='button' class="btn btn-danger"
                    onclick="document.getElementById('delete-cuenta').submit()">@lang('Dar de baja')
            </button>
            @endif
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ayuda">
                <i class="fa fa-info"></i> Ayuda
            </button>

            <!-- The Modal -->
            <div class="modal" id="ayuda">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ayuda</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Cuentas Blablabla <b>blabla</b> blabla
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Continuar</button>
                        </div>

                    </div>
                </div>
            </div>      <!-- the modal ayuda -->  


        </div><!-- ./card-footer -->




    </div> <!-- ./col-md-8 -->

    <div class="col-md-4">

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Añadir documento</h3>
            </div> <!-- ./card-header -->

            <div class="card-body">
                <div class="form-group">

                    <!-- Título -->
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control"  maxlength="35"
                               name="titulo" value="{{ old('titulo')}}">
                    </div>

                    <!-- Descripción -->
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="2"
                                  name="descripcion">{{ old('descripcion') }}
                        </textarea>
                    </div>


                    <div class="custom-file">
                        <input name="doc" type="file" class="custom-file-input" id="doc_comunidad">
                        <label class="custom-file-label" for="doc_comunidad">Elige un archivo</label>
                    </div>
                    <!--                        <div class="input-group-append">
                                                <span class="input-group-text">Subir</span>
                    </div>-->

                </div>
            </div> <!-- card-body -->

        </div>
    </div><!-- ./col-md-4 -->
</div>   <!-- ./row -->

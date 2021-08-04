<!-- Main content -->
<!--<section class="content">-->
<form>
    <div class="row">
        <div class="col-md-8">

            <div class= "card card-warning"> 
                <div class="card-header">
                    <h3 class="card-title">Ficha de la comunidad</h3>
                </div>

                <div class="card-body">
                    <h3 class="card-title">Denominación: {{$comunidad->denom}}</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-footer">
                    <a class="btn btn-primary"
                       href="{{ route('comunidades.index') }}">@lang('Regresar')</a>

                    <button type="submit" class="btn btn-secondary"
                            href="{{ route('comunidades.edit', $comunidad) }}">@lang('Editar')</button>
                    <button type="submit" class="btn btn-danger"
                            onclick="document.getElementById('delete-comunidad').submit()">@lang('Dar de baja')</button>
                </div>


                <div class="card-body">
                    <!-- fecha de alta -->
                    <div class="form-group">
                        <label>Fecha de alta</label>
                        <input type="date" class="form-control" placeholder="">
                    </div>
                    <!-- CIF -->
                    <div class="form-group">
                        <label>CIF</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>


                    <!-- denominación -->
                    <div class="form-group">
                        <label>Denominación</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <!-- email de la comunidad -->
                    <div class="form-group">
                        <label for="Email_cmd">@lang('Correo electrónico')</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>

                    </div>

                    <!-- status de la comunidad -->
                    <div class="form-group">
                        <!-- activa -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Activa</label>
                        </div>
                        <!-- gratuita: No se le cobra cuota -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Gratuita</label>
                        </div>
                    </div>


                    <!-- dirección postal -->
                    <div class="form-group">
                        <label>Dirección postal</label>
                        <input type="text" class="form-control" required  placeholder="Entre la dirección con número, piso, etc., incluido">
                    </div>
                    <!-- código postal -->
                    <div class="form-group">
                        <label>Código postal</label>
                        <input type="text" maxlength="5" class="form-control" required placeholder="Código postal">
                    </div>
                    <!-- localidad -->
                    <div class="form-group">
                        <label>Localidad</label>
                        <input type="text" class="form-control" required placeholder="Localidad">
                    </div>
                    <!-- localidad -->
                    <div class="form-group">
                        <label>Municipio</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <!-- logo -->

                    <!-- propiedades, cuentas, tipos de gasto, grupos de reparto, propietarios -->

                    <!-- propiedades -->
                    <div class="form-group">
                        <label>Propiedades</label>
                        <select class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                        </select>
                    </div>


                    <!-- comentarios -->
                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div> <!-- ./card card-warning -->


        </div> <!-- ./col-md-8 -->

        <div class="col-md-4">

            <div class="card card-warning">
                <div class="card-header"><!-- comment -->
                    <h3 class="card-title">Anexar documento</h3>
                </div> <!-- ./card-header -->

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">@lang('Anexar documento')</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Subir</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- card-body -->

            </div>

            <div class="card card-warning">
                <div class="card-header"><!-- comment -->
                    <h3 class="card-title">Cargos</h3>
                </div> <!-- ./card-header -->

                <div class="card-body">
                    <div class="form-group">
                    <!-- presidente -->
                        <div class="form-group">
                            <label>Presidente</label>
                            <input type="text" class="form-control" required placeholder="">
                        </div>             
                    <!-- secretario -->
                        <div class="form-group">
                            <label>Secretario</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    <!-- administrador -->
                        <div class="form-group">
                            <label>Administrador</label>
                            <input type="text" class="form-control" required placeholder="">
                        </div>
                    </div>
                </div> <!-- card-body -->

            </div>

        </div>
        <!-- ./col-md-4 -->
    </div>
    <!-- ./row -->

</form>


<form class="d-none" id="delete-comunidad" method="POST" action="{{ route('comunidades.destroy', $comunidad) }}">
    @csrf @method('DELETE')
</form>
<!-- /.content -->
<!-- ./Main content -->

@push('scripts')
<!-- bs-custom-file-input -->
<script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
                                $(function () {
                                    bsCustomFileInput.init();
                                });
</script>

@endpush
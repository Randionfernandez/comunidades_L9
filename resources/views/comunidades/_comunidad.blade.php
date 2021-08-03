<!-- Main content -->
<!--<section class="content">-->
<!-- general form elements -->

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

                <!-- fecha de alta -->

                <!-- CIF -->

                <!-- email de la comunidad -->
                <div class="form-group">
                    <label for="Email_cmd">@lang('Correo electrónico')</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>

                </div>


                <!-- denominación -->
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control" placeholder="entre la dirección con número, piso, etc incluido">
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
                        <label class="form-check-label">Gratuita checked</label>
                    </div>
                </div>


                <!-- dirección postal -->

                <!-- código postal -->

                <!-- localidad -->

                <!-- logo -->

                <!-- propiedades, cuentas, tipos de gasto, grupos de reparto, propietarios -->

                <!-- propiedades -->
                <div class="form-group">
                    <label>Propiedades</label>
                    <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>
                </div>

                <!-- presidente -->

                <!-- secretario -->

                <!-- administrador -->

                <!-- comentarios -->
                <div class="form-group">
                    <label>Comentarios</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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

        </div>
        <!-- ./col-md-4 -->
    </div>
    <!-- ./row -->

</form>
<form class="d-none" id="delete-comunidad" method="POST" action="{{ route('comunidades.destroy', $comunidad) }}">
    @csrf @method('DELETE')
</form>
<!-- /.content -->


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
<!-- Main content -->
<!--<section class="content">-->
<form>
    <div class="row">
        <div class="col">

            <div class= "card card-warning"> 
                <div class="card-header">
                    <h3 class="card-title">Cuenta bancaria</h3>
                </div>
                <!--
                <div class="card-body">
                    <h3 class="card-title">Denominación: {{$comunidad->denom}}</h3>
                </div>-->
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


                    <div class="row">
                        <div class="col-3">
                            <!-- fecha de alta -->
                            <div class="form-group">
                                <label>Fecha de alta</label>
                                <input type="date" class="form-control" placeholder="">
                            </div>
                        </div>

                        <!-- CIF -->
                        <div class="col-3">
                            <div class="form-group">
                                <label>CIF</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>


                        <!-- denominación -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Denominación</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                    </div><!-- ./row -->


                </div>

                <!-- logo -->


                <!-- comentarios -->
                <div class="form-group">
                    <label>Comentarios</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
            </div> <!-- ./card card-warning -->

        </div><!-- ./col --> 
    </div> <!-- ./row -->

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
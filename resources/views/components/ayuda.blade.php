<button type="button" class="btn btn-danger float-right" id="ayuda" data-toggle="modal" data-target="#help_comunidades">
    <i class="fa fa-info"></i> Ayuda
</button>

<!-- The Modal -->
<div class="modal" id="help_comunidades">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ayuda</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                {{ $slot }}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Continuar</button>
            </div>

        </div>
    </div>
</div>      <!-- the modal ayuda -->  
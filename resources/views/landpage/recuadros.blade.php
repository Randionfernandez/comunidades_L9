<div class="row m-4 p-4 d-flex flex-xl-nowrap justify-content-xl-around">
    <div class="col xs-col-1 sm-col-6 md-col-6 lg-col-3 xl-col-3 ">
        <a href="{{ route('comunidades.create') }}">
            <div class="card m-3 p-3 zoom " style="width: 16rem;">

                <i style='font-size:80px' class='fas text-center m-2'>&#xf64f;</i>
                <div class="card-body">
                    <h5 class="card-title">Alta de comunidad</h5>
                    <p class="card-text">Cree la ficha de la comunidad y propiedades de cada usuario</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Regístrese</li>
                    <li class="list-group-item">Cumplimente el formulario</li>
                    <li class="list-group-item">Asigne propiedades</li>
                </ul>
            </div>
        </a>
    </div>

    <div class="col xs-col-1 sm-col-6 md-col-6 lg-col-3 xl-col-3">
        <a href="">
            <div class="card m-3 p-3 zoom " style="width: 16rem;">

                <i style='font-size:80px' class='fas text-center m-2'>&#xf0c0;</i>
                <div class="card-body">
                    <h5 class="card-title">Alta de propietarios</h5>
                    <p class="card-text">Asocie los propietarios a cada una de las propiedades</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Identifique su comunidad</li>
                    <li class="list-group-item">Añada las propiedades</li>
                    <li class="list-group-item">Asigne los usuarios</li>
                </ul>
            </div>
        </a>
    </div>

    <div class="col xs-col-1 sm-col-6 md-col-6 lg-col-3 xl-col-3">
        {{-- <a href="{{ route('distribuciones.index') }}">   activar en proyecto común--}}
        <a href="">
            <div class="card m-3 p-3 zoom " style="width: 16rem;">

                <i style='font-size:80px' class='fas text-center m-2'>&#xf1fe;</i>
                <div class="card-body">
                    <h5 class="card-title">Gestión de gastos</h5>
                    <p class="card-text">Reparta las cuotas de propietarios según grupos de reparto</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Identifique Comunidad</li>
                    <li class="list-group-item">Seleccione propiedad</li>
                    <li class="list-group-item">Asigne la cuota</li>
                </ul>
            </div>
        </a>
    </div>

    <div class="col xs-col-1 sm-col-6 md-col-6 lg-col-3 xl-col-3">
        <a href="">
            {{-- <a href="{{ route('junta.index') }}"> activar en proyecto común--}}
            <div class=" card m-3 p-3 zoom " style="width: 16rem;">

                <i style='font-size:80px' class='fas text-center m-2'>&#xf64f;</i>
                <div class="card-body">
                    <h5 class="card-title">Foro</h5>
                    <p class="card-text">Boletín actualizado de programación de Juntas e incidencias</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Identifique comunidad</li>
                    <li class="list-group-item">Acceda al foro de noticias</li>
                    <li class="list-group-item">Deje su mensaje</li>
                </ul>
            </div>
        </a>
    </div>
</div>

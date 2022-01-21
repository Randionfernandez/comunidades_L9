<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Configuración
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('comunidades.edit', session('cmd_seleccionada'))}}" class="nav-link">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>Comunidad</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('propiedades.index')}}" class="nav-link {{ SetActiveRoute('propiedades') }}">
                        <i class="fas fa-building nav-icon"></i>
                        <p>Propiedades</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cuentas.index')}}" class="nav-link {{ SetActiveRoute('cuentas.*') }}">
                        <i class="fa fa-euro-sign nav-icon"></i>
                        <p>Cuentas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proveedores.index')}}" class="nav-link {{ SetActiveRoute('proveedores') }}">
                        <i class="fa fa-concierge-bell nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Usuarios</p>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Administración
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard', $comunidad ?? '')}}" class="nav-link {{ SetActiveRoute('dashboard') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>@lang('Panel')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-compass nav-icon"></i>
                        <p>Juntas de propietarios</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proveedores.index')}}" class="nav-link {{ SetActiveRoute('proveedores') }}">
                        <i class="fa fa-concierge-bell nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuarios.index')}}" class="nav-link {{ SetActiveRoute('usuarios.*') }}">
                        <i class="fa fa-tools nav-icon"></i>
                        <p>Incidencias</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documentos.index')}}" class="nav-link {{ SetActiveRoute('documentos.*') }}">
                        <i class="fa fa-file-alt nav-icon"></i>
                        <p>Documentos</p>
                    </a>
                </li>
            </ul>



        <li class="nav-item">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Propietarios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard', $comunidad ?? '')}}" class="nav-link {{ SetActiveRoute('dashboard') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>@lang('Panel')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a onclick="leer_movimientos()" class="nav-link {{ SetActiveRoute('movimientos') }}">
                        <i class="fas fa-calculator nav-icon"></i>
                        <p>@lang('Movimientos bancarios')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('propiedades.index')}}" class="nav-link {{ SetActiveRoute('propiedades') }}">
                        <i class="fas fa-house-user nav-icon"></i>
                        <p>Mis propiedades</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-car-crash nav-icon"></i>
                        <p>Juntas de propietarios</p>
                    </a>
                </li>
            </ul>
    </ul>
</nav>

<script>


    function leer_movimientos() {
        const options = {
            method: "GET",
            headers: {
                "Content-type": "application/json",
                "Accept": "application/json"
            }
        };
        // Petición HTTP
        fetch("/api/v1/movimientos", options)
                .then(response => {
                    if (response.ok)
                        return response.text()
                    else
                        throw new Error(response.status);
                })
                .then(data => {
                    document.getElementById("respuesta").innerHTML = data;
//                    console.log("Datos: " + data);
                })
                .catch(err => {
                    console.error("ERROR: ", err.message)
                });


    }
</script>
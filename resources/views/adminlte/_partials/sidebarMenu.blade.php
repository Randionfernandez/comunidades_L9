<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ route('comunidades.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Comunidades
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('comunidades.index')}}" class="nav-link {{ SetActiveRoute('comunidades.*') }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>Comunidad</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('propiedades.index')}}" class="nav-link {{ SetActiveRoute('propiedades') }}">
                        <i class="fas fa-house-user nav-icon"></i>
                        <p>Propiedades</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('juntas.index')}}" class="nav-link {{ SetActiveRoute('juntas.*') }}">
                        <i class="fa fa-car-crash nav-icon"></i>
                        <p>Convocatorias</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proveedores.index')}}" class="nav-link {{ SetActiveRoute('proveedores') }}">
                        <i class="fa fa-concierge-bell nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cuentas.index')}}" class="nav-link {{ SetActiveRoute('cuentas.*') }}">
                        <i class="fa fa-euro-sign nav-icon"></i>
                        <p>Cuentas</p>
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

        <!--        <li class="nav-item">
                    <a href="/comunidades" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Enlace Sencillo
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>-->
    </ul>
</nav>

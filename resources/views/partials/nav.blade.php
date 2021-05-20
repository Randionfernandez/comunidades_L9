<nav class="navbar navbar-expand-md navbar-light shadow-md bg-success">
    <div class="container">
<!--         <span class="navbar-brand mb-0 h1">{{ config('app.name') }}</span>-->
        <a class="navbar-brand" href="{{ route('comunidades.index') }}">
            <img src="/img/logo.jpg" alt="" height="70">
            <!--               {{ config('app.name') }}-->
        </a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}"
                ><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class='d-flex right'>
                <ul class="navbar-nav navbar-nav-scroll flex-row flex-wrap me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('comunidades.index') }}"
                           >@lang('Comunidades')</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                           >Cerrar sesión</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login') }}"
                           >Login</a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


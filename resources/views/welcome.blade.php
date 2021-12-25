@extends('landpage.layout')


@section('content')



<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 bg-light ">
    <div id="mobile-logo" class="{{-- col-md-1 pl-4 --}} text-center">
        <a href="{{ url('/') }}">
            <img class="m-3" src="{{ asset('images/logo.png') }}" height="49px" width="50px">
        </a>
    </div>
    <!--<div class="offset-md-4 col-md-2">-->
    <h3 class="text-info text-center m-auto">
        {{ config('app.name') }}
    </h3>

<!-- sustituir este blque if por una barra de navegación-->
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-2 px-2 py-2 sm:block{{--  offset-md-4 col-md-3 --}} ">
        @auth
        <a href="{{ route('comunidades.index') }}" class="text-sm text-gray-700 underline">@lang('Seleccionar comunidad')</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">@lang('Login')</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">@lang('Register')</a>

        @endif
        @endauth
    </div>
    @endif

    @include('landpage.carousel')
    @include('landpage.recuadros')



    <div class="row m-auto p-5 with-3d-shadow justify-content-center">
        <div class="card border-light mb-3" style="max-width: 75rem;">
            <div class="card-header"><h3>Quiénes somos</h3></div>
            <div class="card-body">
                <h5 class="card-title">RDN COMUNIDADES</h5>
                <p class="card-text">Somos un equipo de desarrolladores que hemos implementado
                    un software sencillo y económico para facilitar la gestión de comunidades
                    desde una única aplicación web.<br/>
                    Podrá tramitar todas las actividades de las comunidades y condominios, 
                    desde la creación de una nueva comunidad, seguimiento de incidencias; 
                    hasta el cobro de los recibos de los propietarios por domiciliación bancaria.</p>

            </div>
        </div>
    </div>

    <div class="row m-auto p-5 with-3d-shadow justify-content-center">
        <div class="card border-light mb-3" style="max-width: 75rem;">
            <div class="card-header"><h3>Contacto</h3></div><br/>
            <div class="row justify-content-around d-flex flex-lg-nowrap">
                <div class="col xs-col-1 sm-col-6 md-col-6 lg-col-3 ">
                    <div class="card-body m-3 p-5 zoom d-flex flex-column">
                        <h5 class="card-title">Oficinas</h5>
                        <i style='font-size:50px' class='fas text-center m-2'>&#xf3c5;</i><br/>
                        <span>C/Caracas 6,
                            <br/>07007 Palma de Mallorca
                            <br/>Illes Balears <br/>
                            Horario: lunes a viernes de 9:00h a 18:00h</span>
                    </div>
                </div>
                <div class=" col xs-col-1 sm-col-6 md-col-6 lg-col-3 ">
                    <div class="card-body m-3 p-5 zoom">
                        <h5 class="card-title">Contactar por correo</h5>
                        <i style='font-size:50px' class='fas text-center m-2'>  &#xf674;</i><br/>
                        <a href="mailto:randion@cifpfbmoll.eu?Subject=Informacion%20del%20software">randion@cifpfbmoll.eu</a>
                    </div>
                </div>
                <div class=" col xs-col-1 sm-col-6 md-col-6 lg-col-3 ">
                    <div class="card-body m-3 p-5 zoom">
                        <h5 class="card-title">Contactar por teléfono</h5>
                        <i style='font-size:50px' class='fas text-center m-2'>  &#xf1e4;</i><br/>

                        <a class="m-auto" href="tel:+34900111222">+34900111222</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="fixed-bottom bg-secondary text-center py-3">
    {{ config('app.name') }} | Copyright @ {{ date('Y') }}
</footer>
<!--</div>-->
</div>


@endsection
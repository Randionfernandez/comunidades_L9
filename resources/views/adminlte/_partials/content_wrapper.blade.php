<div id="respuesta" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            @yield('header')
        </div><!-- /.container -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            @if (session('status'))
            <div class="alert {{ session('status')['alert'] }}">
                {{ session('status')['msj'] }}
            </div>
            @endif
            <div>
                @yield('content')    
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            @yield('header')
        </div><!-- /.container -->
    </div>
    <!-- /.content-header -->
    @if (session('status'))
    <div class='alert alert-info'>
        {{ session('status') }}
    </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container">

            @yield('content')    

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
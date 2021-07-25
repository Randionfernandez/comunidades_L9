@extends('adminlte.layout')

@section('datatables')
<script>
    $(function () {
        $('#tcmd').DataTable({
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//    $('#tcmd').DataTable({
//        "paging": true,
//        "lengthChange": true,
//        "searching": true,
//        "ordering": true,
//        "info": true,
//        "autoWidth": false,
//        "responsive": true,
//    });
    });
</script>
@endsection


<!--@section('datatables')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable();
    });
</script>
@endsection-->



@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Tus comunidades</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection



@section('content')

@if (!count( $comunidades ))
<div class="alert alert-danger">@lang('There are not communities created yet')</div>
@else
<table id="tcmd" class="table table-striped table-bordered">
    <thead class="text-center">
        <tr>
            <th>@lang('CP')</th>
            <th>@lang('CIF')</th>
            <th>@lang('Activa')</th>
            <th>@lang('Gratuita')</th>
            <th>@lang('Denominación')</th>
            <th>@lang('Acción')</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($comunidades as $comunidad)
        <tr>
            <td>{{ $comunidad->cp }}</td> 
            <td>{{ $comunidad->cif }}</td>
            <td>{{ $comunidad->activa }}</td>
            <td>{{ $comunidad->gratuita }}</td>
            <td>{{ $comunidad->denom }}</td>

            <td class="flex border-2 text-center">
                <a class="btn btn-sm btn-success" href="{{ route('comunidades.seleccionar',['comunidad' => $comunidad ])}}">
                    <span class="fa fa-check-circle"></span>
                </a>
                
                <a class="btn btn-sm btn-info" href="{{ route('comunidades.edit',['comunidad' => $comunidad ])}}">
                    <span class="fa fa-edit"></span>
                </a>
                
                <a class="btn btn-sm btn-danger" href="{{ route('comunidades.destroy',['comunidad' => $comunidad ])}}">
                    <span class="fa fa-trash"></span>
                </a>
            </td> 

        </tr>
        @endforeach

    </tbody>
</table>
{{-- $comunidades->links() --}}
@endif

@endsection

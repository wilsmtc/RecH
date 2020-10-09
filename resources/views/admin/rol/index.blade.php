@extends("theme.$theme.layout")
@section('titulo')
Roles
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/alert/alert.js")}}" type="text/javascript"></script>
	<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-10">
        @include('includes.mensaje')
        @include('includes.form-error')
        @include('includes.mensajeerror')
        <div class="box">
            <div style="text-align: center;" class="box-header with-border">
                <h3 class="box-title"><b>Lista de Roles</b></h3>
                <div class="box-tools pull-right">
                @if(Auth::user()->permiso->añadir == 1)
                    <a href="{{route('crear_rol')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo rol
                    </a>
                @endif
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
                    <thead>
                        <tr>
                            <th class="col-lg-9">Tipo</th>
                            <th class="col-lg-1" style="text-align: center;">Opción</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->tipo}}</td>
                            <td>
                            @if(Auth::user()->permiso->editar == 1)
                                <a href="{{route('editar_rol', ['id' => $data->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar este registro">
                                    <i class="fas fa fa-wrench"></i>
                                </a>
                            @endif
                            @if(Auth::user()->permiso->eliminar == 1)
                                <form action="{{route('eliminar_rol', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar este rol">
                                        <i class="fa fa-fw fa-close"></i>
                                    </button>
                                </form>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
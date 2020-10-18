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
    <div class="col-lg-12">
        @include('includes.mensaje')
        @include('includes.form-error')
        @include('includes.mensajeerror')
        <div class="box">
            <div style="text-align: center;" class="box-header with-border">
                <h3 class="box-title"><b>Lista de Roles</b></h3>
                <div class="box-tools pull-right">
                @if(Auth::user()->roles[0]->añadir == 1)
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
                            <th class="col-lg-6">Tipo</th>
                            <th class="col-lg-1">Añadir</th>
                            <th class="col-lg-1">Editar</th>
                            <th class="col-lg-1">Eliminar</th>
                            <th class="col-lg-1" style="text-align: center;">Opción</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->tipo}}</td>
                            <td style="text-align: center;">
                                @if($data->añadir==1)
                                    <span class="label label-success">
                                        <label style="width:20px">S i</label>
                                    </span>
                                @endif
                                @if($data->añadir==0)
                                    <span class="label label-danger">
                                        <label style="width:20px">N o</label>
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if($data->editar==1)
                                    <span class="label label-success">
                                        <label style="width:20px">S i</label>
                                    </span>
                                @endif
                                @if($data->editar==0)
                                    <span class="label label-danger">
                                        <label style="width:20px">N o</label>
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if($data->eliminar==1)
                                    <span class="label label-success">
                                        <label style="width:20px">S i</label>
                                    </span>
                                @endif
                                @if($data->eliminar==0)
                                    <span class="label label-danger">
                                        <label style="width:20px">N o</label>
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                            @if(Auth::user()->roles[0]->editar == 1)
                                <a href="{{route('editar_rol', ['id' => $data->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar este registro">
                                    <i class="fas fa fa-wrench"></i>
                                </a>
                            @endif
                            @if(Auth::user()->roles[0]->eliminar == 1)
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
@extends("theme.$theme.layout")

@section('titulo')
	Personal
@endsection
@section("scripts")
	<script src="{{asset("assets/pages/scripts/admin/personal/index.js")}}" type="text/javascript"></script>
	<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
	@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@csrf
			@include('includes.mensaje')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Personal</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('crear_personal')}}" class="btn btn-block btn-success">
							<i class="fa fa-fw fa-user-plus"></i> Crear Personal
						</a>
					</div>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
                    			<th class="col-lg-1" style="text-align: center;">Nombre</th>
                    			<th class="col-lg-2" style="text-align: center;">Apellidos</th>
								<th class="col-lg-1" style="text-align: center;">No. Carnet</th>
								<th class="col-lg-1" style="text-align: center;">Celular</th>
								<th class="col-lg-1" style="text-align: center;">Unidad</th>
                                <th class="col-lg-2" style="text-align: center;">Cargo</th>
                                <th class="col-lg-2" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($personal as $per)
                            <tr>
                                <td style="text-align: center;">{{$per->nombre}}</td>
                                <td style="text-align: center;">{{$per->apellido}}</td>
                                <td style="text-align: center;">{{$per->ci}}</td>
                                <td style="text-align: center;">{{$per->celular}}</td>
								<td style="text-align: center;">{{$per->unidad->nombre}}</td>
                                <td style="text-align: center;">{{$per->cargo}}</td>
								<td style="text-align: center;">
									@if($per->foto!=null)
									<a href="{{route('ver_personal', $per)}}" class="ver-personal btn btn-info btn-xs tooltipC" title="ver foto" id="ver-personal">
                                        <i class="fa fa-fw fa-camera-retro"></i>
                                    </a>
        							@endif							
									<a href="{{route('editar_personal', ['id' => $per->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar personal">
                                        <i class="fas fa fa-wrench"></i>
                                    </a>
									<form action="{{route('eliminar_personal', ['id' => $per->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Personal">
                                            <i class="fa fa-fw fa-close"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal modal-info fade in" id="modal-ver-personal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Personal</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
@endsection
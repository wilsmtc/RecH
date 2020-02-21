@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection
@section("scripts")
	<script src="{{asset("assets/pages/scripts/admin/alert/alert.js")}}" type="text/javascript"></script>
	<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
	@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@include('includes.mensaje')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Usuarios</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('crear_usuario')}}" class="btn btn-block btn-success">
							<i class="fa fa-fw fa-user-plus"></i> Crear Usuario
						</a>
					</div>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
                    			<th class="col-lg-2" style="text-align: center;">Usuario</th>
                    			<th class="col-lg-2" style="text-align: center;">Nombre</th>
								<th class="col-lg-3" style="text-align: center;">Apellidos</th>
								<th class="col-lg-1" style="text-align: center;">Rol</th>
								<th class="col-lg-3" style="text-align: center;">Correo</th>
								<th class="col-lg-1" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
								<tr>
									<td style="text-align: center;">{{$usuario->usuario}}</td>
									<td style="text-align: center;">{{$usuario->nombre}}</td>
									<td style="text-align: center;">{{$usuario->apellido}}</td>
									<td style="text-align: center;">
									@foreach ($usuario ->roles as $rol)
										@if($rol->id==1)
											<span class="label label-success">
												<label style="width:80px">{{$rol->tipo}}</label>
											</span>
										@endif
										@if($rol->id==2)
											<span class="label label-warning">
												<label style="width:80px">{{$rol->tipo}}</label>
											</span>
										@endif
										@if($rol->id==3)
											<span class="label label-danger">
												<label style="width:80px">{{$rol->tipo}}</label>
											</span>
										@endif								
									@endforeach									
									</td>
									<td style="text-align: center;">{{$usuario->email}}</td>
									<td>
										<a href="{{route('editar_usuario', ['id' => $usuario->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar usuario">
											<i class="fas fa fa-wrench"></i>
										</a>
										<form action="{{route('eliminar_usuario', ['id' => $usuario->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
											@csrf @method("delete")
											<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Usuario">
												<i class="fa fa-fw fa-close "></i>
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
@endsection
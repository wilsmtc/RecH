@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection
@section("scripts")
	<script src="{{asset("assets/pages/scripts/admin/usuario/index.js")}}" type="text/javascript"></script>
	<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
	@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@csrf
			@include('includes.mensaje')
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
				<h3 class="box-title"><b>Lista de Usuarios {{$activo}}</b></h3>
					<div class="box-tools pull-right">
						@if(Auth::user()->roles[0]->añadir == 1)
							@if($activo=='Activos')
								<a href="{{route('crear_usuario')}}" class="btn btn-block btn-success">
									<i class="fa fa-fw fa-user-plus"></i> Crear Usuario
								</a>
							@endif
						@endif
					</div>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
                    			<th class="col-lg-1" style="text-align: center;">Usuario</th>
                    			<th class="col-lg-2" style="text-align: center;">Nombre</th>
								<th class="col-lg-3" style="text-align: center;">Apellidos</th>
								<th class="col-lg-1" style="text-align: center;">Rol</th>
								<th class="col-lg-3" style="text-align: center;">Correo</th>
								<th class="col-lg-2" style="text-align: center;">Opción</th>
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
										@if($rol->id>2)
											<span class="label label-info">
												<label style="width:80px">{{$rol->tipo}}</label>
											</span>
										@endif								
									@endforeach									
									</td>
									<td style="text-align: center;">{{$usuario->email}}</td>
									<td style="text-align: center;">
										@if($usuario->foto!=null)
										<a href="{{route('ver_usuario', $usuario)}}" class="ver-usuario btn btn-info btn-xs tooltipC" title="ver foto" id="ver-usuario">
											<i class="fa fa-fw fa-camera-retro"></i>
										</a>
										@endif
										@if(Auth::user()->roles[0]->editar == 1)
											<a href="{{route('editar_usuario', ['id' => $usuario->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar usuario">
												<i class="fas fa fa-wrench"></i>
											</a>
										@endif
										{{-- <form action="{{route('eliminar_usuario', ['id' => $usuario->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
											@csrf @method("delete")
											<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Usuario">
												<i class="fa fa-fw fa-close "></i>
											</button>
										</form> --}}
										@if(Auth::user()->roles[0]->eliminar == 1)
											@if($usuario->estado==1)
												<a href="{{route('desactivar_usuario', ['id' => $usuario->id])}}" class="btn btn-success btn-xs tooltipC" 
													onclick="return confirm('¿Esta seguro de inactivar al usuario?')" title="desactivar usuario" id="usuario_rol">
													<i class="fas fa fa-user"></i>
												</a>
											@endif	
											@if($usuario->estado==0)
												<a href="{{route('activar_usuario', ['id' => $usuario->id])}}" class="btn btn-danger btn-xs tooltipC" 
													onclick="return confirm('¿Esta seguro de activar al usuario?')" title="activar usuario" id="usuario_rol">
													<i class="fas fa fa-user"></i>
												</a>
											@endif
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
	<div class="modal modal-info fade in" id="modal-ver-usuario" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Usuario</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
@endsection
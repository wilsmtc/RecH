@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Usuarios</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('crear_usuario')}}" class="btn btn-block btn-success btn-sm">
							<i class="fa fa-fw fa-plus-circle"></i> Crear Usuario
						</a>
					</div>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
                    			<th class="col-lg-2" style="text-align: center;">Usuario</th>
                    			<th class="col-lg-2" style="text-align: center;">Nombre</th>
								<th class="col-lg-3" style="text-align: center;">Aellido</th>
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
									<td style="text-align: center;">{{$usuario->rol}}</td>
									<td style="text-align: center;">{{$usuario->email}}</td>
									<td>
										<a href="{{route('editar_usuario', ['id' => $usuario->id])}}" class="btn-accion-tabla tooltipsC" title="Editar usuario">
											<i class="fa fa-fw fa-pencil"></i>
										</a>
										<form action="{{route('eliminar_usuario', ['id' => $usuario->id])}}" class="d-inline form-eliminar" method="POST">
											@csrf @method("delete")
											<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar usuario">
												<i class="fa fa-fw fa-trash text-danger"></i>
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
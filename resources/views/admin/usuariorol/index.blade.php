{{-- @extends("theme.$theme.layout")
@section('titulo')
	Usuario Rol
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario-rol/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row" >
		<div class="col-lg-10">
			@include('includes.mensaje')
			<div class="box box-primary">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Usuarios con Roles</b></h3>                      
				</div>
				<div class="box-body table-responsive no.padding">
					@csrf
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th class="col-lg-1" style="text-align: center;">Usuario</th>
                    			<th class="col-lg-1" style="text-align: center;">Rol</th>
                   				<th class="col-lg-1" style="text-align: center;">Estado</th>								
							</tr>
						</thead>
						<tbody id="usuario_rol">
							@foreach($aux as $var)
								<tr>
									<td style="text-align: center;">{{$var->usuario}}</td>
									@foreach($var ->roles as $rol)
										<td style="text-align: center;">{{$rol->tipo}}</td>
										<td style="text-align: center;">
											<input
												id="usuario_rol"
												type="checkbox"
												class="usuario_rol"
												name="usuario_rol"
												value=""
												@if ($rol->estado == 1)
													checked
   												@endif
											>
										</td>	
									@endforeach								
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection --}}

@extends("theme.$theme.layout")
@section('titulo')
	Usuario Rol
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario-rol/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row" >
		<div class="col-lg-10">
			@include('includes.mensaje')
			<div class="box box-primary">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Usuarios con Roles</b></h3>                      
				</div>
				<div class="box-body table-responsive no.padding">
					@csrf
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th class="col-lg-1" style="text-align: center;">Usuario</th>
                    			<th class="col-lg-1" style="text-align: center;">Rol</th>
                   				<th class="col-lg-1" style="text-align: center;">Estado</th>								
							</tr>
						</thead>
						<tbody id="usuario_rol">
							@foreach($aux as $var)
								<tr>
									<td style="text-align: center;">{{$var->usuario}}</td>
									@foreach($var ->roles as $rol)
										<td style="text-align: center;">{{$rol->tipo}}</td>
										<td style="text-align: center;">	
											@if($var->estado==1)
												<a href="{{route('desactivar_usuario', ['id' => $var->id])}}" class="btn btn-success btn-xs tooltipC" 
													onclick="return confirm('¿Esta seguro de inactivar al usuario?')" title="desactivar usuario" id="usuario_rol">
													<i class="fas fa fa-user"></i>
												</a>
											@endif	
											@if($var->estado==0)
												<a href="{{route('activar_usuario', ['id' => $var->id])}}" class="btn btn-danger btn-xs tooltipC" 
													onclick="return confirm('¿Esta seguro de activar al usuario?')" title="activar usuario" id="usuario_rol">
													<i class="fas fa fa-user"></i>
												</a>
											@endif																																												
										</td>	
									@endforeach								
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
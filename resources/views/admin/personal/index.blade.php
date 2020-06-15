{{-- @extends("theme.$theme.layout")

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
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Personal</b></h3>
					@if(Auth::user()->permiso->añadir == 1)	
						<div class="box-tools pull-right">
							<a href="{{route('crear_personal')}}" class="btn btn-block btn-success">
								<i class="fa fa-fw fa-user-plus"></i> Crear Personal
							</a>
						</div>
					@endif
				</div>
				<div class="box-body table-responsive no.padding" style="text-align: center; ">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
                    			<th class="col-lg-1" style="text-align: center;">Nombre</th>
                    			<th class="col-lg-2" style="text-align: center;">Apellidos</th>
								<th class="col-lg-1" style="text-align: center;">No.Carnet</th>
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
									@if($per->curriculum!=null)
									<a href="{{route('ver_curriculum', ['id' => $per->id])}}" target="_blank" class="ver-curriculum btn btn-success btn-xs tooltipC" title="ver curriculum" id="ver-curriculum">
										<i class="fa fa-fw fa-file"></i>																			
                                    </a>
									@endif	
									@if(Auth::user()->permiso->editar == 1)														
										<a href="{{route('editar_personal', ['id' => $per->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar personal">
											<i class="fas fa fa-wrench"></i>
										</a>
									@endif
									@if(Auth::user()->permiso->eliminar == 1)
										<form action="{{route('eliminar_personal', ['id' => $per->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
											@csrf @method("delete")
											<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Personal">
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
@endsection --}}

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
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Personal</b></h3>
					@if(Auth::user()->permiso->añadir == 1)	
						<div class="box-tools pull-right">
							<a href="{{route('crear_personal')}}" class="btn btn-block btn-success">
								<i class="fa fa-fw fa-user-plus"></i> Crear Personal
							</a>
						</div>
					@endif
				</div>
				<div class="box-body table-responsive no.padding" style="text-align: center; ">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr style="width: 100%">
                    			<th style="text-align: center; width: 17%">Nombre</th>
                    			<th style="text-align: center; width: 25%">Apellidos</th>
								<th style="text-align: center; width: 27%">Unidad</th>
								<th style="text-align: center; width: 5%"><h6><b>Días Ganados</b></h6></th>
								<th style="text-align: center; width: 5%"><h6><b>Días Tomados</b></h6></th>
                                <th style="text-align: center; width: 5%"><h6><b>Días Libres</b></h6></th>
                                <th style="text-align: center; width: 16%">Opción</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($personal as $per)
                            <tr>
                                <td style="text-align: center;">{{$per->nombre}}</td>
                                <td style="text-align: center;">{{$per->apellido}}</td>
                                <td style="text-align: center;">{{$per->unidad->nombre}}</td>
                                <td style="text-align: center;">{{$dias_g=MyHelper::DiasGanados($per->fecha_ing)}}</td>
								<td style="text-align: center;">{{$dias_t=MyHelper::DiasTomados($per->id)}}</td>
									@if(($dias_g-$dias_t)>90)
										<th style="text-align: center; color: red">{{$dias_g-$dias_t}}</th>
									@endif
									@if(($dias_g-$dias_t)<90)
										<th style="text-align: center; color: green">{{$dias_g-$dias_t}}</th>
									@endif
								<td style="text-align: right;">								
									@if($per->curriculum!=null)
										<a href="{{route('ver_curriculum', ['id' => $per->id])}}" target="_blank" class="ver-curriculum btn btn-success btn-xs tooltipC" title="ver curriculum" id="ver-curriculum">
											<i class="fa fa-fw  fa-file-pdf-o"></i>																			
										</a>
									@endif
									<a href="{{route('ver_personal', ['id' => $per->id])}}" class="btn btn-primary btn-xs tooltipC" title="Ver Personal">
										<i class="fas fa fa-navicon"></i>
									</a>
									@if(Auth::user()->permiso->añadir == 1)
										@if(($dias_g-$dias_t)>0)
											<a href="{{route('crear_vacacion', ['id' => $per->id])}}" class="btn btn-warning btn-xs tooltipC" title="Descontar Vacación">
												<i class="fas fa fa-vimeo"></i>
											</a>
										@endif	
									@endif
									@if(Auth::user()->permiso->eliminar == 1)
										<form action="{{route('eliminar_personal', ['id' => $per->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
											@csrf @method("delete")
											<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Personal">
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

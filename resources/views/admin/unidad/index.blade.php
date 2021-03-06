@extends("theme.$theme.layout")
@section('titulo')
	Unidades
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@include('includes.mensaje')
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Unidades</b></h3>
					<div class="box-tools pull-right">
						@if(Auth::user()->roles[0]->añadir == 1)
							<a href="{{route('crear_unidad')}}" class="btn btn-block btn-success btn-sm">
								<i class="fa fa-fw fa-plus-circle"></i> Crear nueva Unidad
							</a>	
						@endif						
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
								
                    			<th class="col-lg-3" style="text-align: center;">Nombre</th>
                   				<th class="col-lg-1" style="text-align: center;">Sigla</th>
								<th class="col-lg-6" style="text-align: center;">Descripción</th>
								<th class="col-lg-2" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
							@foreach($unidades as $unid)
								<tr>
									
									<td style="text-align: center;">{{$unid->nombre}}</td>
									<td style="text-align: center;">{{$unid->sigla}}</td>
									<td style="text-align: center;">{{$unid->descripcion}}</td>
									<td style="text-align: center;">
										<a href="{{route('ver_unidad', ['id' => $unid->id])}}" class="btn btn-info btn-xs tooltipC" title="ver componentes">
											<i class="fas fa fa-th"></i>
										</a>
										@if(Auth::user()->roles[0]->editar == 1)
											<a href="{{route('editar_unidad', ['id' => $unid->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar unidad">
												<i class="fas fa fa-wrench"></i>
											</a>	
										@endif
										@if(Auth::user()->roles[0]->eliminar == 1)							
											<form action="{{route('eliminar_unidad', ['id' => $unid->id])}}" class="d-inline form-eliminar" method="POST">
												@csrf @method("delete")
												<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar unidad">
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
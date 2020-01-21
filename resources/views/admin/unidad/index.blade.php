@extends("theme.$theme.layout")
@section('titulo')
	Unidades
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/alert/alert.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@include('includes.mensaje')
			<div class="box box-primary">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Unidades</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('crear_unidad')}}" class="btn btn-block btn-success btn-sm">
							<i class="fa fa-fw fa-plus-circle"></i> Crear nueva Unidad
						</a>
					</div>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped" id="tabla-data">
						<thead>
							<tr>
								<th class="col-lg-1" style="text-align: center;">ID</th>
                    			<th class="col-lg-3" style="text-align: center;">Nombre</th>
                   				<th class="col-lg-1" style="text-align: center;">Sigla</th>
								<th class="col-lg-6" style="text-align: center;">Descripcion</th>
								<th class="col-lg-1" style="text-align: center;">opcion</th>
							</tr>
						</thead>
						<tbody>
							@foreach($unidades as $unid)
								<tr>
									<td style="text-align: center;">{{$unid->id}}</td>
									<td style="text-align: center;">{{$unid->nombre}}</td>
									<td style="text-align: center;">{{$unid->sigla}}</td>
									<td style="text-align: center;">{{$unid->descripcion}}</td>
									<td>
										<a href="{{route('editar_unidad', ['id' => $unid->id])}}" class="btn-accion-tabla tooltipsC" title="Editar unidad">
											<i class="fa fa-fw fa-pencil"></i>
										</a>
										<form action="{{route('eliminar_unidad', ['id' => $unid->id])}}" class="d-inline form-eliminar" method="POST">
											@csrf @method("delete")
											<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar unidad">
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
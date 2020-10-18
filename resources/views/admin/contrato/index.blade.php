@extends("theme.$theme.layout")
@section('titulo')
	Contrato
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
					<h3 class="box-title"><b>Lista de Contratos</b></h3>
					<div class="box-tools pull-right">
						@if(Auth::user()->roles[0]->añadir == 1)
							<a href="{{route('crear_contrato')}}" class="btn btn-block btn-success btn-sm">
								<i class="fa fa-fw fa-plus-circle"></i> Crear nuevo Contrato
							</a>
						@endif
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
								
                    			<th class="col-lg-6" style="text-align: center;">Nombre</th>
								<th class="col-lg-3" style="text-align: center;">Vacación</th>
								<th class="col-lg-2" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contratos as $contrato)
								<tr>			
									<td style="text-align: center;">{{$contrato->nombre}}</td>
                                    <td style="text-align: center;">
                                        @if($contrato->vacacion=="si")
											<span class="label label-success">
												<label style="width:60px">TIENE</label>
											</span>
										@endif
										@if($contrato->vacacion=="no")
											<span class="label label-danger">
												<label style="width:60px">NO TIENE</label>
											</span>
										@endif
                                    </td>
									<td style="text-align: center;">
									<a href="{{route('ver_contrato', ['id' => $contrato->id])}}" class="btn btn-info btn-xs tooltipC" title="ver componentes">
										<i class="fas fa fa-th"></i>
									</a>
									@if(Auth::user()->roles[0]->editar == 1)
										<a href="{{route('editar_contrato', ['id' => $contrato->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar contrato">
												<i class="fas fa fa-wrench"></i>
										</a>
									@endif	
									@if(Auth::user()->roles[0]->eliminar == 1)								
										<form action="{{route('eliminar_contrato', ['id' => $contrato->id])}}" class="d-inline form-eliminar" method="POST">
											@csrf @method("delete")
											<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar contrato">
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
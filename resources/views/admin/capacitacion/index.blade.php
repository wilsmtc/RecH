@extends("theme.$theme.layout")
@section('titulo')
	Capacitación
@endsection
@section("scripts")
	<script src="{{asset("assets/pages/scripts/admin/alert/alert.js")}}" type="text/javascript"></script>
	{{-- <script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script> --}}
@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			@include('includes.mensaje')
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Capacitaciones</b></h3>
					<div class="box-tools pull-right">
						@if(Auth::user()->roles[0]->añadir == 1)
							<a href="{{route('crear_capacitacion')}}" class="btn btn-block btn-success btn-sm">
								<i class="fa fa-fw fa-plus-circle"></i> Crear Capacitación
							</a>
						@endif
					</div>
				</div>
				{{-- busqueda --}}
				<form class="form-inline ml-3">
					<div class="input-group">
					  <input type="search" name="search" class="form-control" placeholder="Buscar por nombre" aria-label="search" value="{{old('search', $search ?? '')}}" autocomplete="off">						
					  <span class="input-group-btn">							
							<button type="submit" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
							
						</span>
					</div>
				</form>
				@if($search)
					<div class="callout callout-info">
						<a href="{{route('capacitacion')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC" title="volver">
							<i class="fa fa-fw fa-reply-all"></i>																			
						</a>
						Los resultados de tu busqueda <b>'{{$search}}'</b> son:	
					</div>
				@endif
				{{-- busqueda --}}
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
								
                    			<th class="col-lg-4" style="text-align: center;">Unidad</th>
								<th class="col-lg-4" style="text-align: center;">Nombre</th>
								<th class="col-lg-1" style="text-align: center;">Tipo</th>
								<th class="col-lg-2" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
							@foreach($capacitaciones as $capacitacion)
								<tr>											
									<td style="text-align: center;">{{$capacitacion->unidad->nombre}}</td>
									<td style="text-align: center;">{{$capacitacion->nombre}}</td>
									<td style="text-align: center;">
										@php
											$info = new SplFileInfo($capacitacion->documento); //agarra la cadena y lo vuelve tipo file
											$extencion=$info->getExtension(); //agarra la extencion del file
										@endphp
											@if($extencion=="pdf")									
												<span class="label label-danger">
													<label style="width:80px">PDF</label>
												</span>																													
											@endif
											@if($extencion=="docx")
												<span class="label label-primary">
													<label style="width:80px">WORD</label>
												</span>	
											@endif
											@if($extencion=="pptx")
												<span class="label label-warning">
													<label style="width:80px">PowerPoint</label>
												</span>	
											@endif		
									</td>
									<td style="text-align: center;">
										<a href="{{route('ver_capacitacion', ['id' => $capacitacion->id])}}" target="_blank" class="ver-capacitacion btn btn-success btn-xs tooltipC" title="ver capacitacion" id="ver-capacitacion">																
											<i class="fa fa-fw  fa-cloud-download"></i>																															
										</a>	
										@if(Auth::user()->roles[0]->editar == 1)
											<a href="{{route('editar_capacitacion', ['id' => $capacitacion->id])}}" class="btn btn-warning btn-xs tooltipC" title="Editar capacitación">
													<i class="fas fa fa-wrench"></i>
											</a>	
										@endif	
										@if(Auth::user()->roles[0]->eliminar == 1)							
											<form action="{{route('eliminar_capacitacion', ['id' => $capacitacion->id])}}" class="d-inline form-eliminar" method="POST">
												@csrf @method("delete")
												<button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar capacitación">
													<i class="fa fa-fw fa-close"></i>
												</button>
											</form>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$capacitaciones->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
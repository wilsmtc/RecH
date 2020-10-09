@extends("theme.$theme.layout")

@section('titulo')
	Personal
@endsection
@section("scripts")
	{{-- <script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script> --}}
@endsection
@section('contenido')
	<div  class="row">		
		<div class="col-lg-12">			
			@csrf
			@include('includes.mensaje')
			@include('includes.mensajeerror')
			<div class="box box-primary">
				<div style="text-align: center; background-color:lightblue;" class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Personal Activo</b></h3>
					@if(Auth::user()->permiso->añadir == 1)	
						<div class="box-tools pull-right">
							<a href="{{route('crear_personal')}}" class="btn btn-block btn-success">
								<i class="fa fa-fw fa-user-plus"></i> Crear Personal
							</a>
						</div>
					@endif
				</div>
				{{-- busqueda --}}
				<form class="form-inline ml-3">
					<div class="input-group">
					  <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="search" value="{{old('search', $search ?? '')}}" autocomplete="off">						
					  <span class="input-group-btn">							
							<button type="submit" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
							
						</span>
					</div>
				</form>
				@if($search)
					<div class="callout callout-info">
						<a href="{{route('personal')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC" title="volver">
							<i class="fa fa-fw fa-reply-all"></i>																			
						</a>
						Los resultados de tu busqueda <b>'{{$search}}'</b> son:	
					</div>
				@endif
				{{-- busqueda --}}
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
								@if($per->contrato->vacacion=="si")
									<td style="text-align: center;">{{$dias_g=MyHelper::DiasGanados($per->fecha_ing)}}</td>
									<td style="text-align: center;">{{$dias_t=MyHelper::DiasTomados($per->id)}}</td>
										@if(($dias_g-$dias_t)>90)
											<th style="text-align: center; color: red">{{$dias_g-$dias_t}}</th>
										@endif
										@if(($dias_g-$dias_t)<90)
											<th style="text-align: center; color: rgb(72, 179, 72)">{{$dias_g-$dias_t}}</th>
										@endif
								@endif
								@if($per->contrato->vacacion=="no")
									<th style="text-align: center; color: red">X</th>
									<th style="text-align: center; color: red">X</th>
									<th style="text-align: center; color: red">0</th>
								@endif
								<td style="text-align: right;">								
									@if($per->curriculum!=null)
										<a href="{{route('ver_curriculum', ['id' => $per->id])}}" target="_blank" class="ver-curriculum btn btn-success btn-xs tooltipC" title="ver curriculum" id="ver-curriculum">
											<i class="fa fa-fw  fa-file-pdf-o"></i>																			
										</a>
									@endif
									
									@if(Auth::user()->permiso->añadir == 1)
										@if($per->contrato->vacacion=="si")
											@if(($dias_g-$dias_t)>0)
												<a href="{{route('crear_vacacion', ['id' => $per->id])}}" class="btn btn-warning btn-xs tooltipC" title="Descontar Vacación">
													<i class="fas fa fa-vimeo"></i>
												</a>
											@endif
										@endif	
									@endif
									<a href="{{route('ver_personal', ['id' => $per->id])}}" class="btn btn-primary btn-xs tooltipC" title="Ver Personal">
										<i class="fas fa fa-navicon"></i>
									</a>
									{{-- @if(Auth::user()->permiso->eliminar == 1)
										<form action="{{route('eliminar_personal', ['id' => $per->id])}}" class="d-inline form-eliminar" method="POST" id="form-eliminar">
											@csrf @method("delete")
											<button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Retirar Personal">
												<i class="fa fa-fw fa-user"></i>
											</button>
										</form>
									@endif									 --}}
									@if(Auth::user()->permiso->eliminar == 1)
										<a href="{{route('retirar_personal', ['id' => $per->id])}}" class="btn btn-danger btn-xs eliminar tooltipsC" title="Retirar Personal">
											<i class="fas fa fa-close"></i>
										</a>
									@endif
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$personal->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection

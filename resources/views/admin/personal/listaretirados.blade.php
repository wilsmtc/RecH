@extends("theme.$theme.layout")

@section('titulo')
	Personal Retirado
@endsection
@section("scripts")
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
					<h3 class="box-title"><b>Lista de Personal Retirado</b></h3>
				</div>
				<div class="box-body table-responsive no.padding" style="text-align: center; ">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>
                    			<th class="col-lg-2" style="text-align: center;">Nombre</th>
                                <th class="col-lg-2" style="text-align: center;">Apellidos</th>
                                <th class="col-lg-1" style="text-align: center;">F_ingreso</th>
								<th class="col-lg-1" style="text-align: center;">F_retiro</th>
								<th class="col-lg-2" style="text-align: center;">Motivo</th>
                                <th class="col-lg-2" style="text-align: center;">Opción</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($retirados as $per)
                            <tr>
                                <td style="text-align: center;">{{$per->nombre}}</td>
                                <td style="text-align: center;">{{$per->apellido}}</td>
                                <td style="text-align: center;">{{$per->fecha_ing}}</td>
                                <td style="text-align: center;">{{$per->fecha_ret}}</td>
                                <td style="text-align: center;">{{$per->razon_ret}}</td>
								<td style="text-align: center;">								
									@if($per->curriculum!=null)
									<a href="{{route('ver_curriculum', ['id' => $per->id])}}" target="_blank" class="ver-curriculum btn btn-success btn-xs tooltipC" title="ver curriculum" id="ver-curriculum">
										<i class="fa fa-fw fa-file"></i>																			
                                    </a>
                                    @endif	
                                    <a href="{{route('ver_personal', ['id' => $per->id])}}" class="btn btn-primary btn-xs tooltipC" title="Ver Personal">
										<i class="fas fa fa-navicon"></i>
									</a>
									<a href="{{route('activar_personal', ['id' => $per->id])}}" class="btn btn-danger btn-xs tooltipC" onclick="return confirm('la fecha de ingreso se modificara automaticamente a la fecha actual ¿Desa continuar?')" title="incorporar personal">
										<i class="fas fa fa-user"></i>
									</a>
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
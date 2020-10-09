@extends("theme.$theme.layout")
@section('titulo')
	Contrato
@endsection
@section("scripts")
	<script src="{{asset("assets/pages/scripts/admin/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div  class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div style="background-color:lightblue; text-align: center;" class="box-header whit.border">
                    <div class="box-tools pull-right">
                        <a href="{{route('contrato')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver a Contratos
                        </a>
                    </div>
                    <h3 class="box-title"><b>{{$contrato->nombre}}</b></h3>
                </div>
                <div>
                    <div class="box-tools pull-right col-lg-2">
                        <a href="{{route('pdf_contrato', ['id' => $contrato->id])}}" target="_blank" class="btn btn-block btn-success btn-sm">
                            <i class=" fa fa-file-pdf-o"></i> Ver en PDF
                        </a>
                    </div>                  
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="tabla-data" style="background-color:mintcream;">
						<thead>
							<tr>								
                    			<th class="col-lg-1" style="text-align: center;">Núm de C.I. </th>
                   				<th class="col-lg-2" style="text-align: center;">Nombre</th>
								<th class="col-lg-2" style="text-align: center;">Apellidos</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($personal as $per)                          
                            @if($per->contrato->nombre==$contrato->nombre)
								<tr>									
									<td style="text-align: center;">{{$per->ci}}</td>
									<td style="text-align: center;">{{$per->nombre}}</td>
									<td style="text-align: center;">{{$per->apellido}}</td>									
                                </tr>
                            @endif
							@endforeach
                        </tbody>                       
                    </table>
				</div>
			</div>
		</div>
	</div>
@endsection
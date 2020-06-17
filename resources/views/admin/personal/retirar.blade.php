@extends("theme.$theme.layout")
@section('titulo')
	Retirar Personal
@endsection
@section('scripts')
	<script src="{{asset("assets/pages/scripts/admin/retiro/crear.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/admin/flatpickr/flatpickr.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			@include('includes.form-error')
        	@include('includes.mensaje')
			<div class="box box-danger">
				<div style="text-align: center;" class="box-header whit.border">
                <h3 class="box-title"><b>Retirar a: {{$personal->nombre}} {{$personal->apellido}}</b></h3>
					<div class="box-tools pull-right">
                        <a href="{{route('personal')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver
                        </a>
                    </div>
                </div>
                <form action="{{route('guardar_retiro', ['id' => $personal->id])}}" id="form-general" class="form-horizontal form-general" method="POST">
                    
                    @csrf @method("put")
					<div class="box-body">
						<div class="form-group">
                            <label for="fecha_ret" class="col-lg-3 control-label requerido">Fecha de Retiro</label>
                            <div class="col-lg-5">
                                <input type="date" min="1960-01-01" name="fecha_ret" id="fecha_ret" class="form-control" value="{{old('fecha_ret' ?? '')}}" required placeholder="Fecha de Retiro"/>		
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="razon_ret" class="col-lg-3 control-label requerido">Razón del Retiro</label>
                            <div class="col-lg-5">
                                <select name="razon_ret" id="razon_ret" class="form-control" required >
                                    <option value="">Seleccione su Opción</option>
                                    <option value="Renuncia"{{old("razon_ret",$personal->razon_ret?? "")=="Renuncia" ? "selected":""}}>Renuncia</option>
                                    <option value="Jubilación"{{old("razon_ret",$vacacion->razon_ret?? "")=="Jubilación" ? "selected":""}}>Jubilación</option>
                                    <option value="Invalidez"{{old("razon_ret",$vacacion->razon_ret?? "")=="Invalidez" ? "selected":""}}>Invalidez</option>
                                    <option value="Destitución"{{old("razon_ret",$vacacion->razon_ret?? "")=="Destitución" ? "selected":""}}>Destitución</option>
                                    <option value="Abandono"{{old("razon_ret",$vacacion->razon_ret?? "")=="Abandono" ? "selected":""}}>Abandono</option>
                                    <option value="Retiro forzoso"{{old("razon_ret",$vacacion->razon_ret?? "")=="Retiro forzoso" ? "selected":""}}>Retiro forzoso</option>
                                    <option value="Rescisión de contrato"{{old("razon_ret",$vacacion->razon_ret?? "")=="Rescisión de contrato" ? "selected":""}}>Rescisión de contrato</option>
                                    <option value="Motivos Personales"{{old("razon_ret",$vacacion->razon_ret?? "")=="Motivos Personales" ? "selected":""}}>Motivos Personales</option>
                                </select>
                            </div>
                        </div>
                    </div>                   
					<div class="box-footer">
						<div class="col-lg-4"></div>
						<div class="col-lg-6">
							<button type="reset" class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn btn-danger eliminar" id="retirar" onclick="return confirm('¿seguro que desea retiar al personal?')">Retirar</button>
						</div>    
                    </div>                   
                </form>         			
			</div>
		</div>
	</div>
@endsection
<input type="hidden" name="personal_id" id="personal_id" value={{$personal->id}}>
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-5">
        <select name="tipo" id="tipo" class="form-control" required >
            <option value="">Seleccione su Opción</option>
			<option value="Vacación"{{old("tipo",$vacacion->tipo?? "")=="Vacación" ? "selected":""}}>Vacación</option>
			<option value="Falta"{{old("tipo",$vacacion->tipo?? "")=="Falta" ? "selected":""}}>Falta</option>
			<option value="Permiso"{{old("tipo",$vacacion->tipo?? "")=="Permiso" ? "selected":""}}>Permiso</option>
        </select>
    </div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Razón</label>
	<div class="col-lg-5">
		<input type="text" name="razon" id="razon" class="form-control" value="{{old('razon', $vacacion->razon ?? '')}}" autocomplete="on" placeholder="Razón de su ausencia"/>		
	</div>
</div>

<div class="form-group">
	<label for="cargo" class="col-lg-3 control-label requerido">Días Tomados</label>
	<div class="col-lg-5">
		<input type="number" min="1" max={{$dias_l}} name="dias_t" id="dias_t"  class="form-control" value="{{old('dias_t', $vacacion->cargo ?? '')}}" required placeholder="Cantidad de días" autocomplete="off"/>		
	</div>
</div>

<div class="form-group">
	<label for="fecha_ini" class="col-lg-3 control-label requerido">Fecha de Inicio</label>
	<div class="col-lg-5">
		<input type="date" name="fecha_ini" id="fecha_ini" class="form-control" value="{{old('fecha_ini', $vacacion->fecha_ini ?? '')}}" required placeholder="Fecha de inicio"/>		
	</div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Observaciones</label>
	<div class="col-lg-5">
		<input type="text" name="observacion" id="observacion" class="form-control" value="{{old('observacion', $vacacion->observacion ?? '')}}" autocomplete="on'" placeholder="observación"/>		
	</div>
</div>
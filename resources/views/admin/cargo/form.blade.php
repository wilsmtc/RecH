<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre del Cargo</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $cargo->nombre ?? '')}}" required autocomplete="off" placeholder="Nombre del Cargo"/>		
	</div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Descripción</label>
	<div class="col-lg-5">
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $cargo->descripcion ?? '')}}" autocomplete="off" placeholder="Desscripción"/>		
	</div>
</div>
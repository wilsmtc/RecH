<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $unid->nombre ?? '')}}" required placeholder="Nombre de la Unidad"/>		
	</div>
</div>

<div class="form-group">
	<label for="sigla" class="col-lg-3 control-label requerido">Sigla</label>
	<div class="col-lg-5">
		<input type="text" name="sigla" id="sigla" class="form-control" value="{{old('sigla', $unid->sigla ?? '')}}" required placeholder="Sigla"/>		
	</div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Descripcion</label>
	<div class="col-lg-5">
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $unid->descripcion ?? '')}}"/>		
	</div>
</div>
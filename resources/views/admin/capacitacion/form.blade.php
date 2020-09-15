<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $capacitacion->nombre ?? '')}}" required placeholder="Nombre de la Capacitación" autocomplete="off"/>		
	</div>
</div>

<div class="form-group">
    <label for="unidad_id" class="col-lg-3 control-label requerido">Unidad de la Capacitación</label>
    <div class="col-lg-5">
        <select name="unidad_id" id="unidad_id" class="form-control" required >
            <option value="">Seleccione la Unidad</option>
            @foreach($unidad as $id => $nombre)
                <option
                value="{{$id}}"{{old("unidad_id",$capacitacion->unidad->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Descripción</label>
	<div class="col-lg-5">
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $capacitacion->descripcion ?? '')}}" autocomplete="off"/>		
	</div>
</div>
<div class="form-group">
    <label for="documento" class="col-lg-3 control-label requerido">Documento</label>
    <div class="col-lg-4">
        <input type="file" name="documento_up" id="documento" data-initial-preview="{{isset($capacitaciones->documento) ? Storage::url("imagenes/documentos/capacitacion/$capacitacion->documento") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=documento+de+capacitación"}}" accept=".pdf, .docx, .pptx"/>
    </div>
</div>
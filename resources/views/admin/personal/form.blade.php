<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $personal->nombre ?? '')}}" required placeholder="Nombre" autocomplete="off"/>		
	</div>
</div>

<div class="form-group">
	<label for="apellido" class="col-lg-3 control-label requerido">Apellidos</label>
	<div class="col-lg-5">
		<input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $personal->apellido ?? '')}}" required placeholder="Apellidos"/>		
	</div>
</div>

<div class="form-group">
	<label for="ci" class="col-lg-3 control-label requerido">Número de Carnet</label>
	<div class="col-lg-5">
		<input type="text" name="ci" id="ci" class="form-control" value="{{old('ci', $personal->ci ?? '')}}" required minlength="7"  placeholder="12345678"/>		
	</div>
</div>

<div class="form-group">
	<label for="item" class="col-lg-3 control-label">Número de Item</label>
	<div class="col-lg-5">
		<input type="text" name="item" id="item" class="form-control" value="{{old('item', $personal->item ?? '')}}" minlength="2" maxlength="5" placeholder="12345"/>		
	</div>
</div>

<div class="form-group">
	<label for="celular" class="col-lg-3 control-label">Número de Celular</label>
	<div class="col-lg-5">
		<input type="text" name="celular" id="celular" class="form-control" value="{{old('celular', $personal->celular ?? '')}}" minlength="5" placeholder="12345678"/>		
	</div>
</div>

<div class="form-group">
    <label for="cargo_id" class="col-lg-3 control-label requerido">Cargo</label>
    <div class="col-lg-5">
        <select name="cargo_id" id="cargo_id" class="form-control" required >
            <option value="">Seleccione su Cargo</option>
            @foreach($cargo as $id => $nombre)
                <option
                value="{{$id}}"{{old("cargo_id",$personal->cargo->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
	<label for="fecha_ing" class="col-lg-3 control-label requerido">Fecha de ingreso</label>
	<div class="col-lg-5">
		<input type="date" min="1960-01-01" name="fecha_ing" id="fecha_ing" class="form-control" value="{{old('fecha_ing', $personal->fecha_ing ?? '')}}" required placeholder="Fecha de Ingreso"/>		
	</div>
</div>

<div class="form-group">
    <label for="unidad_id" class="col-lg-3 control-label requerido">Unidad a la que Pertenece</label>
    <div class="col-lg-5">
        <select name="unidad_id" id="unidad_id" class="form-control" required >
            <option value="">Seleccione la Unidad</option>
            @foreach($unidad as $id => $nombre)
                <option
                value="{{$id}}"{{old("unidad_id",$personal->unidad->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                </option>
            @endforeach
        </select>
    </div>
</div>

{{-- <div class="form-group">
    <label for="genero" class="col-lg-3 control-label requerido">Genero</label>
    <div class="col-lg-5">
        <select name="genero" id="genero" class="form-control" required >
            <option value="">Seleccione su Genero</option>
			<option value="Hombre"{{old("genero",$personal->genero?? "")=="Hombre" ? "selected":""}}>Hombre</option>
			<option value="Mujer"{{old("genero",$personal->genero?? "")=="Mujer" ? "selected":""}}>Mujer</option>
        </select>
    </div>
</div> --}}
<div class="form-group">
	<label for="genero" class="col-lg-3 control-label requerido">Genero</label>
	<div class="col-lg-5">
		<input type="radio" name="genero" id="genero" value="Hombre"{{old("genero",$personal->genero?? "")=="Hombre" ? "checked":""}}/>			
		<label for="hombre">Hombre</label>
		<br>
		<input type="radio"  name="genero" id="genero" value="Mujer"{{old("genero",$personal->genero?? "")=="Mujer" ? "checked":""}}/>
		<label for="mujer">Mujer</label>						
	</div>
</div>

<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($personal->foto) ? Storage::url("imagenes/fotos/personal/$personal->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+personal"}}" accept="image/*"/>
    </div>
</div>

<div class="form-group">
    <label for="documento" class="col-lg-3 control-label">Curriculum</label>
    <div class="col-lg-4">
        <input type="file" name="documento_up" id="documento" data-initial-preview="{{isset($personal->curriculum) ? Storage::url("imagenes/documentos/personal/$personal->curriculum") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=documento+personal"}}" accept=".pdf"/>
    </div>
</div>


{{-- <option value="{{$id}}">{{$nombre}}</option>     para el select--}}

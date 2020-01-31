<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $personal->nombre ?? '')}}" required placeholder="Nombre"/>		
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
		<input type="text" name="ci" id="ci" class="form-control" value="{{old('ci', $personal->ci ?? '')}}" required minlength="7" placeholder="12345678"/>		
	</div>
</div>

<div class="form-group">
	<label for="celular" class="col-lg-3 control-label">Número de Celular</label>
	<div class="col-lg-5">
		<input type="text" name="celular" id="celular" class="form-control" value="{{old('celular', $personal->celular ?? '')}}" minlength="5" placeholder="12345678"/>		
	</div>
</div>

<div class="form-group">
	<label for="cargo" class="col-lg-3 control-label requerido">Cargo</label>
	<div class="col-lg-5">
		<input type="text" name="cargo" id="cargo" class="form-control" value="{{old('cargo', $personal->cargo ?? '')}}" required placeholder="Cargo que ocupa"/>		
	</div>
</div>

<div class="form-group">
	<label for="fecha_nac" class="col-lg-3 control-label requerido">Fecha de Nacimiento</label>
	<div class="col-lg-5">
		<input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{old('fecha_nac', $personal->fecha_nac ?? '')}}" required placeholder="Fecha de Nacimiento"/>		
	</div>
</div>

<div class="form-group">
    <label for="unidad_id" class="col-lg-3 control-label requerido">Unidad a la que Pertenece</label>
    <div class="col-lg-5">
        <select name="unidad_id" id="unidad_id" class="form-control" required >
            <option value="">Seleccione la Unidad</option>
            @foreach($unidad as $id => $nombre)
                <option
                value="{{$id}}"{{old("unidad_id",$personal->unidad->id ?? "")==$id ? "selected":""}}>{{$nombre}}</option>
                </option>
            @endforeach
        </select>
    </div>
</div>


{{-- <option value="{{$id}}">{{$nombre}}</option>     para el select--}}

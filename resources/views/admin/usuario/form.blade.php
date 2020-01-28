<div class="form-group">
	<label for="usuario" class="col-lg-3 control-label requerido">Usuario</label>
	<div class="col-lg-5">
		<input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $usuario->usuario ?? '')}}" required placeholder="Nombre de Usuario"/>		
	</div>
</div>

<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $usuario->nombre ?? '')}}" required placeholder="Nombre"/>		
	</div>
</div>

<div class="form-group">
	<label for="apellido" class="col-lg-3 control-label requerido">Apellidos</label>
	<div class="col-lg-5">
		<input type="apellido" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $usuario->apellido ?? '')}}" required placeholder="Apellidos"/>		
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-lg-3 control-label requerido">Correo Electronico</label>
	<div class="col-lg-5">
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $usuario->email ?? '')}}" required placeholder="usuario@ejemplo.com"/>		
	</div>
</div>

<div class="form-group">
	<label for="password" class="col-lg-3 control-label {{!isset($usuario) ? 'requerido' : ''}}">Contraseña</label>
	<div class="col-lg-5">
		<input type="password" name="password" id="password" class="form-control" value="" {{!isset($usuario) ? 'required' : ''}} minlength="6" placeholder="******"/>		
	</div>
</div>

<div class="form-group">
	<label for="re_password" class="col-lg-3 control-label {{!isset($usuario) ? 'requerido' : ''}}">Repita contraseña</label>
	<div class="col-lg-5">
		<input type="password" name="re_password" id="re_password" class="form-control" value="" {{!isset($usuario) ? 'required' : ''}} minlength="6" placeholder="******"/>		
	</div>
</div>

<div class="form-group">
    <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
    <div class="col-lg-5">
        <select name="rol_id" id="rol_id" class="form-control" required>
            <option value="">Seleccione el Rol</option>
            @foreach($rols as $id => $tipo)
                <option
                value="{{$id}}"{{old("rol_id",$usuario->roles[0]->id ?? "")==$id ? "selected":""}}>{{$tipo}}</option>
                </option>
            @endforeach
        </select>
    </div>
</div>

{{-- <option value="{{$id}}">{{$tipo}}</option>     para el select--}}
{{-- {{!isset($usuario) ? 'requerido' : ''}}    // si no existe $usuario(creacion) es requerido --}}
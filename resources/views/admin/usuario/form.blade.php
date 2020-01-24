<div class="form-group">
	<label for="usuario" class="col-lg-3 control-label requerido">Usuario</label>
	<div class="col-lg-5">
		<input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $usuario->usuario ?? '')}}" required/>		
	</div>
</div>

<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $usuario->nombre ?? '')}}" required/>		
	</div>
</div>

<div class="form-group">
	<label for="apellido" class="col-lg-3 control-label requerido">Apellidos</label>
	<div class="col-lg-5">
		<input type="apellido" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $usuario->apellido ?? '')}}" required/>		
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-lg-3 control-label requerido">Correo Electronico</label>
	<div class="col-lg-5">
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $usuario->email ?? '')}}" required/>		
	</div>
</div>

<div class="form-group">
	<label for="password" class="col-lg-3 control-label requerido">Contraseña</label>
	<div class="col-lg-5">
		<input type="password" name="password" id="password" class="form-control" value="" required/>		
	</div>
</div>

<div class="form-group">
	<label for="repassword" class="col-lg-3 control-label requerido">Repita contraseña</label>
	<div class="col-lg-5">
		<input type="passord" name="repassword" id="repassword" class="form-control" value="" required/>		
	</div>
</div>

<div class="form-group">
    <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
    <div class="col-lg-5">
        <select name="rol_id" id="rol_id" class="form-control" required>
            <option value="">Seleccione el rrol</option>
            @foreach($rols as $id => $tipo)
                <option
                value="{{$id}}" {{old('rol_id',$usuario->roles[0]->id ?? "")==$id ? "selected" : ""}}>{{$tipo}}
                </option>
            @endforeach
        </select>
    </div>
</div>

 value="" {{!isset($data) ? 'required' : ''}} minlength="5"

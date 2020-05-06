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
		<input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $usuario->apellido ?? '')}}" required placeholder="Apellidos"/>		
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-lg-3 control-label requerido">Correo Electrónico</label>
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
<div class="form-group">
    <label class="col-lg-3 control-label">Permisos</label>
    <div class="col-lg-5">
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="añadir" id="añadir"
						@if (isset($usuario)&&$usuario->permiso->añadir == 1)
							checked
						@endif
					>Agregar
				</label>
			</div>
		</label>
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="editar" id="editar"
						@if (isset($usuario)&&$usuario->permiso->editar == 1)
							checked
						@endif
					>Editar
				</label>
			</div>
		</label>
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="eliminar" id="eliminar"
						@if (isset($usuario)&&$usuario->permiso->eliminar == 1)
							checked
						@endif
					>Eliminar
				</label>
			</div>
		</label>  
	</div>
</div>

<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($usuario->foto) ? Storage::url("imagenes/fotos/usuario/$usuario->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+de+usuario"}}" accept="image/*"/>
    </div>
</div>

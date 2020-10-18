<div class="form-group">
	<label for="usuario" class="col-lg-3 control-label requerido">Usuario</label>
	<div class="col-lg-5">
		<input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $usuario->usuario ?? '')}}" required placeholder="Nombre de Usuario"/>		
	</div>
</div>

<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $usuario->nombre ?? '')}}" required placeholder="Nombre" onkeyup="NombreMayus()" autocomplete="off"/>		
	</div>
</div>

<div class="form-group">
	<label for="apellido" class="col-lg-3 control-label requerido">Apellidos</label>
	<div class="col-lg-5">
		<input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $usuario->apellido ?? '')}}" required placeholder="Apellidos" onkeyup="ApellidoMayus()" autocomplete="off"/>		
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
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($usuario->foto) ? Storage::url("imagenes/fotos/usuario/$usuario->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+de+usuario"}}" accept="image/*"/>
    </div>
</div>

<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra              
        var palabra = nombre.value;                    //almacenamos el valor del input 
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos  
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula  
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }                                              
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
    var apellido = document.getElementById('apellido');  
    function ApellidoMayus() {                       
        var palabra = apellido.value;                   
        if(!apellido.value) return;                 
        var mayuscula = palabra.substring(0,1).toUpperCase(); 
        if (palabra.length > 0) {                     
            var minuscula = palabra.substring(1).toLowerCase();
        }                                              
        apellido.value = mayuscula.concat(minuscula);  
    }
</script>
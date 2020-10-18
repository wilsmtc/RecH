<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo', $data->tipo ?? '')}}" required placeholder="Nombre de Rol" onkeyup="NombreMayus()"/>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-3 control-label">Permisos</label>
    <div class="col-lg-5">
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="añadir" id="añadir"
						@if (isset($data)&&$data->añadir == 1)
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
						@if (isset($data)&&$data->editar == 1)
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
						@if (isset($data)&&$data->eliminar == 1)
							checked
						@endif
					>Eliminar
				</label>
			</div>
		</label>  
	</div>
</div>

<script>
    var nombre = document.getElementById('tipo');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra              
        var palabra = nombre.value;                    //almacenamos el valor del input 
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos  
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula  
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }                                              
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
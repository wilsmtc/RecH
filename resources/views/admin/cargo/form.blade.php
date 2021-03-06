<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre del Cargo</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $cargo->nombre ?? '')}}" required autocomplete="off" placeholder="Nombre del Cargo" onkeyup="NombreMayus()"/>		
	</div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Descripción</label>
	<div class="col-lg-5">
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $cargo->descripcion ?? '')}}" autocomplete="off" placeholder="Desscripción"/>		
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
</script>
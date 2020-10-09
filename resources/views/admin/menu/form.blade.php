<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-8">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old("nombre",$data->nombre ?? '')}}" autocomplete="off" required placeholder="Nombre del Menú" onkeyup="NombreMayus()"/>		
	</div>
</div>

<div class="form-group">
	<label for="url" class="col-lg-3 control-label requerido">Url</label>
	<div class="col-lg-8">
		<input type="text" name="url" id="url" class="form-control" value="{{old("url", $data->url ?? '')}}" required placeholder="ruta/menú"/>		
	</div>
</div>

<div class="form-group">
	<label for="icono" class="col-lg-3 control-label">Icono</label>
	<div class="col-lg-8">
		<input type="text" name="icono" id="icono" class="form-control" value="{{old("icono", $data->icono ?? '')}}" placeholder="fa-bars"/>		
	</div>
	<div class="col-lg-1">
		<span id="mostrar-icono" class="fa fa-fw{{old("icono")}}"></span>
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

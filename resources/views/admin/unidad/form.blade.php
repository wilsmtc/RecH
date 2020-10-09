<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre de la Unidad</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $unid->nombre ?? '')}}" required placeholder="Nombre de la Unidad" onkeyup="NombreMayus()" autocomplete="off"/>		
	</div>
</div>

<div class="form-group">
	<label for="sigla" class="col-lg-3 control-label requerido">Sigla</label>
	<div class="col-lg-5">
		<input type="text" name="sigla" id="sigla" class="form-control" value="{{old('sigla', $unid->sigla ?? '')}}" required placeholder="Sigla" onkeyup="SiglaMayus()"/>		
	</div>
</div>

<div class="form-group">
	<label for="descripcion" class="col-lg-3 control-label">Descripción</label>
	<div class="col-lg-5">
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $unid->descripcion ?? '')}}" autocomplete="off"/>		
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
	var sigla = document.getElementById('sigla');  //instanciamos el elemento input
        function SiglaMayus() {            //función que capitaliza la primera letra              
        var palabra = sigla.value;                    //almacenamos el valor del input 
        if(!sigla.value) return;                      //Si el valor es nulo o undefined salimos  
        var mayuscula = palabra.toUpperCase(); // almacenamos la mayuscula                                                
        sigla.value = mayuscula;    //escribimos la palabra con la primera letra mayuscula
    }
</script>
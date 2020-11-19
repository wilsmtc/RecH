<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre del Contrato</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $contrato->nombre ?? '')}}" required autocomplete="off" placeholder="Nombre del Contrato" minlength="3" onkeyup="NombreMayus()"/>		
	</div>
</div>

<div class="form-group">
    <label for="vacacion" class="col-lg-3 control-label requerido">Privilegio de Vacación</label>
    <div class="col-lg-5">
        <select name="vacacion" id="vacacion" class="form-control" required >
            <option value="">Seleccione su Opción</option>
            <option value="si"{{old("vacacion",$contrato->vacacion?? "")=="si" ? "selected":""}}>Tiene</option>
            <option value="no"{{old("vacacion",$contrato->vacacion?? "")=="no" ? "selected":""}}>No tiene</option>
        </select>
    </div>
</div>

<div class="form-group">
	<label for="contrato" class="col-lg-3 control-label requerido">Sueldo</label>
	<div class="col-lg-5">
		<input type="number" min="0" name="sueldo_min" id="sueldo_min"  class="form-control" value="{{old('sueldo_min', $contrato->sueldo_min ?? '')}}" autocomplete="off"/>		
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
<div class="form-group">
	<label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
	<div class="col-lg-5">
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $comunicado->nombre ?? '')}}" required placeholder="Nombre" autocomplete="off" onkeyup="NombreMayus()"/>		
	</div>
</div>

<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-5">
        <select name="tipo" id="tipo" class="form-control" required >
            <option value="">Seleccione su Opción</option>
			<option value="Comunicado"{{old("tipo",$comunicado->tipo?? "")=="Comunicado" ? "selected":""}}>Comunicado</option>
			<option value="Convocatoria"{{old("tipo",$comunicado->tipo?? "")=="Convocatoria" ? "selected":""}}>Convocatoria</option>
			<option value="Instructivo"{{old("tipo",$comunicado->tipo?? "")=="Instructivo" ? "selected":""}}>Instructivo</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="documento" class="col-lg-3 control-label requerido">Documento</label>
    <div class="col-lg-4">
        <input type="file" name="documento_up" id="documento" data-initial-preview="{{isset($comunicado->documento) ? Storage::url("imagenes/documentos/comunicado/$comunicado->documento") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=documento+de+capacitación"}}" accept=".pdf"/>
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
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo', $data->tipo ?? '')}}" required placeholder="Nombre de Rol" onkeyup="NombreMayus()"/>
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
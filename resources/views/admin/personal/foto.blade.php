{{-- <div style="text-align: center;"><img src="{{Storage::url("imagenes/fotos/$personal->foto")}}" width="50%" alt="No tiene Fotografia"></div>
<div style="text-align: center;">Nombre: {{$personal->nombre}}  {{$personal->apellido}}</div> --}}
<div class="form-group">    
    <label class="control-label">
        <img src="{{Storage::url("imagenes/fotos/$personal->foto")}}" width="50%" alt="No tiene Fotografia">
        <label class="control-label">
            <div style=""><u>Nombre</u>: <i>{{$personal->nombre}}  {{$personal->apellido}}</i></div>
            <div style=""><u>Unidad</u>: <i>{{$personal->unidad->nombre}}</i></div>
            <div style=""><u>Carnet</u>: <i>{{$personal->ci}}</i></div>
            <div style=""><u>Celular</u>: <i>{{$personal->celular}}</i></div>
            <div style=""><u>Cargo</u>: <i>{{$personal->cargo}}</i></div>
            <div style=""><u>F. Nac.</u>: <i>{{$personal->fecha_nac}}</i></div>
            <div style=""><u>Genero</u>: <i>{{$personal->genero}}</i></div>
        </label>          
    </label>   
</div>
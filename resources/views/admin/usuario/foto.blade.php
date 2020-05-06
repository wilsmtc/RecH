<div class="form-group">    
    <label class="control-label">
        <img src="{{Storage::url("imagenes/fotos/usuario/$usuario->foto")}}" width="50%" alt="No tiene Fotografia">
        <label class="control-label">
            <div style=""><u>Nombre</u>: <i>{{$usuario->nombre}}  {{$usuario->apellido}}</i></div>
            <div style=""><u>Usuario</u>: <i>{{$usuario->usuario}}</i></div>
            {{-- <div style=""><u>Rol</u>: <i>{{$usuario->roles->tipo}}</i></div> --}}
            <div style=""><u>email</u>: <i>{{$usuario->email}}</i></div>
        </label>          
    </label>   
</div>
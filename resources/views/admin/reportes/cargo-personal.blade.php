<!DOCTYPE html>
    <div style="text-align: center;" class="col-lg-5">
        <h3 class="box-title"><i><b>Fundación de Software libre Potosí</b><i></h3>
    </div>
    <div style="text-align: center;" class="col-lg-5">
        <h3 class="box-title"><b>Reporte Cargo-Personal</b></h3>
    </div>
    <div>
        &nbsp;&nbsp;<b> Cargo:      {{$cargo->nombre}}</b>
    </div>
    <div>
        &nbsp;&nbsp;<b> Descripcion:    &nbsp;&nbsp;&nbsp;&nbsp;{{$cargo->descripcion}}</b>                
    </div>
    &nbsp;&nbsp;<b> Fecha:    &nbsp;&nbsp; {{date("d/m/Y")}}</b>                
    </div>
    <br><br>
    <p>
        A continuación se muestra a todo el personal activo con el cargo de: {{$cargo->nombre}}
    </p>
    <div class="container">
        <table border="1" align="center" WIDTH="80%" >
            <thead>
                <tr style="background-color: rgb(212, 212, 255)">
                    <th class="col-lg-1" style="text-align: center;">Núm de CI</th>
                    <th class="col-lg-2" style="text-align: center;">Nombre</th>
                    <th class="col-lg-2" style="text-align: center;">Apellidos</th>
                </tr>
            </thead>          
            <tbody>
                @foreach($personal as $per)                          
                @if($per->cargo->nombre==$cargo->nombre)
                    <tr>									
                        <td style="text-align: center;">{{$per->ci}}</td>
                        <td style="text-align: center;">{{$per->nombre}}</td>
                        <td style="text-align: center;">{{$per->apellido}}</td>									
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</html>
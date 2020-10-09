@extends("theme.$theme.layout")
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="">
                    <div class="panel-heading clearfix" style="background-color: rgb(100, 221, 230)">
                        <h3 class="panel-title pull-left" ><b>Datos del Personal</b></h3>  
                        <div class="box-tools pull-right">
                            @if($personal->estado==1)
                                <a href="{{route('personal')}}" class="btn btn-block btn-info btn-sm">
                                    <i class="fa fa-fw fa-reply-all"></i> Volver
                                </a>
                            @endif
                            @if($personal->estado==0)
                                <a href="{{route('personalretirado')}}" class="btn btn-block btn-info btn-sm">
                                    <i class="fa fa-fw fa-reply-all"></i> Volver
                                </a>
                            @endif
                        </div>
                        @if(Auth::user()->permiso->editar == 1)
                            @if($personal->estado==1)
                                <div class="box-tools pull-right">
                                    <a href="{{route('editar_personal', ['id' => $personal->id])}}" class="btn btn-block btn-warning btn-sm">
                                        <i class="fa fa-fw fa-wrench"></i> Editar
                                    </a>
                                </div>
                            @endif                          
                        @endif                  
                    </div>            
                    <div class="panel-body" >
                        <div class="col-md-4" style="width: 25%; float:left">
                            @if($personal->foto!=null)
                                <img src="{{Storage::url("imagenes/fotos/personal/$personal->foto")}}"
                                alt="fotografia" width="230px" eight="230px">
                            @endif
                            @if($personal->foto==null)
                                <img src="{{asset("assets/$theme/dist/img/silueta_personal.png")}}" 
                                alt="fotografia" width="230px" eight="230px">
                            @endif
                        </div>
                        <div class="col-md-9" >                           
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Nombre:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->nombre}} {{$personal->apellido}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>CI:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->ci}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Tipo Contrato:</b></p>
                                </div>
                                <div class="col-md-9">
                                <i><p>{{$personal->contrato->nombre}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Celular:</b></p>
                                </div>
                                @if($personal->celular==null)
                                    <div class="col-md-9">
                                        <i><p>No cuenta con celular</p></i>
                                    </div>
                                @endif
                                @if($personal->celular!=null)
                                    <div class="col-md-9">
                                        <i><p>{{$personal->celular}}</p></i>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Género</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->genero}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Fecha Ingreso:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->fecha_ing}}</p></i>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Estado:</b></p>
                                </div>
                                @if($personal->estado==1)
                                    <div class="col-md-9">
                                        <i><p>Activo</p></i>
                                    </div>
                                @endif
                                @if($personal->estado==0)
                                    <div class="col-md-9">
                                        <i><p>Retirado</p></i>
                                    </div>
                                @endif
                            </div>                         
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Cargo:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->cargo->nombre}}</p></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Unidad:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->unidad->nombre}}</p></i><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" >
                    <div class="panel-heading" style="background-color: rgb(105, 204, 100)">
                        <h3 class="panel-title"><b>Vacaciones</b></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 15%">Fecha</th>
                                <th style="text-align: center; width: 10%">Nro Dias</th>
                                <th style="text-align: center; width: 30%">Razón</th>
                                <th style="text-align: center; width: 35%">Observación</th>
                                <th style="text-align: center; width: 10%">Opción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($personal->vacacion as $vac)
                                @if($vac->tipo == 'Vacación')
                                    <tr>
                                        <td style="text-align: center;">{{$vac->fecha_ini}}</td>
                                        <td style="text-align: center;">{{$vac->dias_t}}</td>
                                        <td style="text-align: center;">{{$vac->razon}}</td> 
                                            @if($vac->observacion==null)
                                                <td style="text-align: center;">ninguna</td>
                                            @endif
                                            @if($vac->observacion!=null)
                                                <td style="text-align: center;">{{$vac->observacion}}</td>
                                            @endif
                                        <td style="text-align: center;">
                                        @if($vac->memorandum!=null)
                                            <a href="{{route('ver_memorandum', ['id' => $vac->id])}}" target="_blank" class="btn btn-success btn-xs tooltipC" title="ver memorandum" id="ver-memorandum">
                                                <i class="fa fa-fw  fa-file-pdf-o"></i>																			
                                            </a>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <div class="panel-heading" style="background-color: rgb(228, 230, 100)">
                        <h3 class="panel-title"><b>Permisos</b></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 15%">Fecha</th>
                                <th style="text-align: center; width: 10%">Nro Dias</th>
                                <th style="text-align: center; width: 30%">Razón</th>
                                <th style="text-align: center; width: 35%">Observación</th>
                                <th style="text-align: center; width: 10%">Opción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($personal->vacacion as $vac)
                                @if($vac->tipo == 'Permiso')
                                    <tr>
                                        <td style="text-align: center;">{{$vac->fecha_ini}}</td>
                                        <td style="text-align: center;">{{$vac->dias_t}}</td>
                                        <td style="text-align: center;">{{$vac->razon}}</td>
                                            @if($vac->observacion==null)
                                                <td style="text-align: center;">ninguna</td>
                                            @endif
                                            @if($vac->observacion!=null)
                                                <td style="text-align: center;">{{$vac->observacion}}</td>
                                            @endif
                                        <td style="text-align: center;">
                                        @if($vac->memorandum!=null)
                                            <a href="{{route('ver_memorandum', ['id' => $vac->id])}}" target="_blank" class="btn btn-success btn-xs tooltipC" title="ver memorandum" id="ver-memorandum">
                                                <i class="fa fa-fw  fa-file-pdf-o"></i>																			
                                            </a>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <div class="panel-heading" style="background-color: rgb(230, 100, 100)">
                        <h3 class="panel-title"><b>Faltas</b></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 15%">Fecha</th>
                                <th style="text-align: center; width: 10%">Nro Dias</th>
                                <th style="text-align: center; width: 30%">Razón</th>
                                <th style="text-align: center; width: 35%">Observación</th>
                                <th style="text-align: center; width: 10%">Opción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($personal->vacacion as $vac)
                                @if($vac->tipo == 'Falta')
                                    <tr>
                                        <td style="text-align: center;">{{$vac->fecha_ini}}</td>
                                        <td style="text-align: center;">{{$vac->dias_t}}</td>
                                        <td style="text-align: center;">{{$vac->razon}}</td>
                                            @if($vac->observacion==null)
                                                <td style="text-align: center;">ninguna</td>
                                            @endif
                                            @if($vac->observacion!=null)
                                                <td style="text-align: center;">{{$vac->observacion}}</td>
                                            @endif
                                        <td style="text-align: center;">
                                        @if($vac->memorandum!=null)
                                            <a href="{{route('ver_memorandum', ['id' => $vac->id])}}" target="_blank" class="btn btn-success btn-xs tooltipC" title="ver memorandum" id="ver-memorandum">
                                                <i class="fa fa-fw  fa-file-pdf-o"></i>																			
                                            </a>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



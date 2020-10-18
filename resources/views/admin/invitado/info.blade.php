@extends("theme.$theme.layout")
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="">
                    <div class="panel-heading clearfix" style="background-color: rgb(100, 221, 230)">
                        <h3 class="panel-title pull-left"  ><b>Bienvenido: {{$personal->nombre}} {{$personal->apellido}}</b></h3>  
                        <div class="box-tools pull-right">
                            <a href="{{route('inicio')}}" class="btn btn-block btn-info btn-sm">
                                <i class="fa fa-fw fa-reply-all"></i> Volver
                            </a>
                        </div>                 
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
                                    <p><b>Fecha Ingreso:</b></p>
                                </div>
                                <div class="col-md-9">
                                    <i><p>{{$personal->fecha_ing}}</p></i>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3" style="text-align: right">
                                    <p><b>Días Libres:</b></p>
                                </div>
                                <div class="col-md-9">
                                    @if($personal->contrato->vacacion=="si")
                                        <i><p>{{$dias_libres}}</p></i>
                                    @endif
                                    @if($personal->contrato->vacacion=="no")
                                        <i><p>Su tipo contrato no le permite tener días libres</p></i>
                                    @endif
                                </div>
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
                    <h3 class="panel-title" style="text-align: center"><b>Capacitaciones de "{{$personal->unidad->nombre}}"</b></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 70%">Nombre</th>
                                <th style="text-align: center; width: 20%">tipo</th>
                                <th style="text-align: center; width: 10%">Opción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($capacitacion as $cap)
                                <tr>
                                    <td style="text-align: center;">{{$cap->nombre}}</td>
                                    <td style="text-align: center;">
                                        @php
                                            $info = new SplFileInfo($cap->documento); //agarra la cadena y lo vuelve tipo file
                                            $extencion=$info->getExtension(); //agarra la extencion del file
                                        @endphp
                                        @if($extencion=="pdf")									
                                            <span class="label label-danger">
                                                <label style="width:80px">PDF</label>
                                            </span>																													
                                        @endif
                                        @if($extencion=="docx")
                                            <span class="label label-primary">
                                                <label style="width:80px">WORD</label>
                                            </span>	
                                        @endif
                                        @if($extencion=="pptx")
                                            <span class="label label-warning">
                                                <label style="width:80px">PowerPoint</label>
                                            </span>	
                                        @endif	
                                    </td>
                                    <td style="text-align: center;">
										<a href="{{route('ver_cap', ['id' => $cap->id])}}" target="_blank" class="ver-capacitacion btn btn-success btn-xs tooltipC" title="ver capacitacion" id="ver-capacitacion">																
											<i class="fa fa-fw  fa-cloud-download"></i>																															
                                        </a>
                                    </td>
                                </tr>
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



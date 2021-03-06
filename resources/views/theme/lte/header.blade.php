  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RR</b>HH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Recursos</b>  Humanos</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!--inicio calculos normales cuando es un usuario del sistema-->
          @if(session()->get('usuario')!=null)
            @php
              $cant=MyHelper::CantidadEventos(); //obtiene la cantidad de eventos posteriores a la fecha actual 
            @endphp
            @if($cant>0)
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-calendar text-white"></i>            
                  <span class="label label-warning">{{$cant}}</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header" style="text-align: center"><a href="{{route('eventos')}}">{{$cant}} Activida(es) por desarrollarse</a></li>
                  <li>
                    <ul class="menu">
                      <table class="table table-bordered table-hover table-striped" style="background-color:mintcream;">
                        <thead>
                          <tr style="width: 100%">
                            <th style="text-align: center; width: 50%"><h6><b>Evento</b></h6></th>
                            <th style="text-align: center; width: 20%"><h6><b>Unidad</b></h6></th>
                            <th style="text-align: center; width: 30%"><h6><b>Comienza</b></h6></th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $eventos=MyHelper::DetalleEventos(); //agarra los eventos posteriores a la fecha actual
                          @endphp
                          @foreach($eventos as $ev)
                            <tr>
                              <td style="text-align: center;"><h6>{{$ev->title}}</h6></td>
                              <td style="text-align: center;"><h6>{{$ev->unidad->sigla}}</h6></td>
                              @php $dias=MyHelper::DiasEvento($ev->start); @endphp
                              @if($dias==0)
                                @php $horas=MyHelper::HorasEvento($ev->start); @endphp
                                @if($horas>0)
                                  <td style="text-align: center;"><h6>En <b>{{$horas}} </b>Horas</h6></td>
                                @endif                             
                                @if($horas==0)
                                  <td style="text-align: center;"><h6>En minutos</h6></td>
                                @endif
                              @endif
                              @if($dias>0)
                                <td style="text-align: center;"><h6>En <b>{{$dias}}</b> Días</h6></td>
                              @endif
                            </tr>
                          @endforeach
                            {{-- @for($i=$cant;$i>0;$i--)--}} 
                        </tbody>
                      </table>                                   
                    </ul>
                  </li>
                </ul>
              </li>
            @endif
          @endif
          <!--fin calculos normales cuando es un usuario del sistema-->
          <!--inicio calculos normales cuando es un usuario del sistema para notificaciones-->
          @if(session()->get('usuario')!=null)
            @php
              $cant=MyHelper::CantidadNotificaciones(); //obtiene la cantidad de notif con estado 1 de este usuario
              $cant_comunicados=MyHelper::CantidadNotificacionesComunicados();
            @endphp
            @if($cant>0)
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell"></i>
                <span class="label label-danger">{{$cant}}</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header" style="text-align: center">{{$cant}} capacitacion(es) creadas recientemente</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @php
                        $notificaciones=MyHelper::DetalleNotificacion(); //obtiene la cantidad de notif con estado 1 de este usuario
                      @endphp
                      @foreach($notificaciones as $noti)
                        <li><!-- start message -->
                          <a href="{{route('marcar_notificacion', ['id' => $noti->id])}}" >
                            <div class="pull-left">
                              @php
                                $usuario=MyHelper::FotoNotificacion($noti->autor_id);
                                $foto=$usuario->foto;
                              @endphp
                              @if($foto==null)
                                <img src="{{asset("assets/$theme/dist/img/compu1.png")}}" class="img-circle" alt="User Image">              
                              @endif
                              @if($foto!=null)                             
                                <img src="{{Storage::url("imagenes/fotos/usuario/$foto")}}" class="img-circle" alt="User Image">                  
                              @endif                   
                            </div>
                            {{$usuario->usuario}}, creó:
                            <h4>
                              {{$noti->capacitacion->nombre}}
                            <small><i class="fa fa-clock-o"></i>{{$noti->created_at}}</small>
                            </h4>
                            <p>{{$noti->capacitacion->unidad->nombre}}</p>
                          </a>
                        </li><!-- end message -->
                      @endforeach
                    </ul>
                  </li>
                </ul>
              </li>
            @endif
            @if($cant_comunicados>0)
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-file"></i>
                <span class="label label-danger">{{$cant_comunicados}}</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header" style="text-align: center">{{$cant_comunicados}} comunicado(s) creados recientemente</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @php
                        $notificaciones=MyHelper::DetalleNotificacionComunicados(); //obtiene la cantidad de notif con estado 1 de este usuario
                      @endphp
                      @foreach($notificaciones as $noti)
                        <li><!-- start message -->
                          <a href="{{route('marcar_notificacion_comunicado', ['id' => $noti->id])}}" >
                            <div class="pull-left">
                              @php
                                $usuario=MyHelper::FotoNotificacion($noti->autor_id);
                                $foto=$usuario->foto;
                              @endphp
                              @if($foto==null)
                                <img src="{{asset("assets/$theme/dist/img/compu1.png")}}" class="img-circle" alt="User Image">              
                              @endif
                              @if($foto!=null)                             
                                <img src="{{Storage::url("imagenes/fotos/usuario/$foto")}}" class="img-circle" alt="User Image">                  
                              @endif                   
                            </div>
                            {{$usuario->usuario}}, creó:
                            <h4>
                              {{$noti->comunicado->nombre}}
                            <small><i class="fa fa-clock-o"></i>{{$noti->created_at}}</small>
                            </h4>
                            <p>{{$noti->comunicado->tipo}}</p>
                          </a>
                        </li><!-- end message -->
                      @endforeach
                    </ul>
                  </li>
                </ul>
              </li>
            @endif
          @endif
          <!--inicio calculos normales cuando es un usuario del sistema para notificaciones-->
          <!--inicio calculos  cuando es un invitado del sistema-->
          @if(session()->get('usuario')==null)
          @php
            $cant=MyHelper::CantidadEventos_inv(); //obtiene la cantidad de eventos posteriores a la fecha actual y su unidad 
          @endphp
          @if($cant>0)
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar text-white"></i>            
                <span class="label label-warning">{{$cant}}</span>
              </a>
              <ul class="dropdown-menu">
                @php
                  $unidad=MyHelper::Unidad_inv(); //agarra los eventos posteriores a la fecha actual
                @endphp
              <li class="footer"><a href="{{route('eventos')}}"><h5><b>{{$cant}} Actividad(es) por Desarrollarse en: </b></h5></a></li>
              <li class="footer"><a><h5><b>{{$unidad->unidad->nombre}}</b></h5></a></li>
              <li class="header"></li>
                <li>
                  <ul class="menu">
                    <table class="table table-bordered table-hover table-striped" style="background-color:mintcream;">
                      <thead>
                        <tr style="width: 100%">
                          <th style="text-align: center; width: 60%">Evento</th>
                          <th style="text-align: center; width: 40%">Comienza</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $eventos=MyHelper::DetalleEventos_inv(); //agarra los eventos posteriores a la fecha actual
                        @endphp
                        @foreach($eventos as $ev)
                          <tr>
                            <td style="text-align: center;">{{$ev->title}}</td>
                            @php $dias=MyHelper::DiasEvento($ev->start); @endphp
                            @if($dias==0)
                              @php $horas=MyHelper::HorasEvento($ev->start); @endphp
                              @if($horas>0)
                                <td style="text-align: center;">En <b>{{$horas}} </b>Horas</td>
                              @endif                             
                              @if($horas==0)
                                <td style="text-align: center;">en minutos</td>
                              @endif
                            @endif
                            @if($dias>0)
                              <td style="text-align: center;">En <b>{{$dias}}</b> Días</td>
                            @endif
                          </tr>
                        @endforeach
                          {{-- @for($i=$cant;$i>0;$i--)--}} 
                      </tbody>
                    </table>                                   
                  </ul>
                </li>
              </ul>
            </li>
          @endif
          @endif
          <!--fin calculos normales cuando es un usuario del sistema-->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @php
                    $aux= session()->get('foto_usuario');
              @endphp
              @if(session()->get('foto_usuario')==null)
                <img src="{{asset("assets/$theme/dist/img/compu1.png")}}" class="user-image" alt="User Image">              
              @endif
              @if(session()->get('foto_usuario')!=null)
                <img src="{{Storage::url("imagenes/fotos/usuario/$aux")}}" class="user-image" alt="User Image">                  
              @endif        
              <span class="hidden-xs">{{session()->get('usuario') ?? 'Invitado'}}</span>
            </a>
            
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(session()->get('foto_usuario')==null)
                  <img src="{{asset("assets/$theme/dist/img/compu1.png")}}" class="img-circle" alt="User Image">
                @endif
                @if(session()->get('foto_usuario')!=null)                
                  <img src="{{Storage::url("imagenes/fotos/usuario/$aux")}}" class="img-circle" alt="User Image">                 
                @endif
                  <p>
                  <i>
                  {{session()->get('nombre_usuario')}}
                  {{session()->get('apellido_usuario')}}
                  </i>
                  <small><i>{{session()->get('email_usuario')}}</i></small>
                  <small><i>{{session()->get('rol_tipo')}}</i></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                @if(session()->get('usuario')==null)
                  <div class="pull-left">
                    <a href="{{route('login')}}" class="btn btn-success btn-flat">Login</a>
                  </div>
                @endif
                @if(session()->get('usuario')!=null)
                  <div class="pull-right">
                    <a href="{{route('logout')}}" class="btn btn-danger btn-flat">Salir</a>
                  </div>
                @endif
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

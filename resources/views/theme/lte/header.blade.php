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
          @php
            $cant=MyHelper::CantidadEventos(); //obtiene la cantidad de eventos posteriores a la fecha actual 
          @endphp
          @if(($cant>0))
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar text-white"></i>            
                <span class="label label-warning">{{$cant}}</span>
              </a>
              <ul class="dropdown-menu">
              <li class="footer"><a href="{{route('eventos')}}"><h5><b>{{$cant}} Actividad(es) por Desarrollarse</b></h5></a></li>
              <li class="header"></li>
                <li>
                  <ul class="menu">
                    <table class="table table-bordered table-hover table-striped" style="background-color:mintcream;">
                      <thead>
                        <tr style="width: 100%">
                          <th style="text-align: center; width: 60%">Evento</th>
                          <th style="text-align: center; width: 40%">fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $eventos=MyHelper::DetalleEventos(); //agarra los eventos posteriores a la fecha actual
                        @endphp
                        @foreach($eventos as $ev)
                          <tr>
                            <td style="text-align: center;">{{$ev->title}}</td>
                            @php $dias=MyHelper::DiasEvento($ev->start); @endphp
                            @if($dias==0)
                              <td style="text-align: center;"><b>Hoy</b></td>
                            @endif
                            @if($dias>0)
                              <td style="text-align: center;">En <b>{{$dias+1}}</b> Días</td>
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

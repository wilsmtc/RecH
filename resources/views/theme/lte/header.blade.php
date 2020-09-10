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



          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>             
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
            <li class="header">You have notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>





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

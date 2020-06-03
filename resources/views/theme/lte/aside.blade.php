 <aside class="main-sidebar" style="background-image:url('/assets/lte/dist/img/fondo2.jpg'); background-size: cover">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        @php
          $aux= session()->get('foto_usuario');
        @endphp

        @if(session()->get('foto_usuario')==null)
          <div class="pull-left image">
            <img src="{{asset("assets/$theme/dist/img/bayern.png")}}" class="img-circle" alt="User Image">
          </div>             
        @endif
        @if(session()->get('foto_usuario')!=null)
          <div class="pull-left image">
            <img src="{{Storage::url("imagenes/fotos/usuario/$aux")}}" class="img-circle" alt="User Image">  
          </div>                
        @endif 
        <div class="pull-left info">
          <p>
            <span class="hidden-xs">{{session()->get('usuario') ?? 'Invitado'}}</span>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
      </div>
      <!-- search form -->
      <!--  
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li style="text-align: center;  color: rgb(214, 207, 245)" class="header" >MENÚ PRINCIPAL</li>
        @foreach ($menusComposer as $key => $item)
              @if ($item["menu_id"] != 0)<!-- solo va entrar cuando es hijo -->
                  @break
              @endif
              @include("theme.$theme.menu-item", ["item" => $item])<!-- me redirecciona a la vista menu.item -->
          @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
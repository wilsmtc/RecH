@extends("theme.$theme.layout")
@section('titulo')
	Menu
@endsection
@section('styles')
	<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('scriptsPlugins')
	<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section('scripts')
	<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			@include('includes.mensaje')
			@include('includes.mensajeerror')
			<div class="box box-success">
				<div class="box-header whit-border">
					<h3 class="box-title"><b>Lista de Menús</b></h3>
					<div class="box-tools pull-right">
					@if(Auth::user()->roles[0]->añadir == 1)
						<a href="{{route('crear_menu')}}" class="btn btn-block btn-success btn-sm">
							<i class="fa fa-fw fa-plus-circle"></i> Crear nuevo Menu
						</a>
					@endif
					</div>
				</div>	
				<div class="box-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item["menu_id"] != 0)
                                    @break
                                @endif
                                @include("admin.menu.menu-item", ["item" =>$item])
							@endforeach
                        </ol>    
				    </div>
			    </div>
		    </div>
        </div>
	</div>
@endsection
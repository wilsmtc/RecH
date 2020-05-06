@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection

@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection

@section('scripts')
	<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			@include('includes.form-error')
        	@include('includes.mensaje')
			<div class="box box-danger">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Crear Usuario</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('usuario')}}" class="btn btn-block btn-info btn-sm">
							<i class="fa fa-fw fa-reply-all"></i> Ver Usuarios
						</a>
					</div>
				</div>
				<form action="{{route ('guardar_usuario')}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="box-body">
						@include('admin.usuario.form')
					</div>
					<div class="box-footer">
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							@include('includes.boton-form-crear')
						</div>    
					</div>
				</form>			
			</div>
		</div>
	</div>
@endsection
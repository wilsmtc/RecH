@extends("theme.$theme.layout")
@section('titulo')
	Personal
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
	<script src="{{asset("assets/pages/scripts/admin/personal/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			@include('includes.form-error')
        	@include('includes.mensaje')
			<div class="box box-danger">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Editar Personal</b></h3>
					<div class="box-tools pull-right">
                        <a href="{{route('personal')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                        </a>
                    </div>
                </div>
                <form action="{{route('actualizar_personal', ['id' => $personal->id])}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data">
					@csrf @method("put")
					<div class="box-body">
						@include('admin.personal.form')
					</div>
					<div class="box-footer">
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							@include('includes.boton-form-editar')
						</div>    
					</div>
				</form>			
			</div>
		</div>
	</div>
@endsection
@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection
@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-danger">
				<div style="text-align: center;" class="box-header whit.border">
					<h3 class="box-title"><b>Crear Usuario</b></h3>
					<div class="box-tools pull-right">
						<a href="{{route('usuario')}}" class="btn btn-block btn-info btn-sm">
							<i class="fa fa-fw fa-reply-all"></i> Ver Usuarios
						</a>
					</div>
				</div>
				<div class="box-body">
					aqui colocaremos un formulario
				</div>
			</div>
		</div>
	</div>
@endsection
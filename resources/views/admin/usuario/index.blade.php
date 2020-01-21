@extends("theme.$theme.layout")

@section('titulo')
	Usuario
@endsection
@section('contenido')
	<div style="text-align: center;" class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-header whit.border">
					<h3 class="box-title"><b>Lista de Usuarios</b></h3>
				</div>
				<div class="box-body table-responsive no.padding">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th style="text-align: center;">ID</th>
                    			<th style="text-align: center;">Usuario</th>
                    			<th style="text-align: center;">Nombre</th>
                   				<th style="text-align: center;">Aellido</th>
                    			<th style="text-align: center;">Correo</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuarios)
								<tr>
									<th style="text-align: center;">{{$usuarios->id}}</th>
									<th style="text-align: center;">{{$usuarios->usuario}}</th>
									<th style="text-align: center;">{{$usuarios->nombre}}</th>
									<th style="text-align: center;">{{$usuarios->apellido}}</th>
									<th style="text-align: center;">{{$usuarios->email}}</th>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
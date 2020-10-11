<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo', $data->tipo ?? '')}}" required placeholder="Nombre de Rol"/>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-3 control-label">Permisos</label>
    <div class="col-lg-5">
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="añadir" id="añadir"
						@if (isset($data)&&$data->añadir == 1)
							checked
						@endif
					>Agregar
				</label>
			</div>
		</label>
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="editar" id="editar"
						@if (isset($data)&&$data->editar == 1)
							checked
						@endif
					>Editar
				</label>
			</div>
		</label>
		<label class="checkbox-inline">
			<div class="font-weight-bold">
				<label>
					<input type="checkbox" name="eliminar" id="eliminar"
						@if (isset($data)&&$data->eliminar == 1)
							checked
						@endif
					>Eliminar
				</label>
			</div>
		</label>  
	</div>
</div>
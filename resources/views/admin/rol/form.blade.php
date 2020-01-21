<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo', $data->tipo ?? '')}}" required/>
    </div>
</div>

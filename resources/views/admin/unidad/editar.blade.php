@extends("theme.$theme.layout")
@section('titulo')
	Unidades
@endsection
@section('scripts')
	<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div  class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-primary">
            <div class="box-header whit.border">
                <h3 class="box-title"><b>Editar Unidades</b></h3>
                <div class="box-tools pull-right">
                    <a href="{{route('unidad')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver ver Unidades
                    </a>
                </div>
            </div>
            <form action="{{route('actualizar_unidad', ['id' => $unid->id])}}" id="form-general" class="form-horizontal" method="POST">
                @csrf @method("put")
                <div class="box-body">
                    @include('admin.unidad.form')
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
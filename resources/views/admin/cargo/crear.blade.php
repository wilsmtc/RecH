@extends("theme.$theme.layout")
@section('titulo')
	Crear Cargo
@endsection
@section('scripts')
    <script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-primary">
            <div style="text-align: center;" class="box-header whit.border">
                <h3 class="box-title"><b>Crear Cargo</b></h3>
                <div class="box-tools pull-right">
                    <a href="{{route('cargo')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Ver Cargos
                    </a>
                </div>
            </div>
            <form action="{{route ('guardar_cargo')}}" id="form-general" class="form-horizontal" method="POST">
                @csrf
                <div class="box-body">
                    @include('admin.cargo.form')
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
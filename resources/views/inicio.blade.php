@extends("theme.$theme.layout")
@section('titulo')
Recursos Humanos
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-10">
        @include('includes.mensajeerror')
        
    </div>
    <div style="text-align: center">
        <h3><b>Sistema de Administración de Recursos Humanos<b></h3>
    </div>
    <div style="text-align: center">
        <img src="/assets/lte/dist/img/compu1.png" height="250px" width="250px">
    </div>
</div>
@endsection
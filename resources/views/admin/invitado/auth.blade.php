@extends("theme.$theme.layout")
@section('titulo')
	Verificar invitado
@endsection
@section('scripts')
    <script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<body class="hold-transition login-page" style="background-image:url('/assets/lte/dist/img/fondo1.jpg'); background-size: cover">
    <div class="login-box">      
        @include('includes.form-error')
        @include('includes.mensaje') 
        @include('includes.mensajeerror')  
        <div class="login-box-body" style="background-image:url('/assets/lte/dist/img/fondo1.jpg'); background-size: cover">          
            <h4 style="color: rgb(22, 20, 139)"><u><b><p class="login-box-msg">Autenticación</p></b></u></h4>
            <p style="color: white" class="login-box-msg">Para poder ver sus Datos Personales Ingrese su Número de Carnet</p>
            <form action="{{route('verificar')}}" method="POST" autocomplete="off" id="form-general">
                @csrf
                <div class="form-group has-feedback">
                    <input type="password" name="ci" id="ci" class="form-control" placeholder="Número de Carnet" required minlength="7" value="{{old('ci')}}">
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Verificar</button>
                    </div>              
                </div>
            </form>
        </div>
    </div>
@endsection
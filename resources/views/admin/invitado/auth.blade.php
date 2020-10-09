{{-- @extends("theme.$theme.layout")
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
            <h4 style="color: rgb(203, 203, 207)")"><u><b><p class="login-box-msg">Autenticación</p></b></u></h4>
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
</body>
@endsection --}}





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema RRHH | Login Invitado</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">        
</head>
<body class="hold-transition login-page" style="background-image:url('/assets/lte/dist/img/fondo1.jpg'); background-size: cover">
    <div class="login-box">      
        @include('includes.form-error')
        @include('includes.mensaje') 
        @include('includes.mensajeerror')  
        <div class="login-box-body" style="background-image:url('/assets/lte/dist/img/fondo1.jpg'); background-size: cover">          
            <h4 style="color: rgb(203, 203, 207)")><u><b><p class="login-box-msg">Autenticación</p></b></u></h4>
            <p style="color: white" class="login-box-msg">Para poder acceder como invitado Ingrese su Número de Carnet</p>
            <form action="{{route('verificar')}}" method="POST" autocomplete="off" id="form-general">
                @csrf
                <div class="form-group has-feedback">
                    <input type="password" name="ci" id="ci" class="form-control" placeholder="Número de Carnet" required minlength="7" value="{{old('ci')}}">
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Verificar</button>
                    </div> 
                    <div class="col-xs-2"></div> 
                    <div class="col-xs-4">
                        <a href="{{route('login')}}" class="btn btn-primary btn-block btn-flat">Volver</a>
                    </div>             
                </div>
            </form>
        </div>
    </div>
</body>
</html>
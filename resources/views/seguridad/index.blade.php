<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema RRHH | Login</title>
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
    {{-- <style>
        html{
            background-image:url("/assets/lte/dist/img/fondo1.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
            background-position: center;
            background-attachment: fixed;       
        }
    </style> --}}
    <div class="login-box">
        
        <!-- /.login-logo -->
        <div class="login-box-body" style="background-image:url('/assets/lte/dist/img/fondo1.jpg'); background-size: cover">
            
            <h4 style="color: rgb(203, 203, 207)"><u><b><p class="login-box-msg">Sistema de Administración de Recursos Humanos</p></b></u></h4>
            <p style="color: white" class="login-box-msg">Inicie sesion</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any()) <!--para ver los mensajes de error-->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="alert-text">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            <form action="{{route('login_post')}}" method="POST" autocomplete="off" >
                @csrf
                <div class="form-group has-feedback" >
                    <input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" placeholder="Usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback fa fa-user"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
                    </div>              
                    <div class="col-xs-7">
                        <a href="{{route('invitado')}}" class="btn btn-primary btn-block btn-flat">Acceder como invitado</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
</body>
</html>
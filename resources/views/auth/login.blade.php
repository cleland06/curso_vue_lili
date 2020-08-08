<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}} | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="/img/logo-geekstore.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
{{-- <body class="hold-transition login-page bg-blue"> --}}
<body class="hold-transition login-page " style="background-color:#ffff;">
    <div class="login-box">
    <div class="login-logo text-white">
        <img src="/img/logo-geekstore.png" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><h3 class="text-center">Inicia sesión</h3></p>

        <form method="POST" action="{{ route('login') }}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback form-group-lg">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" placeholder="Email" name="email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

        </div>
        <div class="form-group has-feedback form-group-lg">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" placeholder="Contraseña" name="password" required >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">Entrar</button>
            </div>
            <!-- /.col -->
        </div>
        </form>   
    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="adminlte/bower_components/bootstrap/diadminlte/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="adminlte/plugins/iCheck/icheck.min.js"></script>
</body>
</html>









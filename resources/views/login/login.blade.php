<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Avicultor</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



</head>
<style type="text/css">.login-box button{ text-transform:uppercase; }</style>
<body class="hold-transition login-page" >
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Iniciar Sesión</b></a>
  </div>

  


  <div class="login-box-body">
    <p class="login-box-msg">Autentifiquense para iniciar sesión</p>
    <form action="{{url('validar')}}" method="post">
      {{csrf_field()}}

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" required name="usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" required placeholder="Contraseña" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger active btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

    


  </div>
  <!-- /.login-box-body -->
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>


<!--
<script>
  $(function ()) 
  {
    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' /* optional */
                      });
  };
};
</script>-->
</body>
</html>

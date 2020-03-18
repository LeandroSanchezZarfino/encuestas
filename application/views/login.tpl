<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Encuesta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="icon" type="image" href="dist/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="container">
<div class="row align-items-sm-center">
	<div class="col-5 mx-auto d-sm-none d-block">
	  <img src="dist/img/sigemin.png" class="img-fluid">
	</div>
	<div class="login-box pb-5 mx-auto mt-5">
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg">Iniciar Sesión</p>
			{if isset($error)}
				<p style="color: red;">{$error}</p>
			{/if}
		  <form method="post" action="login">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="Usuario" name="user">
			  <div class="input-group-append">
				<div class="input-group-text">
				  <span class="fas fa-envelope"></span>
				</div>
			  </div>
			</div>
			<div class="input-group mb-3">
			  <input type="password" class="form-control" placeholder="Contraseña" name="password">
			  <div class="input-group-append">
				<div class="input-group-text">
				  <span class="fas fa-lock"></span>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-12">
				<div class="icheck-primary">
				  <input type="checkbox" id="remember">
				  <label for="remember">
					<small>Recordar Contraseña</small>
				  </label>
				</div>
			  </div>
			 </div>
			 <div class="row">
			  <!-- /.col -->
			  <div class="col-7 mx-auto mt-5">
				<button type="submit" class="btn btn-secondary btn-block">Ingresar <i class="fas fa-sign-in-alt"></i></button>
			  </div>
			  <!-- /.col -->
			</div>
		  </form>
		  <!--
		  <p class="mt-4 mb-0 text-center">
			<a href="forgot-password.html">Olvidé mi contraseña</a>
		  </p>
		  <p class="mb-0 text-center">
			<a href="register.html" class="text-center">Registrarme</a>
		  </p>
		</div>
		<! - /.login-card-body -->
	  </div>
	</div>
	<!-- /.login-box -->
	<div class="col-5 mx-auto d-sm-none d-block">
		<img src="dist/img/login-sig-01.png" class="img-fluid">
	</div>
</div> <!-- ROW-->
</div> <!-- container-->
<script src="plugins/jquery/jquery.min.js"></script>
</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body background="fotos/foto2.jpg">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="text-center">Welcome</h1>
        </div>
         <div class="modal-body">
             <div class="form-group">
                 <input type="text" class="form-control input-lg" id="nombre" placeholder="Username"/>
             </div>

             <div class="form-group">
                 <input type="password" class="form-control input-lg" id="password" placeholder="Password"/>
             </div>

             <div class="form-group">
                 <input type="submit" class="btn btn-block btn-lg btn-primary" onclick='Login()' value="Login"/>
                 <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Forgot Password</a></span>
             </div>
         </div>

    </div>
 </div>
 <!--
<input type="text" name="nombre" id="nombre" placeholder="NOMBRE">
<br>
<input type="password" name="password" id="password" placeholder="PASSWORD">
<br>
<button onclick='LlenarBase()'>Llenar Base</button>
<button onclick='AltaAuto()'>TestAuto</button>
<button onclick='Login()'>Login</button>
<button onclick='CerrarSesion()'>Cerrar Sesion</button>-->
</body>
</html>


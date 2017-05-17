<?php
session_start();
include_once 'clases/usuarios.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<h1>Bienvenido <?php echo $_SESSION["nombre"];?>!</h1>
	<div>
		<select id="filtro">
			<option>Todos</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
		</select>
	</div>
	<div id="tablaUsuarios">
		<?php
			Usuario::TablaUsuarios();
		?>
	</div>
</body>
</html>

<?php
session_start();
include_once 'clases/usuarios.php';
include_once 'clases/vehiculo.php';
include_once 'clases/registros.php';
include_once 'clases/lugares.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>Bienvenido <?php echo $_SESSION["nombre"];?>!</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Inicio</a></li>
    <li><a data-toggle="tab" href="#menu1">Usuarios</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Gestion de estacionamiento</h3>
      <button>Ingresar Auto</button>
      <div id='tablaEstacionados'>
      	
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Usuarios</h3>
      	<div id='tablausuarios'>
      		<?php
				Usuario::TablaUsuarios();
			?>
		</div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificación</h4>
        </div>
        <div class="modal-body">
        	Codigo<br>
          <input type="text" name="cod" id="cod" disabled><br>
          	Nombre<br>
          <input type="text" name="prod" id="prod"><br>
          	Foto<br>
          <input type="text" name="foto" id="foto">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="Guardar()">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body>
</html>


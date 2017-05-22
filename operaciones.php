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
      <button class="btn btn-primary" onclick="IngresarAuto()">Ingresar Auto</button>
      <button class="btn btn-success">Retirar Auto</button>
      <button class="btn btn-warning">Estadisticas</button>
      <button class="btn btn-danger" onclick ="CerrarSesion(<?php echo $_SESSION["id"].",".$_SESSION["login"]; ?>)">Cerrar Sesion</button>
      <br><center><h2>Autos Estacionados</h2></center>
      <div id='tablaEstacionados'>
      	<?php Vehiculo::TablaEstacionados();?>
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
      <h3>Piso 1</h3>
      <?php
      Lugares::GrillaLugares(1); 
      ?>
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
          <h4 class="modal-title">Alta Auto</h4>
        </div>
        <div class="modal-body">
        	Patente<br>
          <input type="text" name="patente" id="patente" required><br>
          	Marca<br>
          <input type="text" name="marca" id="marca" required><br>
            Color<br>
          <input type="text" name="color" id="color" required><br>
          Piso
            <select onchange="LugaresLibres()" id="piso">
              <option selected="selected">1</option>
              <option>2</option>
              <option>3</option>
            </select><br>
           Lugar
            <select id="lugaresLibres">
              <?php Lugares::LugaresLibres(1);?>   
            </select> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="AutoParaIngresar()">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body>
</html>


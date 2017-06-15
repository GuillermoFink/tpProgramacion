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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
  <style type="text/css">
    .bgimg
          {
            background-image: url('./fotos/header-bg.jpg');
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
          }
    .fondotabla
              {
                background-image: url('./fotos/fondotabla.jpg');
                    height: 110%;
                    width: 100%;
                    /* Center and scale the image nicely */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
              }      
  </style>

</head>
<body class="fondotabla">
<div class="bgimg"><h2>Bienvenido <?php echo $_SESSION["nombre"];?>!</h2>
  <div align="left">
    <button class="btn btn-success">Preferencias</button>
    <button class="btn btn-danger" onclick ="CerrarSesion(<?php echo $_SESSION["id"].",".$_SESSION["login"]; ?>)">Cerrar Sesion</button>
  </div>
</div>

<div class="container">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" onclick="TablaEstacionados()">Inicio</a></li>
    <li><a data-toggle="tab" href="#menu1" onclick="TablaUsuarios()">Usuarios</a></li>
    <li><a data-toggle="tab" href="#menu2" onclick="GrillaLugares(1)">Piso 1</a></li>
    <li><a data-toggle="tab" href="#menu3" onclick="GrillaLugares(2)">Piso 2</a></li>
    <li><a data-toggle="tab" href="#menu4" onclick="GrillaLugares(3)">Piso 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Gestion de estacionamiento</h3>
      <button class="btn btn-info" onclick="TablaEstacionados()">Inicio</button>
      <button class="btn btn-primary" onclick="IngresarAuto()">Ingresar Auto</button>
      <button class="btn btn-success" onclick="RetirarAuto()">Retirar Auto</button>
      <button class="btn btn-warning" onclick="TablaRegistros()">Estadisticas</button>
      <button class="btn" onclick="TablaFiltros()">Filtros</button>
      <button class="btn btn-danger" onclick ="CerrarSesion(<?php echo $_SESSION["id"].",".$_SESSION["login"]; ?>)">Cerrar Sesion</button>
      <br><center><h2 id="titulo">Autos Estacionados</h2></center>
      <div id ="filtros"></div>
      <div id='tablaEstacionados'>
      	<?php Vehiculo::TablaEstacionados();?>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Usuarios</h3>
      <button class="btn btn-success" onclick="AltaUsuario()">Nuevo Usuario</button>
      	<div id='tablausuarios'>
      		<?php
				Usuario::TablaUsuarios();
			?>
		</div>
    </div>
    <div id="menu2" class="tab-pane fade" >
      <h3>Piso 1</h3>
      <div id="lugaresLibres1">
      <?php
      Lugares::GrillaLugares(1); 
      ?>
      </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Piso 2</h3>
      <div id="lugaresLibres2">
      <?php
      Lugares::GrillaLugares(2); 
      ?>
      </div>
    </div>
     <div id="menu4" class="tab-pane fade">
      <h3>Piso 3</h3>
      <div id="lugaresLibres3">
      <?php
      Lugares::GrillaLugares(3); 
      ?>
      </div>
    </div>
  </div>
</div>
<!--MODAL DE INGRESAR AUTO-->
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
<!--MODAL DE RETIRAR AUTO-->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="modalRetiro" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Retiro Auto</h4>
        </div>
        <div class="modal-body" id="modalbody">
          Patente<br>
          <input type="text" name="patente_retiro" id="patente_retiro" required><br>
            Hora de entrada:<br>
          <input type="text" name="hora_entrada" id="hora_entrada" disabled><br>
            Hora de salida:<br>
          <input type="text" name="hora_salida" id="hora_salida" disabled><br>
            Monto:<br>
          <input type="text" name="monto" id="monto_salida" disabled><br>
          <input type="hidden" name="idUser" id="idUser" disabled>
          <input type="hidden" name="idLugar" id="idLugar" disabled>
          <input type="hidden" name="hora" id="hora" disabled>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="ConfirmarRetiro()">Confirmar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--MODAL DE RETIRAR AUTO POR PATENTE-->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="modalRetiroPatente" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Retiro Auto</h4>
        </div>
        <div class="modal-body" id="retiroPorPatente">
          Ingrese Patente:<br>
          <input type="text" name="patente_retiro" id="patente_a_buscar" required><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="RetirarPorPatente()">Confirmar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--MODAL DE ALTA DE USUARIO
  <div class="container">
    <div class="modal fade" id="modalAltaUsuario" role="dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta Usuario</h4>
    </div> -->
  </div>
</body>
</html>


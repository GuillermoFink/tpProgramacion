function Login()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				user: $("#nombre").val(),
				pw: $("#password").val()
			}
	});
	a.done(function(respuesta)
	{
		//debugger;
		if(respuesta === "Ok")
		{
			window.location.href = "operaciones.php";
		}
		else
		{
			alert(respuesta);
			window.location.href = "index.php";
		}
	});
}
function LlenarBase()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
		{
			queHago: "PrimerUso"
		}
	});
	a.done(function(respuesta)
	{
		alert(respuesta);
	});
}
function AltaAuto()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				pat: "AAB 123",
				marca: "audi",
				color: "rojo",
				lugar: "105"
			}	
	});
	a.done(function(respuesta)
	{
		alert(respuesta);
	});
}
function EliminarUsuario(id)
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				idParaEliminar: id 
			}
	});
	a.done(function(respuesta)
	{
		//alert(respuesta);
		if (respuesta != "error")
		{
			$("#tablausuarios").html(respuesta);
		}else
		{
			alert("Error al eliminar usuario");
		}
	});
}
function CerrarSesion(id_usuario,login)
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data: 
		{
			cerrarSesion: id_usuario,
			tiempo: login
		}
	});
	a.done(function(respuesta)
	{
		alert(respuesta);
		window.location.href ="index.php";
	});
}
function IngresarAuto()
{
	$("#patente").val("");
	$("#marca").val("");
	$("#color").val("");
	$("#myModal").modal("show");
}
function LugaresLibres()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				piso: $("#piso").val()
			}
	});
	a.done(function(respuesta)
	{	
		//alert(respuesta);
		$("#lugaresLibres").html(respuesta);
	});
}
function AutoParaIngresar()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				patente: $("#patente").val(),
				marca: $("#marca").val(),
				color: $("#color").val(),
				lugar: $("#lugaresLibres").val()
			}
	});
	a.done(function(respuesta)
	{
		if (respuesta != "error")
		{
			alert("Auto ingresado correctamente");
			$("#tablaEstacionados").html(respuesta);
			$("#myModal").modal("hide");
		}else
		{
			alert("Error al ingresar");
			$("#myModal").modal("hide");
		}
	});
}
function GrillaLugares(piso)
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				mapaLugares: piso
			}
	});
	a.done(function(respuesta)
	{
		$("#lugaresLibres"+piso).html(respuesta);
	});
}
function RetirarAuto()
{
	$("#patente_a_buscar").val("");
	$("#modalRetiroPatente").modal("show");
}
function RetirarVehiculo(idUsuario,patente,hora,monto,lugar)
{
	var entrada = new Date(parseInt(hora));
	var salida = new Date();
	$("#patente_retiro").val(patente);
	$("#hora_entrada").val(entrada);
	$("#monto_salida").val(monto);
	$("#hora_salida").val(salida);
	$("#idUser").val(idUsuario);
	$("#idLugar").val(lugar);
	$("#hora").val(hora);
	$("#modalRetiro").modal("show");
}
function ConfirmarRetiro()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				pat: $("#patente_retiro").val(),
				iduser: $("#idUser").val(),
				idlugar:$("#idLugar").val(),
				hora: $("#hora").val(),
				monto:$("#monto_salida").val()
			}
	});
	a.done(function(respuesta)
	{
		$("#modalRetiro").modal("hide");
		$("#tablaEstacionados").html(respuesta);
		alert("Retiro Exitoso");
	});
}
function TablaRegistros()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				mostrar: "estadisticas"
			}
	});
	a.done(function(respuesta){
		
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Registros");
	});
}
function TablaEstacionados()
{
	var a=$.ajax({
		type:'post',
		url: 'nexo.php',
		data:
			{
				mostrar: "vehiculos" 
			}
	});
	a.done(function(respuesta)
	{
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Autos Estacionados");
	});
}
function TablaUsuarios()
{
	var a=$.ajax({
		type:'post',
		url: 'nexo.php',
		data:
			{
				mostrar: "usuarios" 
			}
	});
	a.done(function(respuesta)
	{
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Usuarios");
	});
}
function RetirarPorPatente()
{
	var a=$.ajax({
		type: 'post',
		url: 'nexo.php',
		data:
			{
				retiroPorPatente: $("#patente_a_buscar").val()
			}
	});
	a.done(function(respuesta)
	{
		$("#modalRetiroPatente").modal("hide");
		//alert(respuesta);
		var miRespuesta = respuesta.split('*');
		var entrada = new Date(parseInt(miRespuesta[3]));
		var salida = new Date();
		$("#patente_retiro").val(miRespuesta[1]);
		$("#hora_entrada").val(entrada);
		$("#monto_salida").val(miRespuesta[4]);
		$("#hora_salida").val(salida);
		$("#idUser").val(miRespuesta[0]);
		$("#idLugar").val(miRespuesta[2]);
		$("#hora").val(miRespuesta[3]);
		$("#modalRetiro").modal("show");
	});
}
function AltaUsuario()
{	
	window.location.href = "altausuario.php";
}
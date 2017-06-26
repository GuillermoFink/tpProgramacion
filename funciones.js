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
//***********************************************USUARIOS*******************************************************************************
//***********************************************USUARIOS*******************************************************************************
//***********************************************USUARIOS*******************************************************************************
function ModalAltaUsuario()
{
	$("#alta_nombre").val("");
	$("#alta_apellido").val("");
	$("#alta_password").val("");
	$("#modalAltaUsuario").modal("show");
}
function NuevoUsuario()
{
	var a=$.ajax({
		type:'post',
		url: 'http://localhost/git/nuevoUser',
		data:
			{
				nombre: $("#alta_nombre").val(),
				password: $("#alta_password").val(),
				apellido: $("#alta_apellido").val(),
				tipo: $("#alta_tipo").val(),
				turno: $("#alta_turno").val()
			}
	});
	a.done(function(respuesta)
	{
		$("#modalAltaUsuario").modal("hide");
		if(respuesta != false)
		{
			$("#tablausuarios").html(respuesta);
		}else
		{
			alert("Error al ingresar usuario");
		}
	});
}
function EliminarUsuario(id)
{
	var a=$.ajax({
		type: 'delete',
		url: 'http://localhost/git/EliminarUsuario',
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
function SuspenderUsuario(id)
{
	var a=$.ajax({
		type:'put',
		url:'http://localhost/git/Deshabilitar',
		data:
			{
				idUser: id
			}
	});
	a.done(function(respuesta)
	{
		if(respuesta != false)
		{
			$("#tablausuarios").html(respuesta);	
		}else
		{
			alert("Error al suspender");
		}
		
	});
}
function HabilitarUsuario(id)
{
		var a=$.ajax({
		type:'put',
		url:'http://localhost/git/Habilitar',
		data:
			{
				idUser: id
			}
	});
	a.done(function(respuesta)
	{
		if(respuesta != false)
		{
			$("#tablausuarios").html(respuesta);	
		}else
		{
			alert("Error al suspender");
		}
		
	});
}
function ModificarUser(id)
{
	var a=$.ajax({
		type:'put',
		url:'http://localhost/git/ModificarUsuario',
		data:
			{
				idModi : id
			}
	});
	a.done(function(respuesta)
	{
		if(respuesta != false)
		{
			var MiRespuesta = respuesta.split("*");
			$("#id_mod").val(MiRespuesta[0]);
			$("#password_mod").val(MiRespuesta[1]);
			$("#nombre_mod").val(MiRespuesta[2]);
			$("#ape_mod").val(MiRespuesta[3]);
			$("#tipo_mod").val(MiRespuesta[4]);
			$("#turno_mod").val(MiRespuesta[5]);
			$("#habilitado_mod").val(MiRespuesta[6]);
			$("#modalModiUser").modal("show");
		}
		else
		{
			alert("Error al modificar usuario");
		}
	});
}
function ConfirmarModificacion()
{
	var a=$.ajax({
		type:'put',
		url:'http://localhost/git/ConfirmaMod',
		data:
			{
				id: $("#id_mod").val(),
				nombre: $("#nombre_mod").val(),
				apellido: $("#ape_mod").val(),
				password: $("#password_mod").val(),
				tipo: $("#tipo_mod").val(),
				turno: $("#turno_mod").val(),
				habilitado: $("#habilitado_mod").val()
			}
	});
	a.done(function(respuesta)
	{
		$("#modalModiUser").modal("hide");
		if(respuesta != false)
		{
			$("#tablausuarios").html(respuesta);
		}
		else
		{
			alert("error al modificar usuario");
		}
	});
}
function CerrarSesion(id_usuario,login)
{
	var a=$.ajax({
		type: 'post',
		url: 'http://localhost/git/cerrarSesion',
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
//***********************************************AUTOS*******************************************************************************
//***********************************************AUTOS*******************************************************************************
//***********************************************AUTOS*******************************************************************************
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
		url: 'http://localhost/git/traerLugaresLibres',
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
		url: 'http://localhost/git/ingresarAuto',
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
		//alert(respuesta)
		if (respuesta != false)
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
		type: 'delete',
		url: 'http://localhost/git/RetirarAuto',
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
		//alert(respuesta);
		$("#modalRetiro").modal("hide");
		$("#tablaEstacionados").html(respuesta);
		alert("Retiro Exitoso");
	});
}
function RetirarPorPatente()
{
	var a=$.ajax({
		type: 'post',
		url: 'http://localhost/git/retiroPorPatente',
		data:
			{
				retiroPorPatente: $("#patente_a_buscar").val()
			}
	});
	a.done(function(respuesta)
	{
		if(respuesta != "error")
		{
			$("#modalRetiroPatente").modal("hide");
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
		}else
		{
			alert("Patente no encontrada");
			$("#modalRetiroPatente").modal("hide");
		}

	});
}
//************************************************TABLAS********************************************************************************
//************************************************TABLAS********************************************************************************
//************************************************TABLAS********************************************************************************
function TablaRegistros()
{
	var a=$.ajax({
		type: 'get',
		url: 'http://localhost/git/traerTablaRegistros',
	});
	a.done(function(respuesta){
		
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Registros");
	});
}
function TablaFiltros()
{
	var a=$.ajax({
		type: 'get',
		url: 'http://localhost/git/traerFiltros',
	});
	a.done(function(respuesta){
		
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Filtros");
	});
}
function TablaFiltrada()
{
	var a=$.ajax({
		type: 'post',
		url: 'http://localhost/git/datosFiltrados',
		data:
			{
				filtro: $("#selectFiltro").val()
			}
	});
	a.done(function(respuesta){
			//alert(respuesta);
			$("#resultadoFiltro").html(respuesta);
	});
}
function TablaEstacionados()
{
	var a=$.ajax({
		type:'get',
		url: 'http://localhost/git/traertablaestacionados'
	});
	a.done(function(respuesta)
	{	
		//console.log(respuesta);
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Autos Estacionados");
	});
}
function TablaUsuarios()
{
	var a=$.ajax({
		type:'get',
		url: 'http://localhost/git/traerTablaUsuarios'
	});
	a.done(function(respuesta)
	{
		$("#tablaEstacionados").html(respuesta);
		$("#titulo").html("Usuarios");
	});
}
function GrillaLugares(piso)
{
	var a=$.ajax({
		type: 'post',
		url: 'http://localhost/git/grillaLugares',
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

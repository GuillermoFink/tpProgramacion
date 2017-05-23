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
			alert("*"+respuesta);
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
	});
}
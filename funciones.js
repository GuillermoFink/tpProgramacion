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
		alert(respuesta);
		window.location.href = "operaciones.php";
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

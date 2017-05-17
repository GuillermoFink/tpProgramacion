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
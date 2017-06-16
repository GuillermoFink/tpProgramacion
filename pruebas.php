<?php
require_once "vendor/autoload.php";
require_once "clases/usuarios.php";
require_once "clases/registros.php";
require_once "clases/lugares.php";
require_once "clases/vehiculo.php";

echo Usuario::FormatoString("juAn PabLo jose");
echo"<br>";
echo Usuario::FormatoString("raul");
?>
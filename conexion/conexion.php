
<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos= "tienda";

try{
	$base= new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	$base->query("set names utf8;");
    $base->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
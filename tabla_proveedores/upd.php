<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/editar.css">
    <title>Actualizar</title>
</head>
<body>

<?php
    require("../conexion/conexion.php");

    
		$idu=                           $_POST['cod'];
        $nombre=                        $_POST['nombre'];
		$password=                      $_POST['clave'];
		$ema=                           $_POST['email'];
        $usu=                           $_POST['usua'];

	try{
        $sql="UPDATE proveedor SET  id=:no, telefono=:em, nombre=:usu, direccion=:cl  WHERE nit=:id";
		$resultado=$base->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":id"=>$idu,":no"=>$nombre,":em"=>$ema,":usu"=>$usu,":cl"=>$password));
        echo"<script>alert('Se actualizo correctamente')</script>";
        echo"<script>window.location='index.php'</script>";
    

        $resultado->closeCursor();
    }catch(Exception $e){
        //die("Error: ". $e->GetMessage());
         echo "Ya existe la cédula " . $idu;
    }finally{
        $base=null;//vaciar memoria
    }
?>
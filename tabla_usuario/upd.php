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
		$tipo=                          $_POST['tipo'];
        $_SESSION['type']=              $tipo;
        $nombre=                        $_POST['nombre'];
		$password=                      $_POST['clave'];
		$pass_cifrado=                  password_hash($password,PASSWORD_DEFAULT,array("clave"=>12));
		$ema=                           $_POST['email'];
        $usu=                           $_POST['usua'];

	try{
        $sql="UPDATE usuario SET  id_rol=:ti, nombre_usuario=:no, correo=:em, usuario=:usu, clave=:cl  WHERE id_usu=:id";
		$resultado=$base->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":id"=>$idu,":no"=>$nombre,":em"=>$ema,":usu"=>$usu,":cl"=>$pass_cifrado,":ti"=>$tipo));
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
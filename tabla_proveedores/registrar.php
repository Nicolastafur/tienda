<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){
		$idu=                           $_POST['cod'];
		$apellido=                      $_POST['apellido'];
        $nombre=                        $_POST['nomb'];
		$telefono=                      $_POST['tel'];
        $direccion=                     $_POST['dir'];

		?>
		<input type="number" name="idd" value="<?php echo $idu?>">
		<?php 
		$sql="INSERT INTO proveedor (nit, id,nombre,telefono,direccion) values (:id, :no, :em, :usu, :cl)";
		$resultado=$base->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":id"=>$idu,":no"=>$nombre,":em"=>$apellido,":usu"=>$telefono,":cl"=>$direccion));
        echo"<script>alert('Se registro correctamente')</script>";
        echo"<script>window.location='index.php'</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/resg_pro.css">
    <title>Registrar</title>
</head>
<body>
    <div id="res">
        <div id="h2"><h2 id="h2_1">Registro </h2></div>
        <form method="post">

        <div id="lab1"><label>Nit:</label></div>
        <input id="inp1" name="cod" type="number" placeholder="Ingrese su nit">

        <div id="lab2"><label>Id:</label></div>
        <input id="inp2" name="nomb" type="text" placeholder="Ingrese su id">

        <div id="lab3"><label>Nombre:</label></div>
        <input id="inp3" name="apellido" type="text" placeholder="Ingrese su nombre">

        <div id="lab4"><label>Telefono:</label></div>
        <input id="inp4" name="tel" type="number" placeholder="Ingrese un telefono">

        <div id="lab5"><label>Direccion:</label></div>
        <input id="inp5" name="dir" type="text" placeholder="Ingrese una direccion">

        <input id="bot" type="submit" name="bt" value="Registrar">
    </form>
    </div>
</body>
</html>
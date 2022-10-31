<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){
		$idu=                           $_POST['cod'];
		$tipo=                          $_POST['tipo'];
        $_SESSION['type']=              $tipo;
        $nombre=                        $_POST['nomb'];
		$ema=                           $_POST['correo'];
        $usu=                           $_POST['usuario'];

		?>
		<input type="number" name="idd" value="<?php echo $idu?>">
		<?php 
		$sql="INSERT INTO productos (codigo, nombre_pro,precio,existencia,nit) values (:id, :no, :usu, :em,  :ti)";
		$resultado=$base->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":id"=>$idu,":no"=>$nombre,":em"=>$ema,":usu"=>$usu,":ti"=>$tipo));
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
    <link rel="stylesheet" href="../css/registro.css">
    <title>Registrar</title>
</head>
<body>
    <div id="res">
        <div id="h2"><h2 id="h2_1">Registro </h2></div>
        <form method="post">
            
            <div id="lab1"><label>Codigo:</label></div>
            <input id="inp1" name="cod" type="number" placeholder="Ingrese codigo">

            <div id="lab2"><label>Nombre:</label></div>
            <input id="inp2" name="nomb" type="text" placeholder="Ingrese nombre">

            <div id="lab4"><label>precio:</label></div>
            <input id="inp4" name="usuario" type="number" placeholder="Ingrese precio">

            <div id="lab5"><label>cantidad:</label></div>
            <input id="inp5" name="correo" type="number" placeholder="Ingrese cantidad">

            <div id="lab7"><label>Nit:</label></div>
            <select id="inp7" name="tipo" id="" scope="col">
                <option value="text">Seleccione</option>
            <?php
                $sql= "SELECT * FROM proveedor"; 
                $resultado=$base->prepare($sql);
                $resultado->execute(array());
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                ?> 
                    <option value="<?php echo($registro['nit'])?>" > <?php echo($registro['nombre'])?>
                <?php 
                    }
                ?>
            </select>
            <input id="bot" type="submit" name="bt" value="Registrar">
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/anular.css">
    <title>Tienda123</title>
</head>
<body>

<?php
	include("../conexion/conexion.php");

	$id=$_GET["id"];
	$esta1= 2;
			
	if(isset($_POST['anular'])){

        $sql="UPDATE factura SET id_est= $esta1 where id_factura=$id";
        $resultado=$base->prepare($sql); 
		$resultado->execute(array());
        echo '<script> alert ("Se anulo la factura");</script>';
        echo '<script>window.location="index.php"</script>';

        $pro=$base->query("SELECT * from detalles where id_factura=$id ")->fetchALL(PDO::FETCH_OBJ);
                        
        foreach ($pro as $detalles) :
        $codp= $detalles->codigo;
        $cantp= $detalles->cantidad;

        $sql="SELECT * from productos where codigo=:cod";
        $existencia=$base->prepare($sql);
        $existencia->execute(array(":cod"=>$codp));
        $exist=$existencia->fetch(PDO::FETCH_ASSOC);
                    
        $antes=$exist['existencia'];
                          
        $actual= $antes + $cantp;
                                    
        $sql="UPDATE productos set existencia=:qu WHERE codigo=:co";
        $resultado=$base->prepare($sql); 
        $resultado->execute(array(":co"=>$codp, ":qu"=>$actual));                                
        endforeach;
	}
?>
<div id="res">
    <div id="h2"><h2 id="h2_1">Anular</h2></div>
        <div id="logotipo">
            <img src="../imagenes/logo.png">
        </div>
        <form name="form1" method="post" action=" ">
            <label id="lab1">Factura:</label>
            <div>
                <input type=»text» id="inp1" readonly=»readonly» name="id" placeholder="<?php echo $id?>"/>
            </div>
            <div>
                <input id="bot1" type="submit"  name="anular" class="btn btn-danger" value="Anular">
            </div>

            <div  id="bot">
                <a  href="../administrador/index.php" onmouseup="window.close()">
                    <input  type="button" value="cerrar" name="cerrar" >
                </a>
            </div>  

	

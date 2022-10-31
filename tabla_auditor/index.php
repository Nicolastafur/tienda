<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/detalles.css">
    <title>Tienda123</title>
</head>
<body>
    <?php
    
    include("../conexion/conexion.php");

    
    //--------------paginación-------------
    $registros=3;//indica que se van a ver 3 registro por página
    if(isset($_GET["pagina"])){
        if($_GET["pagina"]==1){
            header("Location:index.php");
        }else{
            $pagina=$_GET["pagina"];
        }
    }else{
        $pagina=1;//muestra página en la que estamos cuando se carga por primera vez
    }
    
    $empieza=($pagina-1)*$registros;//registro desde el cual va a empezar a mostrar
	$sql_total="SELECT * FROM factura";//muestra los 3 primeros, primer parametro indica en que posición impieza en este caso posición 0, el segundo parametro cuantos registros quiere mostrar en este caso 3 registros

    $resultado=$base->prepare($sql_total);

    $resultado->execute(array());
    $numfilas=$resultado->rowCount();//cuantos registros hay en total
    $totalpagina=ceil($numfilas/$registros);

	$registros=$base->query("SELECT * from factura LIMIT $empieza, $registros")->fetchALL(PDO::FETCH_OBJ);

    ?>
    
<h3>PANEL DE OPCIONES FACTURAS</h3>
<form method="post" action="buscar.php">
    <input class="buscar"  type="search" name="busca"  id="" placeholder="Buscar"> 
    <button id="but" class="uno">buscar</button>
    <br> <br>
    <div id="tag">
        <table id="table">
            <tr>
            <th>Factura</th>
            <th>Nombre del Cliente</th>
            <th>Fecha de Compra</th>
            <th>Vendedor</th>
            <th>Estado</th>
            <th>Total</th>
            <th colspan="2">Accion</th>
            </tr>
            <?php
            //por cada objeto que hay dentro del array repite el código
            foreach ($registros as $factura) :?> 
            <?php
				$ide=$factura->id_c;
				$sql="SELECT * FROM clientes WHERE id_c=:id";
				$resultado=$base->prepare($sql);
				$resultado->execute(array(":id"=>$ide));
				$registroe=$resultado->fetch(PDO::FETCH_ASSOC);
			
				$id=$factura->id_usu;
				$sql="SELECT * FROM usuario WHERE id_usu=:id";
				$resultado=$base->prepare($sql);
				$resultado->execute(array(":id"=>$id));
				$registrou=$resultado->fetch(PDO::FETCH_ASSOC);

                $id=$factura->id_est;
				$sql="SELECT * FROM estado WHERE id_est=:id";
				$resultado=$base->prepare($sql);
				$resultado->execute(array(":id"=>$id));
				$registroest=$resultado->fetch(PDO::FETCH_ASSOC);

               

			?>
            <tr>
                <td><?php echo $factura->id_factura?></td>
                <td><?php echo $registroe['nombre_cliente']?></td>
                <td><?php echo $factura->fecha?></td>
                <td><?php echo $registrou['nombre_usuario']?></td>
                <td><?php echo $registroest['nombre_est']?></td>
                <td><?php echo $factura->total?></td>
            <td>
                <a  id="q1" href="anular.php?id=<?php echo $factura->id_factura?>  & deta=<?php echo $factura->id_est?>">
                    <img src="../imagenes/anular.png" alt="modificar">
                </a>
            </td>
            <td>
                <a id="q1" href="ver.php?id=<?php echo $factura->id_factura?> & nomb=<?php echo $factura->id_usu?>" target=_blank>
                    <img src="../imagenes/ver.png" alt="modificar">
				</a>
            </td>
        </tr>
            

            
            <?php
            endforeach;
        
            ?>
                </table class="dos">
		<td>
            <a href="../administrador/index.php" onmouseup="window.close()">
                <input  id="bot" type="button" value="cerrar" name="cerrar" >
            </a>
		</td>
	</table>
    </form>
    <div id="pagina">
        <nav>
            <ul>
                <li <?php  echo $_GET['pagina']=1?>>
                    <a href="index.php?pagina=<?php echo $_GET['pagina']=1 ?>">Anterior</a>
                </li>
                <?php
                for($i=0; $i<$totalpagina; $i++):?>
                <li  <?php echo $_GET ['pagina']==$i+1? 'active': ''?>">
                    <a href="index.php?pagina=<?php echo $i+1?>"><?php echo $i+1?></a>
                </li>
                <?php endfor?>
                <li <?php  echo $_GET['pagina']>=$totalpagina? 'disabled' : '' ?> ">
                    <a  href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
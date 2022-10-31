
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/productos.css">
    <title>Productos</title>
</head>
<body>
<?php
	
	include("../conexion/conexion.php");

	
	//--------------paginación-------------
	$registros=3;//indica que se van a ver 3 registro por página
	if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			header("Location:./index.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
		$pagina=1;//muestra página en la que estamos cuando se carga por primera vez
	}
	
	$empieza=($pagina-1)*$registros;//registro desde el cual va a empezar a mostrar
	$sql_total="SELECT * FROM productos ";//muestra los 3 primeros, primer parametro indica en que posición impieza en este caso posición 0, el segundo parametro cuantos registros quiere mostrar en este caso 3 registros

	$resultado=$base->prepare($sql_total);

	$resultado->execute(array());
	$numfilas=$resultado->rowCount();//cuantos registros hay en total
	$totalpagina=ceil($numfilas/$registros);

	$registros=$base->query("SELECT * FROM productos LIMIT $empieza, $registros")->fetchALL(PDO::FETCH_OBJ);

?>

<h3>PANEL DE OPCIONES PRODUCTOS</h3>
    <form method="post" action="buscar.php">
        <div id="nim">
                <a href="registrar.php">
                    <button type="button">
                        Registrar
                    </button>
                </a>
            </div>
            <input class="buscar"  type="search" name="busca"  id="" placeholder="Buscar"> 
            <button id="but" class="uno">buscar</button>
            <br> <br>
            <div id="tag">
                
            <table  class="table">
            <tr>
                <th>Codigo</th>
                <th>Proveedor</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Fecha ingreso</th>
                <th colspan="2">Accion</th>
                
            </tr>
            <?php foreach ($registros as $move):?>
            <?php
				$idp=$move->nit;
				$sql="SELECT * FROM proveedor WHERE nit=:id";
				$resultado1=$base->prepare($sql);
				$resultado1->execute(array(":id"=>$idp));
				$registro1=$resultado1->fetch(PDO::FETCH_ASSOC);

            ?>
            <tr>
                <td><?php echo $move->codigo;?></td>
				<td><?php echo $registro1['nombre']?></td>
                <td><?php echo $move->nombre_pro?></td>
                <td><?php echo $move->precio?></td>
                <td><?php echo $move->existencia?></td>
                <td><?php echo $move->fecha?></td>
                <td>
                    <a id="q1" href="eliminar.php?id=<?php echo $move->codigo?> & nomb=<?php echo $move->nombre_pro?>">
                        <img src="../imagenes/borrar.png" alt="eliminar">
                    </a>
                </td>
                <td>
                    <a id="q2" href="modificar.php?id=<?php echo $move->codigo?> & nomb=<?php echo $move->nombre_pro?>">
                        <img src="../imagenes/lapiz.png" alt="modificar">
                    </a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </div>
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
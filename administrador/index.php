<?php
    session_start();
    require_once("../conexion/conexion.php");

    $cedu1=                 $_SESSION['cedu'];
    $nombre1=               $_SESSION['nomb'];
    $tipo=                  $_SESSION['tipo'];
    $tip=                   $_SESSION['tip'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administrador</title>
</head>
<header>
    <div id="subheader">
        <div id="logotipo" >
            <a href="index.php" >
                <img src="../imagenes/logo.png">
            </a>
        </div>

        <nav>
            <ul>
                <li>
					<a>Bienvenido 
                        <?php echo $_SESSION['nomb'];?>

						Usted ingeso el

						<?php include ("../includes/fecha.php"); echo fechas();?>

						a las 

						<?php include ("../includes/hora.php");echo horas();?>
					</a>
					
                <li>
					<a href="../includes/cerrar.php">
						<img src="../imagenes/cerrar sesion.png">
					</a>
				</li>
            </ul>
        </nav>
    </div>
</header>
<body>
<nav class="titulo">
    <h2> Bienvenido
        <?php echo $tip?>
        <?php echo $_SESSION['nomb'];?> 
    </h2>
</nav>
<?php 
include("../conexion/conexion.php");
?>
<div class="contenedor">

<div class="bloque1">
	<ul>
		<a href="../tabla_usuario/index.php" target=_blank>Usuarios</a>
	</ul>
</div>

<div class="bloque2">
	
	<ul>
	<a href="../tabla_clientes/index.php" target=_blank>Clientes</a>
	</ul>
</div>

<div class="bloque3">

	<ul>
	<a href="../tabla_facturas/index.php" target=_blank>Facturas</a>
	</ul>
</div>

<div class="bloque4">

	<ul>
	<a href="../tabla_detalles/index.php"target=_blank>Detalles</a>
	</ul>
</div>

<div class="bloque5">
	
	<ul>
	<a href="../tabla_productos/index.php" target=_blank>Productos</a>
	</ul>
</div>

<div class="bloque6">
	
	<ul>
	<a href="../tabla_proveedores/index.php" target=_blank>Proveedores</a>
	</ul>
</div>

</div>

</body>
</html>
<?php
    require_once ("../conexion/conexion.php");
    session_start()
?>

<?php
if($_POST['busca']== ""){
        echo"<script>alert('existen datos vacios')</script>";
        echo'<script>window.location="./index.php"</script>';
    }

    elseif ($buscar = $_POST['busca']){
        
        $sql=("SELECT * FROM usuario,roles WHERE id_usu=".$_POST["busca"]." AND usuario.id_rol= roles.id_rol");
        $resultado=$base->prepare($sql);
        $resultado->execute(array());
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);     
        if ($registro){

            $id=        $registro['id_usu'];
            $tipo=      $registro['nombre'];
            $nombre=    $registro['nombre_usuario'];
            $clave=     $registro['clave'];
            $usuario=   $registro['usuario'];
            $correo=    $registro['correo'];

        }

        else{
            echo"<script>alert('este documento no existe')</script>";
            echo'<script>window.location="./index.php"</script>';
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/buscar.css">
    <title>Buscar</title>
</head>
<body>
    <div id="res">
        <div id="h2"><h2 id="h2_1">Informacion</h2></div>
            <form action="./index.php" method="POST">

                <label id="lab1">Id:</label>
                <div>
                    <input type=»text» id="inp1" readonly=»readonly» name="id" placeholder="<?php echo $id?>"/>
                </div>

                <label id="lab2">Nombre:</label>
                <div>
                    <input type=»text» id="inp2" readonly=»readonly» name="id" placeholder="<?php echo $nombre?>"/>
                </div>

                <label id="lab4">Usuario:</label>
                <div>
                    <input type=»text» id="inp4" readonly=»readonly» name="id" placeholder="<?php echo $usuario?>"/>
                </div>

                <label id="lab5">Correo:</label>
                <div>
                    <input type=»text» id="inp5" readonly=»readonly» name="id" placeholder="<?php echo $correo?>"/>
                </div>
               
                <div id="lab7"><label>Rol del usuario:</label></div>
                    <input type=»text» id="inp7" readonly=»readonly» name="id" placeholder="<?php echo $tipo?>"/>
                </div>
                <div id="dos">
                    <input type="submit" id="bot" name="modi" value="Volver">
                    <input type="hidden" name="formreg" value="1">
                </div>
            </form>
            
            
        </div>
    </div>
</body>
</html>

            
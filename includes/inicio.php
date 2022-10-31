<?php
    session_start();
    require("../conexion/conexion.php");

    if (!isset($_POST['usu']) || !isset($_POST['bot'])) {
        header("Location: ../index.php");
    }
    elseif (isset($_POST['bot'])) {
        try {
            $login=                 htmlentities(addslashes($_POST['usu']));
            $password=              htmlentities(addslashes($_POST['pwd']));
            $contador=0;

            $sql="SELECT * FROM usuario,roles WHERE id_usu=:id and usuario.id_rol=roles.id_rol";
            $resultado=$base->prepare($sql);
            $resultado->execute(array(":id"=>$login));  
            if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
                
                if (password_verify($password, $registro['clave'])) {
                    
                   
		            $id=            $registro['id_usu'];
                    $usu=           $registro['usuario'];
                    $con=           $registro['clave'];
                    $nombre=        $registro['nombre_usuario'];
                    $add=           $registro['id_rol'];
                    $tip=           $registro['nombre'];
                    //variables Globales
                    $_SESSION['cedu']=$id;
                    $_SESSION['usuario']=$usu;
                    $_SESSION['clave']=$con;
                    $_SESSION['nomb']=$nombre;
                    $_SESSION['tipo']=$add;
                    $_SESSION['tip']=$tip;

                    $contador++;
                }
            }
            if ($contador>0){
                if ($_SESSION['tipo']==1) {
                    header("Location: ../administrador/index.php");
                }
                else if ($_SESSION['tipo']==2) {
                    header("Location: ../vendedor/index.php");
                }
                else if ($_SESSION['tipo']==3) {
                    header("Location: ../auditor/index.php");
                }
                else if ($_SESSION['tipo']==4) {
                    header("Location: ../bodega/index.php");
                }
            }
            else {
                echo '<script>alert("usuario no se encontro");</script>';
			    echo '<script>window.location="../inicio_ses.php"</script>';
                require("../inicio_ses.php");
            }
            $resultado->closecursor();
            $base->exec("set character set utf8");
        } catch (Exception $th) {
            die("Error".$th->getMessage());
        }
    }
?>


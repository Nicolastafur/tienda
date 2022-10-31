<?php
    require("../conexion/conexion.php");

    $id=                $_POST['cod'];
    $nomb=              $_POST['nombre'];
    $nomb_p=            $_POST['nombre_p'];
    $precio=            $_POST['precio'];
    $exist=             $_POST['exis'];
    $nueva=             $_POST['nuevo'];
    $canti= $exist + $nueva;
    $fecha=             $_POST['fecha'];


    try {
        $sql="UPDATE productos SET nit=:nit, nombre_pro=:np, precio=:pr, existencia=:ex, fecha=:fech WHERE codigo=:id";
        $resulta=$base->prepare($sql);
        $resulta->execute(array(":id"=>$id, ":nit" => $nomb, ":np" => $nomb_p, ":pr" => $precio, ":ex" => $canti, ":fech"=>$fecha));
        echo"<script>alert('se actualizaron los datos')</script>";
        echo"<script>window.location='index.php'</script>";

        $resulta->closeCursor();
    } catch (Exception $th) {
        echo"No se pudo actualizar";
    }finally{
        $bd=null;
    }
?>
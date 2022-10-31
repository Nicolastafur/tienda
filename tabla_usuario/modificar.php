<?php

session_start();
require("../conexion/conexion.php");



        $modi=                  $_GET['id'];
        $_SESSION['cedu']=      $modi;
    
    try {
        $sql="SELECT * FROM usuario WHERE id_usu= :co";
        $result=$base->prepare($sql);
        $result->execute(array(":co" => $modi));    
        
        
        
        if ($editar=$result-> fetch(PDO::FETCH_ASSOC)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/modificar.css">
                <title>Editar</title>
            </head>
            <body>
            
            <div id="res">
                <div id="h2"><h2 id="h2_1">Editar </h2></div>
                <form action="upd.php" method="POST">
                    
                    <label id="lab1">Id:</label>
                    <div>
                        <input type="text" id="inp1" readonly name="cod" value="<?php echo $modi?>">
                    </div>

                    <label id="lab2">Nombre:</label>
                    <div>
                    <input type="text" id="inp2" name="nombre" value="<?php echo $editar['nombre_usuario'] ?>">
                    </div>

                    <label id="lab4">Usuario:</label>
                    <div>
                    <input type="text" id="inp4" name="usua" value="<?php echo $editar['usuario'] ?>">
                    </div>

                    <label id="lab5">Correo:</label>
                    <div>
                    <input type="text" id="inp5" name="email" value="<?php echo $editar['correo'] ?>">

                    <div id="lab6"><label>Clave:</label></div>
                    <input id="inp6" name="clave" type="password" placeholder="Ingrese contraseña">
                    </div>

                    <div id="lab7"><label>Rol del usuario:</label></div>
                    <select id="inp7" name="tipo" id="" scope="col">
                        <option value="text">Seleccione</option>
                    <?php
                        $sql= "SELECT * FROM roles"; 
                        $resultado=$base->prepare($sql);
                        $resultado->execute(array());
                        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        ?> 
                            <option value="<?php echo($registro['id_rol'])?>" > <?php echo($registro['nombre'])?>
                        <?php 
                            }
                        ?>
                    </select>
                    <input type="submit" id="bot" name="modi" value="modificar">
                    <input type="hidden" name="formreg" value="1">
                 </form>
                </div>
            </center>
            </body>
            </html>

            <?php
        }else{
            echo"No existe";
        }
       


        $result->closeCursor();
        
    }catch(Exception $e) {
        die("Error: ". $e->GetMessage());
    }finally{
        $bd=null;
    }
?>
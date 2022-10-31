<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio_ses.css">
    <script src="https://kit.fontawesome.com/38ff45606a.js" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <title>Inicio de sesion</title>
</head>
<body>
    <form action="includes/inicio.php" method="post">
        <div class="overlay">
            <div class="con">
                <header class="head-form">
                    <h2>Ingresar</h2>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input  class="form-input" name="usu" id="txt-input" type="text" placeholder="Ingrese su id" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" name="pwd" type="password" placeholder="Ingres su clave" id="pwd"  name="password" required>
                    <br>
                    <button name="bot" type="submit" class="log-in"> Iniciar sesion </button>
                </div>
                
            </div>
        </div>
    </form>
</body>
</html>




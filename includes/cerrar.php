<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/index.css">
	<title>Administrador</title>
</head>
<body>
<?php
$aux=0;
session_start();
session_destroy();//cierra la sesión

echo '<script>alert("se han cerrado correctamente");</script>';
echo '<script>window.location="../inicio_ses.php"</script>';

?>
</body>
</html>
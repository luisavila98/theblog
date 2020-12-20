<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Luis Avila</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	</head>
    <body>
        <div class="topnav">
            <a class="active" href="index.php">Inicio</a>
            <?php
                if (isset($_SESSION['session'])) {
                    echo '<a href="?c=User&a=Editar&id='.$_SESSION['user_id'].'">Perfil</a>';
                    echo '<a href="?c=Login&a=Logout">Cerrar sesión ('.$_SESSION['user_name'].')</a>';
                }else{
                    echo '<a href="?c=Login&a=Index">Iniciar sesión</a>';
                    echo '<a href="?c=User&a=Registrar">Registarse</a>';
                }
            ?>
      </div>
        <div class="container">
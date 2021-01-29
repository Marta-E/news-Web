<html>

<head>

    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Document</title>
</head>

<body>
    <?php session_start(); ?>

    <div class="topbar">
        <?php if (isset($_SESSION["autentificado"])) { ?>
            <div class="boton">
                <a href="signout.php"> Log Out</a>
            </div>
        <?php } else { ?>
            <div class="boton">
                <a href="signin.php">Log in</a>
            </div>
        <?php
        }
        ?>
        <div class="boton"><a href="index.php"> Inicio</a></div>
        <div class="boton"><a href="list_usuarios.php"> Usuarios </a></div>
        <div class=" boton"> <a href="list_noticias.php"> Noticias </a> </div>
        <?php if (isset($_SESSION["autentificado"])) { ?>

            <div class=" boton"><a href="form_usuario.php">Crear usuario</a></div>
            <div class=" boton"><a href="form_noticias.php">Crear noticia</a></div>

        <?php } ?>

    </div>
</body>

</html>
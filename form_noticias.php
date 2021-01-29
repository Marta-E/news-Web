<html>

<head>
    <title>Welcome to news channel</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <?php
    include("cabecera.php");
    include 'funciones_bd.php';
    header("Content-type: text/html;charset=\"utf-8\"");


    if ($_POST) {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $email = $_POST['autor'];

        crearNoticia($titulo, $contenido, $email);
        header("Location: list_noticias.php");
    }
    ?>
    <div class="news-box">
        <div class="form-container">

            <form method="POST">
                <h2>Registrar Noticias </h2>

                <br> <br>
                <div class="form-box"> Título</div> <input name="titulo" type="text">
                <br> <br>
                <div class="form-box">Contenido</div> <textarea name="contenido" rows="4" cols="26"></textarea> <br> <br>
                <div class="form-box"> Autor</div> <input type="text" name="autor">

                <br> <br>




                <input type="submit" value="Enviar">
                <input type="reset" name="reset" value="Reset" class="btn">

            </form>
        </div>
    </div>




</body>
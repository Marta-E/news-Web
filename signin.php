<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=  width: 84px;, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("cabecera.php");
    header("Content-type: text/html;charset=\"utf-8\"");


    if ($_POST) {

        include 'funciones_bd.php';
        $result = selectUsuario();

        $contraseña = $_POST['contraseña'];
        $email = $_POST['email'];

        while ($fila = mysqli_fetch_array($result)) {
            if ($fila['Email'] == $email) {
                if ($fila['Contraseña'] == $contraseña) {

                    session_start();
                    $_SESSION['username'] = $fila['Nombre'];
                    $_SESSION["autentificado"] = "SI";
                    header("Location: index.php");
                }
            }
        }
        echo "El usuario y/o la contraseña son erróneas.";
    }


    ?>


    <div class="news-box">
        <h2>Iniciar sesión </h2>

        <form method="POST">


            <div class="form-box"> Email</div> <input name="email" type="text">
            <br> <br>

            <div class="form-box">Contraseña </div><input type="password" name="contraseña">
            <br> <br><br>

            <input type="submit" value="Enviar">
        </form>

    </div>
</body>

</html>
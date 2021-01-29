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
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];
        $email = $_POST['email'];
        $edad = $_POST['edad'];
        $fecha = $_POST['nacimiento'];
        $dire = $_POST['direccion'];
        $postal = $_POST['postal'];
        $provincia = $_POST['provincia'];
        $genero = $_POST['genero'];

        $existe = false;
        $result = selectUsuario();

        while ($fila = mysqli_fetch_array($result)) {
            if ($email == $fila['Email']) {

                echo "Este email ya ha sido utilizado.";
                $existe = true;
            }
        }

        if ($existe == false) {
            creaUsuario($nombre, $contraseña, $email, $edad, $fecha, $dire, $postal, $provincia, $genero,);
            header("Location: list_usuarios.php");
        }
    }


    ?>
    <div class="form-container">
        <div class="news-box">
            <h2>Registrar Usuario </h2>
            <form method="POST">

                <br>

                <div class="form-box"> Nombre</div> <input name="nombre" type="text">
                <br> <br>
                <div class="form-box">Contraseña</div> <input type="text" name="contraseña">
                <br> <br>
                <div class="form-box"> Email</div> <input name="email" type="text">
                <br> <br>
                <div class="form-box"> Edad</div> <input name="edad" type="text">
                <br> <br>
                <div class="form-box"> Fecha de nacimiento</div> <input name="nacimiento" type="date">
                <br> <br><br>
                <div class="form-box"> Dirección</div> <input name="direccion" type="text">
                <br> <br>
                <div class="form-box"> Código Postal</div> <input name="postal" type="text">
                <br> <br>
                <div class="form-box"> Provincia</div> <input name="provincia" type="text">
                <br> <br>
                <div class="form-box"> Género</div>
                <div class="generos"> Mujer <input type="radio" name="genero" value="M">
                    Hombre <input type="radio" name="genero" value="H"></div>
                <br> <br>

                <input type="submit" value="Enviar">
                <input type="reset" name="reset" value="Reset" class="btn">


            </form>

        </div>
    </div>


</body>
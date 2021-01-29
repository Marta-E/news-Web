<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>

    <div class="container">
        <?php
        include 'cabecera.php';
        include 'funciones_bd.php';


        if ($_GET) {
            if (isset($_GET['var1'])) {
                $id = $_GET['var1'];
                deleteUsuario($id);
                header("Location: list_usuarios.php");
            }
        }

        if ($_POST) {
            $id = $_GET['var3'];
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];

            $edad = $_POST['edad'];
            $fecha = $_POST['nacimiento'];
            $dire = $_POST['direccion'];
            $postal = $_POST['postal'];
            $provincia = $_POST['provincia'];
            $genero = $_POST['genero'];

            actualizaUsuario($id, $nombre, $contraseña, $edad, $fecha, $dire, $postal, $provincia, $genero);
            header("Location: list_usuarios.php");

        }
        $result = selectUsuario();
        if (isset($_GET['var3'])) {

        ?>

            <form method="POST">

                <br>

                <div class="form-box"> Nombre</div> <input name="nombre" type="text">
                <br> <br>
                <div class="form-box">Contraseña</div> <input type="text" name="contraseña">
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
    <?php
        } else {
            while ($fila = mysqli_fetch_array($result)) {
    ?> <div class="news-box">
            <?php
                echo "<h2>" . $fila['Nombre'] . "</h2>";

                echo "<p>" . "Email: " . $fila['Email'] . "</p>";
                echo "<p>" . "Edad: " . $fila['Edad'] . "</p>";
                echo "<p>" . "Cumpleaños: " . $fila['Fecha_nacimiento'] . "</p>";
                echo "<p>" . "Género: " . $fila['Género'] . "</p>";
                echo "<p>" . "Dirección: " . $fila['Dirección'] . ", " . $fila['Código_postal'] . ", " . $fila['Provincia'] . "</p>";
                echo "<br>";
            ?>
            <?php
                echo " <a href='list_usuarios.php?var3=" . $fila['Id'] . "'" . ">"  ?>Actualizar </a> --
            <?php
                echo " <a href='list_usuarios.php?var1=" . $fila['Id'] . "'" . ">"  ?>Borrar </a>
        </div>

<?php   }
        } ?>

</div>

</body>

</html>
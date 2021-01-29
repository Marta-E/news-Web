<html>

<head>
    <title>Welcome to news channel</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>

    <?php

    include 'funciones_bd.php';


    $result = selectNoticia();


    for ($i = 0; $i < 5; $i++) {

        $fila = mysqli_fetch_array($result);
        if (!is_null($fila)) {
    ?> <div class="news-box">
                <?php
                echo "<h2>" . $fila['Título'] . "</h2>";


                echo "<p>" . $fila['Contenido'] . "</p>";
                echo "<hr>";

                echo "<span>" . $fila['Hora_creación'] . "</span>";

                ?> </div>
    <?php
        }
    }

    ?>



</body>

</html>
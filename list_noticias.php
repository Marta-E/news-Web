<html>

<head>
    <title>Welcome to news channel</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <div class="container">

        <?php
        include 'cabecera.php';
        include 'funciones_bd.php';
        ?>



        <?php

        if ($_GET) {

            if (isset($_GET['var1'])) {
                $num = $_GET['var1'];

                like($num);
                header("Location: list_noticias.php");
            }
            if (isset($_GET['var2'])) {
                $id = $_GET['var2'];
                deleteNoticia($id);
                header("Location: list_noticias.php");
            }

            if (isset($_GET['var3'])) {
                $actualizar = $_GET['var3'];
               
            }
        }

        if ($_POST) {
            $id=$_GET['var3'];
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $email = $_POST['autor'];
          
            actualizaNoticia($id,$titulo,$contenido,$email);
            header("Location: list_noticias.php");
        }


        $result = selectNoticia();
if(isset($actualizar)) {             
       
        ?>
          <div class="news-box">
        <div class="form-container">
    
            <form method="POST">
               
                
                <br> <br>
                <div class="form-box"> Título</div> <input name="titulo" type="text">
                <br> <br>
                <div class="form-box">Contenido</div> <textarea name="contenido" rows="4" cols="26"></textarea>  <br> <br>
                 <div class="form-box"> Autor</div>  <input type="text" name="autor">
              
                <br> <br>
               
              
              
    
                <input type="submit" value="Enviar">
                <input type="reset" name="reset" value="Reset" class="btn">
             
            </form>      
    </div>
        </div>
    
 <?php
}
else{
    

        while ($fila = mysqli_fetch_array($result)) {



        ?> <div class="news-box">
                <?php


                echo "<h2>" . $fila['Título'] . "</h2>";

                echo "<p>" . $fila['Contenido'] . "</p>";
                echo "<hr>";
                ?>

                <div class="footer"> <?php
                                        echo "<span>" . $fila['Hora_creación'] . ", " . $fila['Autor'] . ".         " . "Likes:" . $fila['Likes'] . "</span>";

                                        if (isset($_SESSION['username'])) {
                                            $name = $_SESSION['username'] . "like" . $fila['Id'];
                                        }
                                        if (!isset($_COOKIE[$name])) {
                                            echo " <a href='list_noticias.php?var1=" . $fila['Id'] . "'" . ">"  ?> <img class="like" src="like.png"></a>
                    <?php     }
                    ?>




                </div>

                <?php

                echo " <a href='list_noticias.php?var3=" . $fila['Id'] . "'" . ">"  ?>Actualizar     </a> --
                <?php
                echo " <a href='list_noticias.php?var2=" . $fila['Id'] . "'" . ">"  ?>Borrar </a>

            </div>
        <?php
        }
    }

        ?>

    </div>

</body>

</html>
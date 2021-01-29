

<?php


function conectar()
{
    include 'conexion.php';
    $conn = mysqli_connect($servername, $username, $password, $database);
    return $conn;
}

function desconectar($var)
{

    mysqli_close($var);
}

function creaUsuario($var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10)
{
    $result = selectUsuario();
    $id = mysqli_num_rows($result) + 1;

    $conn = conectar();
    $query = "INSERT INTO `usuarios`(`Id`, `Nombre`, `Contraseña`, `Email`, `Edad`, `Fecha_nacimiento`, `Dirección`, `Código_postal`, `Provincia`, `Género`) VALUES ('$id','$var2','$var3','$var4','$var5','$var6','$var7',$var8,'$var9','$var10')";
    mysqli_query($conn, $query);
    desconectar($conn);
}


function selectUsuario()
{
    $conn = conectar();
    $sql = "SELECT * FROM `usuarios`";

    $result = mysqli_query($conn, $sql);
    desconectar($conn);
    return $result;
}


function actualizaUsuario($var1, $var2, $var3, $var5, $var6, $var7, $var8, $var9, $var10)
{
    $conn = conectar();
    $query = "UPDATE `usuarios` SET `Nombre`='$var2',`Contraseña`='$var3',`Edad`='$var5',`Fecha_nacimiento`='$var6',`Dirección`='$var7',`Código_postal`='$var8',`Provincia`='$var9',`Género`='$var10' WHERE `Id`='$var1'";

    mysqli_query($conn, $query);
    desconectar($conn);
}
function deleteUsuario($var1)
{
    $conn = conectar();
    $query = "DELETE FROM `usuarios`  WHERE `Id`='$var1'";
    mysqli_query($conn, $query);
    desconectar($conn);
}







function crearNoticia($var2, $var3, $var4)
{
    $result = selectNoticia();
    $id = mysqli_num_rows($result) + 1;
    $dia = date('Y-m-d H:i:s');

    $conn = conectar();
    $query = " INSERT INTO `noticia`(`Id`, `Título`, `Contenido`, `Autor`, `Hora_creación`, `Likes`) VALUES ('$id', '$var2','$var3','$var4','$dia','0')";
    mysqli_query($conn, $query);
    desconectar($conn);
}

function selectNoticia()
{
    $conn = conectar();
    $sql = "SELECT * FROM `noticia` ORDER BY `Hora_creación` DESC";

    $result = mysqli_query($conn, $sql);
    desconectar($conn);

    return $result;
}

function actualizaNoticia($var1, $var2, $var3, $var4)
{
    $conn = conectar();
    $query = "UPDATE `noticia` SET `Título`='$var2',`Contenido`='$var3',`Autor`='$var4' WHERE `Id`='$var1'";
    mysqli_query($conn, $query);
    desconectar($conn);
}



function deleteNoticia($var1)
{
    $conn = conectar();
    $query = "DELETE FROM `noticia` WHERE  `Id`='$var1'";
    mysqli_query($conn, $query);
    desconectar($conn);
}

function like($var1)
{
    $conn = conectar();
    $query = "UPDATE `noticia` SET `likes`=(`likes`+1) WHERE `Id`=$var1";
    mysqli_query($conn, $query);
    $name = $_SESSION['username'] . "like" . $var1;
    setcookie($name, "1", 2147483647);
    desconectar($conn);
}

?>
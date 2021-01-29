<?php
$servername = "localhost";
$database = "m07";
$username = "marta";
$password = "melimoni";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    echo"La base de datos no está conectada";
}

mysqli_close($conn);

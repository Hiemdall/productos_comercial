<?php
// Establecemos la conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost"; // Cambia esto a la dirección de tu servidor de base de datos
$username = "root";
$password = "";
$dbname = "blockbl5_integratic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

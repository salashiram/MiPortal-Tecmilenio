<?php
$servername = "127.0.0.1";
$username = "root";
$password = "S4l4sHir4m310100.&";
$dbname = "ieuw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    // echo "conexion con exito";
}
?>
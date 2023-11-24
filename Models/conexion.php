<?php
$servername = "localhost";
$username = "root";
$password = "YHsy8B2QJQTrYg3A";
$dbname = "ieuw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
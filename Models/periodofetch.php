<?php
session_start();
require_once 'conexion.php';
if (!isset($_SESSION['usuario'])) {
    // No hay sesión, redirigir al usuario a otra página o mostrar un mensaje de error
    http_response_code(302);
    
    exit();
}

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $accion = 'SE';
    $IDCat = 0;
    $ID_usuario = 0;
    $Categoria = 0;
    $Descripcion = 0;
    $creacion = '2000-05-05';
    $catel = 0;
    
    // Preparar y ejecutar la sentencia
    $query = "CALL spGestionPeriodos('$accion','$IDCat' ,'')";
    $result = $conn->query($query);

    // Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Array para almacenar los resultados
    $results_array = array();

    // Recorrer los resultados y guardarlos en el array
    while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
    }

    // Devolver los resultados en formato JSON al front-end
    echo json_encode($results_array);
} else {
    // No se encontraron resultados
    echo "No se encontraron resultados.";
}
header('Content-Type: application/json');
}
$conn->close();

?>
<?php

session_start();
require_once 'conexion.php';
if (!isset($_SESSION['usuario'])) {
    // No hay sesión, redirigir al usuario a otra página o mostrar un mensaje de error
    http_response_code(302);
    
    exit();
}

// Parámetros de entrada


$user = $_SESSION['ID_usuario'] ;
$fecha = '2023-11-24';
// Consulta para llamar al procedimiento almacenado según la acción y la paginación
$query = "";


    //$query = "CALL spGestionCursos('$accion','1','5','100','$busqueda','descripcion','','','1','0','$categoria','2000-05-05','$inicio','$cursosPorPagina','2')";
    $query = "CALL spGestionUsuarios('SE3','$user','','','','$fecha','0','0','$fecha','0','','','','0','0')";            



// Ejecutar la consulta
$result = $conn->query($query);
//$cursos = array();


if ($result->num_rows > 0) {
    // Array para almacenar los resultados
    $results_array = array();

    // Recorrer los resultados y guardarlos en el array
    while ($row = $result->fetch_assoc()) {
       
        $results_array[] = $row;
        
        
    }
    
    // Devolver los resultados en formato JSON al front-end
    header('Content-Type: application/json');
    echo json_encode($results_array);
    
    
} else {
    header('Content-Type: application/json');
    echo json_encode(array());
}



$conn->close();
?>
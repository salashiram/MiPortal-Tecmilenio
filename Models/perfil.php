<?php
session_start(); 

// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // No hay sesión, redirigir al usuario a otra página o mostrar un mensaje de error
    http_response_code(302);
    
    exit();
}




$data = array(
    
    
    'fecha_nacimiento' => $_SESSION['fecha-nacimiento'],
   
    'nombre' => $_SESSION['nombre'],
    
    'correo' => $_SESSION['correo'],
    
    'pais' => $_SESSION['pais'],
    'ciudad' => $_SESSION['ciudad'],
    'calle' => $_SESSION['calle'],
    'telefono' => $_SESSION['telefono'],
    'matricula' => $_SESSION['matricula'],
);


header('Content-Type: application/json');
echo json_encode($data);
?>
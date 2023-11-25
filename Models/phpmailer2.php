<?php

session_start();
 
 require_once 'conexion.php';


$fecha = '2023-11-24';

$email = $_SESSION['correo'];


    // Obtiene los valores de los campos de entrada
    
    
    // Puedes realizar acciones adicionales con el código concatenado si es necesario
    

    $response = $email;




echo json_encode($response);

?>
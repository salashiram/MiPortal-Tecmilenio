<?php

require_once 'conexion.php';
session_start();

$usuarioExistente = 0;
$IdUsuario = $_SESSION['ID_usuario'];

if($_POST){
    
    $nombre = $_POST['nombre'];
    
    $correo = $_POST['correo'];
    $fechaNac = $_POST['Fecha_N'];
    
    
    $matricula = $_POST['matricula'];
    $telefono = $_POST['telefono'];
    
    
    
    $domicilio = $_POST['domicilio'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['cp'];
    
    }

    $query = "CALL spVerificarUsuario('$correo', @usuarioExistente)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($conn));
    }

    $query = "SELECT @usuarioExistente";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_array($result);
    $usuarioExistente = $row[0];
   
    if ($usuarioExistente > 0) {
        echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
    } else {
        
            $query = "CALL spGestionUsuarios('UP','$IdUsuario','$correo','$nombre','$0','$fechaNac','$matricula','$telefono','$fechaNac','0','$domicilio','$pais','$ciudad','$cp','0')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                // Enviar respuesta de error
                echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . mysqli_error($conn)]);
            } else {
                // Enviar respuesta de éxito
                
                // Guardar usuario y rol en la sesión
                $_SESSION['usuario'] = $correo;
                
                
               
                
                $_SESSION['nombre'] = $nombre;
                $_SESSION['matricula'] =$matricula;
                $_SESSION['telefono'] = $telefono;
                
                
                $_SESSION['correo'] =$correo;
                $_SESSION['fecha'] = $fechaNac;
                $_SESSION['calle'] = $domicilio;
                $_SESSION['pais'] = $pais;
                $_SESSION['ciudad'] = $ciudad;
                $_SESSION['cp'] = $cp;
                
                echo json_encode(['success' => true, 'message' => 'Registro exitoso, ara ara~']);
            }
            exit();
        
    }

// Verificar si la consulta se ejecutó correctamente


// Recibir los datos de regreso
// while ($row = mysqli_fetch_assoc($result)) {
//     // Hacer algo con los datos
//     echo $row['campo'];
// }

// Cerrar la conexión
mysqli_close($conn);
?>
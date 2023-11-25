<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'conexion.php';


$usuarioExistente = 0;


if($_POST){
    
    $nombre = $_POST['nombre'];
    
    $correo = $_POST['correo'];
    $fechaNac = $_POST['Fecha_N'];
    
    $contraseña = $_POST['contrasenia'];
    
    $confcontra = $_POST['confcontra'];
    $matricula = $_POST['matricula'];
    $telefono = $_POST['telefono'];
    
    $seleccion = $_POST['gender'];
    $rol = 0;
    
   
    
      if ($seleccion == 'alumno') {
          $rol = 1;
          
      } else if ($seleccion == 'empleado') {
          $rol = 0;
      }
    
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
        
            $query = "CALL spGestionUsuarios('IN','1','$correo','$nombre','$contraseña','$fechaNac','$matricula','$telefono','$fechaNac','$rol','$domicilio','$pais','$ciudad','$cp','0')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                // Enviar respuesta de error
                echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . mysqli_error($conn)]);
            } else {
                // Enviar respuesta de éxito
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
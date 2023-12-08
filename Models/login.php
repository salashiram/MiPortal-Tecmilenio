<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
 require_once 'conexion.php';
 session_start();
 if (!isset($_SESSION['usuario'])) {
    session_unset();

 }


// Obtener los valores del formulario de inicio de sesión
if (isset($_POST['usuario']) && isset($_POST['pass'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    //dummy
    


        // Llamar al procedimiento almacenado spLogin
        $sql = "CALL spLoginUsuario('$usuario', '$pass')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            

        
                // Inicio de sesión exitoso
                $rol = $row['Rol'];
                
                
                // Guardar usuario y rol en la sesión
                $_SESSION['usuario'] = $usuario;
                
                if ($rol == 0) {
                    $_SESSION['rol'] = 'Empleado';
                } elseif ($rol == 1) {
                    $_SESSION['rol'] = 'Alumno';
                }
               
                
                $_SESSION['nombre'] = $row['NombreCompleto'];
                $_SESSION['matricula'] = $row['Matricula'];
                $_SESSION['telefono'] = $row['Telefono'];
                $_SESSION['ID_usuario'] = $row['IdUsuario'];
                $_SESSION['fecha-nacimiento'] = $row['FechaNacimiento'];
                $_SESSION['correo'] = $row['Correo'];
                $_SESSION['fecha'] = $row['FechaIngreso'];
                $_SESSION['calle'] = $row['Calle'];
                $_SESSION['pais'] = $row['Pais'];
                $_SESSION['ciudad'] = $row['Ciudad'];
                $_SESSION['cp'] = $row['CP'];
                
                $response['status'] = 'success'; // Estado de la respuesta
                $response['message'] = 'Inicio de sesión exitoso';
                
                
            
        } else {
            // Inicio de sesión fallido
            
            $response['status'] = 'error'; // Estado de la respuesta
            $response['message'] = 'Credenciales incorrectas';
        }
    
}else {
    // Datos de inicio de sesión no proporcionados
    $response['status'] = 'error'; // Estado de la respuesta
    $response['message'] = 'Por favor, proporciona usuario y contraseña';
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($response);

?>
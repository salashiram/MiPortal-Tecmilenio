<?php
 require_once 'conexion.php'; 
session_start();

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
              
                
                $_SESSION['fecha'] = $row['FechaIngreso'];
                $_SESSION['calle'] = $row['Calle'];
                $_SESSION['pais'] = $row['Pais'];
                $_SESSION['ciudad'] = $row['Ciudad'];
                $_SESSION['cp'] = $row['CP'];
                
                
                header("Location: ../Views/home.html");
                exit();
            
        } else {
            // Inicio de sesión fallido
            
            $error_message = "Credenciales incorrectas";
            header("Location: ../index.html?error=" . urlencode($error_message));
            exit();
        }
    
}
$conn->close();
?>
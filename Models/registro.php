<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'conexion.php';
require '../vendor/autoload.php';
header('Content-Type: application/json');
$usuarioExistente = 0;


if ($_POST) {

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



    $query = "CALL spVerificarUsuario('$correo', @usuarioExistente)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . mysqli_error($conn)]);
        exit();
    }

    $query = "SELECT @usuarioExistente";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . mysqli_error($conn)]);
        exit();
    }

    $row = mysqli_fetch_array($result);
    $usuarioExistente = $row[0];

    if ($usuarioExistente > 0) {

        echo json_encode(['success' => true, 'message' => 'error']);
        exit();
    } else {

        $query = "CALL spGestionUsuarios('IN','1','$correo','$nombre','$contraseña','$fechaNac','$matricula','$telefono','$fechaNac','$rol','$domicilio','$pais','$ciudad','$cp','0')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            // Enviar respuesta de error
            echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . mysqli_error($conn)]);
            exit();
        } else {


            try {

                echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'El mensaje no se pudo enviar. Error: ' . $mail->ErrorInfo]);
            }
            exit();
            // Enviar respuesta de éxito

        }


    }


} else {
    echo json_encode(['success' => false, 'message' => 'No se recibieron datos POST']);
}
mysqli_close($conn);
?>
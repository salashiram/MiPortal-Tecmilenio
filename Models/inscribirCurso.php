<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    // No hay sesión, redirigir al usuario a otra página o mostrar un mensaje de error
    http_response_code(302);
    exit();
}

header('Content-Type: application/json');

if ($_POST) {
    $cursoId = $_POST['cursoId'];
    $user = $_SESSION['ID_usuario'];
    $Creacion = '2000-05-05';

    // Iniciar una transacción
    mysqli_begin_transaction($conn);

    try {
        // Consulta para obtener el curso
        $queryCurso = "CALL spGestionCursos('SE', '$cursoId', '', '1', '0', '0')";
        $resultadoCurso = mysqli_query($conn, $queryCurso);

        if ($row = mysqli_fetch_assoc($resultadoCurso)) {
            // Procesar el row obtenido
            // ...

            // Luego liberar el resultado
            mysqli_free_result($resultadoCurso);

            // Asegurarse de que todos los resultados se han procesado
            while (mysqli_more_results($conn) && mysqli_next_result($conn)) {
                // Aunque no esperes más resultados, esto asegura que todo esté limpio
            }

            // Procesar el segundo procedimiento almacenado
            $idPeriodo = $row['Semestre'];
            if ($idPeriodo == 6) $idPeriodo = 1;
            elseif ($idPeriodo == 7) $idPeriodo = 2;
            elseif ($idPeriodo == 8) $idPeriodo = 3;

            $query = "CALL spGestionCursosUsuarios('IN', '1', '$cursoId', '$user', '$idPeriodo', '0', '0', '0', '1', 'Ivan Garcia Cantu', '1', 'En Linea', '', '201', '$Creacion')";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                throw new Exception('Error al ejecutar la consulta: ' . mysqli_error($conn));
            }

            // Enviar correo electrónico, si es necesario
            // ...

            echo json_encode(['success' => true, 'message' => 'Registro exitoso']);

            // Confirmar la transacción
            mysqli_commit($conn);
        } else {
            // El curso no existe o no cumple con los requisitos
            throw new Exception('Curso no disponible o no encontrado');
        }
    } catch (Exception $e) {
        // Algo salió mal, revertir la transacción
        mysqli_rollback($conn);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>
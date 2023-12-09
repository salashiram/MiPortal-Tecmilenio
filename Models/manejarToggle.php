<?php
session_start();

// Cambiar el estado de los toggles en la sesión según la solicitud AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['toggle']) && isset($_POST['state'])) {
    $toggleState = $_POST['state'] === 'true' ? true : false;

    switch ($_POST['toggle']) {
        case 'myToggle4':
            $_SESSION['showGrades'] = $toggleState;
            break;
        case 'myToggle5':
            $_SESSION['showCourses'] = $toggleState;
            break;
        case 'myToggle6':
            $_SESSION['showKardex'] = $toggleState;
            break;
    }

    // Devolver los estados actuales
   
} else {
    $response = ['success' => false, 'message' => 'Datos no proporcionados'];
}
echo json_encode($response);
}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Devolver los estados de los toggles
    $response = [
        'showGrades' => $_SESSION['showGrades'] ?? false,
        'showCourses' => $_SESSION['showCourses'] ?? false,
        'showKardex' => $_SESSION['showKardex'] ?? false
    ];
    echo json_encode($response);
}

?>
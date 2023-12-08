<?php
session_start();

// Cambiar el estado de los toggles en la sesión según la solicitud AJAX
if (isset($_POST['toggle']) && isset($_POST['state'])) {
    $toggleState = $_POST['state'] === 'true' ? true : false; // Asegúrate de que el estado se convierte correctamente
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

    // Depuración
    
}

echo json_encode(['success' => true]);
?>
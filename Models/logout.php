<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a index.html
echo json_encode(['status' => 'success', 'message' => 'Sesión cerrada exitosamente']);
exit();
?>
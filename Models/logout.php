<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a index.html
header("Location: ../Views/index.html");
exit();
?>
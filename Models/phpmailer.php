<?php
require '../vendor/autoload.php';
session_start();
 if (!isset($_SESSION['usuario'])) {
    session_unset();

 }
 require_once 'conexion.php';
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ieuw3660@gmail.com'; // Tu dirección de correo electrónico de Gmail
$mail->Password = 'audx ssfn dkgn ufvg'; // Tu contraseña de Gmail
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$email = $_POST['email']; // La dirección de correo electrónico del destinatario

$mail->setFrom('ieuw3660@gmail.com', 'IEUW');
$mail->addAddress($email); // Añadir el destinatario
$mail->isHTML(true); // Configurar el formato del email a HTML
$codigoAleatorio = rand(100000, 999999);

$mail->Subject = 'Recuperacion de la cuenta';
$mail->Body    = '<html>
<head>
    <title>Restablecer Contraseña</title>
    <style>
    .codigo-resaltado {
        font-size: 18px;
        color: #ff0000; 
        font-weight: bold;
        background-color: #f0f0f0; 
        padding: 5px;
        border-radius: 5px;
        display: inline-block;
        border: 1px solid #d0d0d0; 
    }
</style>
</head>
<body>
    <h2>Restablecer Clave</h2>
    <p>Para restablecer tu Clave, por favor usa el siguiente codigo:</p>
    <p><span class="codigo-resaltado">Codigo de Restablecimiento: ' . $codigoAleatorio . '</span></p>
    <p>Este codigo sera valido por 15 minutos.</p>
</body>
</html>';
$usuarioExistente = 0;
$fecha = '2023-11-24';


// Primera consulta para verificar si el usuario existe
$query = "CALL spVerificarUsuario('$email', @usuarioExistente);";
if ($conn->multi_query($query)) {
    do {
        $result = $conn->store_result();
        if ($result instanceof mysqli_result) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

// Segunda consulta para obtener el valor de la variable OUT usuarioExistente
$query = "SELECT @usuarioExistente AS usuarioExistente;";
if ($conn->multi_query($query)) {
    do {
        $result = $conn->store_result();
        if ($result instanceof mysqli_result) {
            $row = $result->fetch_assoc();
            $usuarioExistente = $row['usuarioExistente'];
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

if ($usuarioExistente > 0) {
    // Tercera consulta para gestionar usuarios
    $query = "CALL spGestionUsuarios('SE2','1','$email','','','$fecha','1','0','$fecha','0','','','','0','0');";
    if ($conn->multi_query($query)) {
        do {
            $result = $conn->store_result();
            if ($result instanceof mysqli_result) {
                $row = mysqli_fetch_array($result);
                $userId = $row['IdUsuario'];
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
    }

    // Cuarta consulta para gestionar códigos de recuperación
    
    $query = "CALL spGestionCodigosRecuperacion('IN','1','$userId','$codigoAleatorio','$fecha','0');";
    if ($conn->multi_query($query)) {
        do {
            $result = $conn->store_result();
            if ($result instanceof mysqli_result) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());

        echo json_encode(['success' => true, 'message' => 'Registro exitoso, ara ara~']);
    }
} else {
    echo "El usuario no existe.";
}


try {
    $mail->send();
    $response = ['status' => 'success', 'message' => 'Mensaje enviado'];
} catch (Exception $e) {
    $response = ['status' => 'error', 'message' => 'El mensaje no se pudo enviar. Error: ' . $mail->ErrorInfo];
}

echo json_encode($response);

?>
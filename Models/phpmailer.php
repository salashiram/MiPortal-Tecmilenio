<?php
require '../vendor/autoload.php';
session_start();
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
$_SESSION['token'] = $codigoAleatorio;
$_SESSION['noCorreo'] = $email;
$mail->Subject = 'Recuperación de la cuenta';
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

try {
    $mail->send();
    $response = ['status' => 'success', 'message' => 'Mensaje enviado'];
} catch (Exception $e) {
    $response = ['status' => 'error', 'message' => 'El mensaje no se pudo enviar. Error: ' . $mail->ErrorInfo];
}

echo json_encode($response);

?>
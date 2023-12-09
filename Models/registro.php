<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'conexion.php';
require '../vendor/autoload.php';
header('Content-Type: application/json');
$usuarioExistente = 0;


if ($_POST) {

    $nombre = $_POST['onlyText'];

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

            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ieuw3660@gmail.com'; // Tu dirección de correo electrónico de Gmail
            $mail->Password = 'audx ssfn dkgn ufvg'; // Tu contraseña de Gmail
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;


            $mail->setFrom('ieuw3660@gmail.com', 'IEUW');
            $mail->addAddress($correo); // Añadir el destinatario
            $mail->isHTML(true); // Configurar el formato del email a HTML
            $mail->CharSet = 'UTF-8';

            $mail->Subject = 'Bienvenido';
            $mail->Body = '<html>
                <head>
                <meta charset="UTF-8">
                    <title>Bienvenido a Mi Portal Tec Milenio</title>
                    <style>
                        .container {
                            font-family: Arial, sans-serif;
                            max-width: 600px;
                            margin: auto;
                            background: #f8f8f8;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            color: #006837; /* Color oficial de Tec Milenio */
                            text-align: center;
                        }
                        .info {
                            background-color: #fff;
                            padding: 15px;
                            border-radius: 5px;
                            border: 1px solid #ddd;
                        }
                        .info h3 {
                            color: #333;
                        }
                        .info p {
                            color: #666;
                            font-size: 14px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1 class="header">¡Bienvenido a Mi Portal Tec Milenio!</h1>
                        <div class="info">
                            <h3>Estimado/a ' . $nombre . ',</h3>
                            <p>¡Nos complace darte la bienvenida a nuestra comunidad académica! Aquí tienes algunos detalles importantes de tu registro:</p>
                            <p><b>Correo electrónico:</b> ' . $correo . '</p>
                            <p><b>Matrícula:</b> ' . $matricula . '</p>
                            <p><b>Teléfono de contacto:</b> ' . $telefono . '</p>
                            <p><b>Fecha de Nacimiento:</b> ' . $fechaNac . '</p>                            
                            <p><b>Domicilio:</b> ' . $domicilio . ', ' . $ciudad . ', ' . $pais . ' - ' . $cp . '</p>
                            <p>Esperamos que tu experiencia en Mi portal Tec Milenio sea enriquecedora y llena de aprendizajes significativos.</p>
                            <p>Si tienes alguna duda o necesitas más información, no dudes en contactarnos.</p>
                            <p>Para cualquier duda o comentario, llama al teléfono 8128859680 o envia un correo electrónico a salashiram@outlook.com</p>
                            <p>¡Mucho éxito en tu nueva etapa académica!</p>
                            <p><b>"Este correo ha sido generado automáticamente. Por favor, no respondas a este mensaje, ya que no será recibido ni revisado por un agente humano."</b></p>
                        </div>
                    </div>
                </body>
                </html>';
            try {
                $mail->send();
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
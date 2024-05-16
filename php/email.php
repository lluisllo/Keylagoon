<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

$mail = new PHPMailer();
try {
    $mail->isSMTP(true);
    $mail->SMTPAuth   = true;

    $mail->Username = "test@lluisllodraedib.com";
    $mail->Password = "1r~Ym}0K";
    $mail->Host = "smtp.dondominio.com";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("test@lluisllodraedib.com", "Admin");
    $mail->addReplyTo("test@lluisllodraedib.com", "Admin");
    $mail->addAddress("lluisllodra@estudiante.edib.es", "Lluis");

    $mail->isHTML(true);
    $mail->Subject = 'Registro de Usuario';

    $mail->Body = "<h1>Registro</h1><p>Prueba de registro</p>";
    $mail->AltBody = "Registro";

    if ($mail->send()) {
        echo "Message has been sent";
    } else {
        echo $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

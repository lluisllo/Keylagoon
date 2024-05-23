<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon | Registro de usuario</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

        <header>
            <!--  -->

            <picture>
                <div class="header__logo">
                    <img src="../svg/Logo.svg" alt="" style="height: 101px" />
                </div>
            </picture>

            <h1>Keylagoon</h1>

            <!--  -->
        </header>


        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require './phpmailer/Exception.php';
        require './phpmailer/PHPMailer.php';
        require './phpmailer/SMTP.php';

        // Parámetros interceptados
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $id_usuario = isset($_GET['id']) ? $_GET['id'] : '';
        $verification_code = isset($_GET['code']) ? $_GET['code'] : '';

        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->SMTPAuth   = true;

            $mail->Username = "test@lluisllodraedib.com";
            $mail->Password = "1r~Ym}0K";
            $mail->Host = "smtp.dondominio.com";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("test@lluisllodraedib.com", "Admin");
            $mail->addReplyTo("test@lluisllodraedib.com", "Admin");
            $mail->addAddress($email, "Verificar usuario");

            $mail->isHTML(true);
            $mail->Subject = 'Registro de Usuario';

            $verification_link = "localhost/Keylagoon/php/verificarUsuario.php" . urlencode($id_usuario) . "&code=" . urlencode($verification_code);
            $mail->Body = "<h1>Verificación de cuenta</h1>
<p>Se ha intentado registrar este email en <a href='http://keylagoon.lluisllodraedib.com/'>Keylagoon.</a></p>
<p>Haga clic en el siguiente enlace para verificar su cuenta: 
<a href='http://localhost/Keylagoon/php/verificarUsuario.php?id=" . urlencode($id_usuario) . "&code=" . urlencode($verification_code) . "'>Verificar Cuenta</a></p>";
            $mail->AltBody = "Registro\nHaga clic en el siguiente enlace para verificar su cuenta: {$verification_link}";

            if ($mail->send()) {
                echo "<h4 style='color: #e0e0e0; margin: 5%; font-weight: lighter;'><li>Confirma tu email</li></h4>";
            } else {
                echo $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        ?>
    </div>
</body>

</html>
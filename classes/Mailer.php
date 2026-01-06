<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../phpmailer/src/Exception.php';
require_once __DIR__ . '/../phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../phpmailer/src/SMTP.php';

class Mailer
{
    public function sendMail($to, $name, $imagePath)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'your_email@gmail.com';
            $mail->Password   = 'your_app_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('your_email@gmail.com', 'Support Team');
            $mail->addAddress($to, $name);
            $mail->addAttachment($imagePath);

            $mail->isHTML(true);
            $mail->Subject = 'Contact Form Confirmation';
            $mail->Body    = "Hello {$name},<br>We have received your form.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

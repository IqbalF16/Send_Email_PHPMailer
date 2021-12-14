<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['send'])) {

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $emailPengirim = $_POST['emailPengirim'];
    $pass = $_POST["pass"];


    //Load composer's autoloader
    // require 'vendor/autoload.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $emailPengirim;
        $mail->Password = $pass;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Send Email
        $mail->setFrom($emailPengirim);

        //Recipients
        $mail->addAddress($email);
        $mail->addReplyTo($emailPengirim);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();

        $_SESSION['result'] = 'Message has been sent';
        $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
        $_SESSION['result'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        $_SESSION['status'] = 'error';
    }

    header("location: index.php");
}

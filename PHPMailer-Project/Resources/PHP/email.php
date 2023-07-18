<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

try {
    if (isset($_POST['send'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = ''; //Your Mail
        $mail->Password = ''; //Your App Password

        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress(''); //Your Mail
        $mail->Subject = $subject;


        $body = '<h3>Message from "Contact me test" with PHPMailer.</h3>';
        $body .= "<p>Name: <Strong>" . $name . "</strong></p>";
        $body .= "<p>Email: <Strong>" . $email . "</strong></p>";
        $body .= "<p>Subject: <Strong>" . $subject . "</strong></p>";
        $body .= "<p>Messaje:<br> <Strong>" . $message . "</strong></p>";
        
        $mail->Body = $body;
        $mail->send();
        
        header("Location: ../../Views/done.html");
    }
} catch (Exception $e) {
    header("Location: ../../Views/error.html?error=$e");
}

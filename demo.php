<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'c:\xampp2\htdocs\Phpmailer\src\Exception.php';
require 'c:\xampp2\htdocs\Phpmailer\src\PHPMailer.php';
require 'c:\xampp2\htdocs\Phpmailer\src\SMTP.php';

$mail = new PHPMailer(true);

$email = 'lakshayjatawat2506@gmail.com';
$password = 'nlstdlgtgcjavwnh';

try{
    $mail -> isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; // Change to 465 if using SSL    
    $mail -> SMTPAuth = true;
    $mail -> Username = $email;
    $mail -> Password = $password;
    $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //$mail -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    
    $mail -> setFrom($email, 'lakshayjatawat2506@gmail.com');
    $mail -> addAddress('lakshayjatawat2003@gmail.com', 'Lakshay Jatawat');
    $mail -> addReplyTo($email,'Sender Name');

    $mail -> isHTML(true);
    $mail -> Subject = 'Requirement of Roll Boxes';
    $mail -> Body = 'Dear Sir, This is to inform you that we are running out if the Tcket Rolls . So kindly deliever 50 boxes to Vasai Road Station. ';

    $mail -> send();
    echo "
        <script>
        alert('Email Sent successfully');
        window.location.href='AdminPanel.php';
        </script>
    ";
} catch (Exception $e){
    echo "Message could not be sent.",$mail -> ErrorInfo;
}


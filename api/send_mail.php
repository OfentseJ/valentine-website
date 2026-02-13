<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                       //gmail SMTP server set to send through
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('SMTP_USER');                     //SMTP username (your gmail account)
    $mail->Password   = getenv('SMTP_PASS');                               //SMTP password (your gmail password or app password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom(getenv('SENDER_EMAIL'), 'Mailer');         //Set the sender of the message (your email address)
    $mail->addAddress(getenv('RECEIVER_EMAIL'), 'Katlego');     //Add a recipient (your bae's email address)

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'I Love You';
    $mail->Body = 'Happy Valentine Day My Love.<br><br>
    I wish I could see you in person and be with you today, but our lives do not allow that right now.
    But you should know that I long for your presence more with each day that passes.<br><br>
    I love you so much. You are the best thing that has ever happened to me ❤.<br><br>
    Love,<br>
    Ofentse';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

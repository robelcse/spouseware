<?php
require 'mailer/mailer/src/Exception.php';
require 'mailer/mailer/src/PHPMailer.php';
require 'mailer/mailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
mail("hassanrrs@gmail.com","My subject",$msg);
die();

$html = file_get_contents('https://spouseware.net/mail_template.php?package=3');
$mail = new PHPMailer(true);
try {
    //$mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'localhost';
    $mail->Port = 587;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Username = 'invoice@spouseware.net';
    $mail->Password = '3PDXnXi&[P0e';
    $mail->IsHTML(true);
    $mail->addAddress('hassanrrs@gmail.com', '');
    $mail->From = 'invoice@spouseware.net';
    $mail->FromName = "Spouseware";
    $mail->Subject = $subject;
    $mail->Body = $html;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->WordWrap = 50;
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
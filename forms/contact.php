<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.example.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'your_email@example.com';                    
    $mail->Password   = 'your_email_password';                              
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.com', 'Recipient Name'); 

    // Content
    $mail->isHTML(true);                                 
    $mail->Subject = $subject;
    $mail->Body    = nl2br($message);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

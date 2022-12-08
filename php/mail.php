<?php
require_once 'PHPMailer/PHPMailerAutoload.php'; //Librería PHPMailer

function send_mail($recipient, $subject, $message)
{
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

   //Enable verbose debug output
    $mail->isSMTP();                                           
     //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'potenciapanadera01@outlook.com';                     //SMTP username
    $mail->Password   = 'WWWrt500';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port 

    //Recipients
    $mail->setFrom('potenciapanadera01@outlook.com', 'Universidad Tecnologica de Durango');
    $mail->addAddress($recipient, 'Estimado usuario: ');     //Add a recipient
    
    //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //Content
    $mail->isHTML(true);                                  

    if($mail->send())
    return true;
    else
    return false;
}

?>
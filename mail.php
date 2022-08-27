<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/POP3.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $name, $title, $content)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

        $mail->IsSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';     
        $mail->Port       = 587 ;          
        $mail->SMTPSecure = "STARTTLS";
                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        //Set the SMTP server to send through

        $mail->Username   = 'pyclothing1@outlook.com.vn';                     //SMTP username
        $mail->Password   = 'trungthien@123';                               //SMTP password                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->SMTPAuth = true;
        //Recipients

        $mail->CharSet = "UTF-8";
        $mail->setFrom('
pyclothing1@outlook.com.vn', 'Mail PYClothing');

        $mail->Username   = 'xxthiencute@outlook.com';                     //SMTP username
        $mail->Password   = 'trungthien@123';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        $mail->CharSet = "UTF-8";

        //Recipients
        $mail->setFrom('xxthiencute@outlook.com', 'Mail PYClothing');

        $mail->addAddress($email, $name);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;

      
        $mail->send();
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

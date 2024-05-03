<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\Users\Yehos\vendor\phpmailer\phpmailer\src\Exception.php';
require_once 'C:\Users\Yehos\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require_once 'C:\Users\Yehos\vendor\phpmailer\phpmailer\src\SMTP.php';

//Load Composer's autoloader
require 'C:\Users\Yehos\vendor\autoload.php';

//Function to send email
function sendWelcome($userName, $userEmail){

    //Store user info
    $name = $userName
    $email = $userEmail

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'optimisedgains.info@gmail.com';                     //SMTP username
        $mail->Password   = 'lfpcpwvefwyxinho';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('optimisedgains.info@gmail.com', 'OptimisedGains');
        $mail->addAddress("$email", "$name");     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Welcome to OG';
        $mail->Body = "Hey $name, <br> 
            welcome to Optimised Gains! <br> 
            Lets get to work."; // Email body (you can use HTML here)
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

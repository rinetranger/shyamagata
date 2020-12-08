<?php
require 'vendor/autoload.php';
mb_internal_encoding("UTF-8");

//PHPMailer Object
$mail = new PHPMailer\PHPMailer\PHPMailer();


//Enable SMTP debugging. 
// $mail->SMTPDebug = 2;   
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "rinkishi.sakura.ne.jp";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "sciencehome@rinkishi.sakura.ne.jp";                 
$mail->Password = "admin1234";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                           

//From email address and name
$mail->From = "sciencehome@rinkishi.sakura.ne.jp";
$mail->FromName = "sciencehomeyamagata";

//To address and name
$mail->addAddress("t.asanuma@hosiken.co.jp", "t.asanuma");


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "FROM SHyamagataWEBsite";
$mail->Body = "<i><p>inquiry from {$_POST['Name-3']}</p><p>phone number:{$_POST['phone']}</p><p>email: {$_POST['email']}</p><pre>{$_POST['Message-Body']}</pre></i>";
// $mail->AltBody = "This is the plain text version of the email content";
$mail->CharSet = "UTF-8";
$mail->AuthType = 'LOGIN';


if(!$mail->send()) 
{
    echo("Mailer Error: " . $mail->ErrorInfo);
} 
else 
{
    echo("<span>メールを送信しました</span>");
    echo('<a href="/">戻る</a>');
}

?>

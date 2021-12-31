

<?php

  //echo phpinfo(); exit;

  //echo getcwd(); exit;

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/* Include the Composer generated autoload.php file. */
require getcwd().'/vendor/autoload.php';
//require 'C:\Users\EliteBook\Sites\devdesktop\jswpaints\vendor\autoload.php';


/* If you installed PHPMailer without Composer do this instead: */
/*
require 'C:\Users\EliteBook\Sites\devdesktop\jswpaints\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\Users\EliteBook\Sites\devdesktop\jswpaints\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\Users\EliteBook\Sites\devdesktop\jswpaints\vendor\phpmailer\phpmailer\src\SMTP.php';
*/

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

try {

   $mail->setFrom('darth@empire.com', 'Darth Vader');
   $mail->addAddress('limbuzkid@gmail.com', 'Emperor');
   $mail->Subject = 'Force';
   $mail->Body = 'There is a great disturbance in the Force.';
   $mail->isSMTP();
   $mail->Host = 'smtpprxy01.eastus2.cloudapp.azure.com';
   //$mail->SMTPAuth = TRUE;
   //$mail->SMTPSecure = 'ssl';
   //$mail->Username = 'devchatbot@jsw.in';
   //$mail->Password = 'jsw@2019';
   $mail->Port = 65525;

   /* Enable SMTP debug output. */
   $mail->SMTPDebug = 4;

   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}

<?php  
require 'db.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              
		try {

			$mail->SMTPDebug = 2;                                 
			$mail->isSMTP();                                      
			require_once 'templates/mail.php';
			$mail->addAddress('mreouven@gmail.com', 'Rubnet');     
			$mail->isHTML(true);   
		    $mail->Subject = 'Resultat Of The Game ( rubnet.fr )';
		    $mail->Body='test';
		    $mail->send();
			$_SESSION['message']= 'Message has been sent';
			header('location: success.php');}
		catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			}






?>


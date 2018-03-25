<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'db.php';
$result = $bdd->query("SELECT * FROM users");

while ($user = $result->fetch())
{
$mail = new PHPMailer(true);    
	
	include 'mail.php';
	$mail->isHTML(true); 
    $mail->setFrom('mreouven@rubnet.fr', 'Rubnet TRIVIA SCE');                     

    
	$message = file_get_contents('index.html');
	$replacements = array(
	
		    '({fname})' => $user['first_name'],
    		'({lname})' => $user['last_name']
					   
	);
	$message = preg_replace( array_keys( $replacements ), array_values( $replacements ), $message );

	$mail->MsgHTML( stripslashes( $message ) );
	$mail->Subject = 'CYBER INFO';
	$mail->addAddress( $user['email'], 'reouven');
	try {
		  	$mail->send();
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
header("location: index.html")
?>
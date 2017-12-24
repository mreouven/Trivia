<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];


$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
 
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());


if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { 

  
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

  
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0;
        //$_SESSION['logged_in'] = true; 
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

     	$mail = new PHPMailer(true);                              
		try {
			//Server settings
			$mail->SMTPDebug = 2;                                 
			$mail->isSMTP();                                      
			require_once 'templates/mail.php';	
			$mail->addAddress($email, 'Rubnet');     
			$mail->isHTML(true);   
		    $mail->Subject = 'Account Verification ( rubnet.fr )';
        $message_body = '
        Hello '.$first_name.',<br>

        Thank you for signing up!<br>

        Please click this link to activate your account:
	
        <a href="http://mreouven.synology.me/project/verify.php?email='.$email.'&hash='.$hash.'"> Click ici!</a>';

     $mail->Body=$message_body;

			$mail->send();
			$_SESSION['message']= 'Message has been sent';
			header("location: success.php");}
		catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			}

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
}


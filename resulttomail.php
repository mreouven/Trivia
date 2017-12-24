<?php
require 'db.php';
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$result = $bdd->query('SELECT first_name, last_name, level_user , admin FROM users ORDER BY level_user DESC LIMIT 5');

$t = "<section>";
$t .="  <div id='resu'> <h2>Resultat</h2></div>";
$t .="  <table width='300' border='0' cellspacing='0' cellpadding='0'>";
       
$t .="<table>";
$t .="<tr bgcolor=$color><td>First name</td><td>Last name</td><td>Level user</td></tr>"; 
while ($row = $result->fetch()) 
{
  
  $firstname = $row['first_name']; 
  $lastname = $row['last_name']; 
  $leveluser = $row['level_user'];
  if ($alternate == "1") { 
  $color = "#ffffff"; 
  $alternate = "2"; 
  } 
  else { 
  $color = "#efefef"; 
  $alternate = "1"; 
  } 


$t .="<tr bgcolor=$color><td>$firstname</td><td>$lastname</td><td>$leveluser</td></tr>"; 
} 

$t .=" </table>";
$t .=" </section>";


$mail = new PHPMailer(true);                              
		try {

			$mail->SMTPDebug = 2;                                 
			$mail->isSMTP();                                      
			require_once 'templates/mail.php';   
			$mail->setFrom('mreouvenrubnet@outlook.com', 'Rubnet');
			$mail->addAddress( $_SESSION['email'], 'Rubnet');     
			$mail->isHTML(true);   
		    $mail->Subject = 'Resultat Of The Game ( rubnet.fr )';
		    $mail->Body=$t;
		    $mail->send();
			$_SESSION['message']= 'Message has been sent';
			header('location: success.php');}
		catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			}


?>	




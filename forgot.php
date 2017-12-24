<?php 

require 'templates/db.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { 

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];

  
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

       

		$mail = new PHPMailer(true);                              
		try {
		
			$mail->SMTPDebug = 2;                                 
			$mail->isSMTP();                                      
			require_once 'templates/mail.php';
			$mail->addAddress($email, 'Rubnet');     
			$mail->isHTML(true);   
		    $mail->Subject = 'Password Reset Link ( rubnet.fr )';
		
			$message_body = '
						Hello '.$first_name.' '.$last_name.',<br>
						You have requested password reset!<br>
						Please click this link to reset your password:
						http://mreouven.synology.me/project/reset.php?email='.$email.'&hash='.$hash; 

			$mail->Body=$message_body;

			$mail->send();
			$_SESSION['message']= 'Message has been sent';
			header("location: success.php");}
		catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
     
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
  <div class="form">

    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        Email Address<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Reset</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>

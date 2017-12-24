<?php
require 'templates/db.php';
require_once 'templates/header.php';
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
} 

else if ( $_SESSION['admin'] != 2 ) {
  $_SESSION['message'] = "Super Admin Only!";
  header("location: error.php");    
}

if(isset($_GET['email'])){$email=$_GET['email'];}
echo "</br>";
?>

<html>
<head>
  <title>Reset Your Password</title>	
  <?php include 'css/css.html'; ?>
  
</head>

<body>
<?php if($_SERVER['REQUEST_METHOD'] != 'POST')
{
?>

  <div class="form">

    <h1>Reset Your Password</h1>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
     <div class="field-wrap">
      <?php if(isset($email)){

      	echo"<input type='email'required autocomplete='off' name='email' value=$email />";
      } 
      else{
      	echo "<label>Email Address<span class='req'>*</span></label>";
      	echo"<input type='email'required autocomplete='off' name='email'/>";
      }
      ?>
      
    </div>
	 <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
    <button class="button button-block"/>Reset</button>
    </form>
  </div>
   
<?php
}
else{
	
	
	if( isset($_POST['email']) && isset($_POST['password']))
	{
			$email = $mysqli->escape_string($_POST['email']); 
			$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

			if ( $result->num_rows == 0 )
			{ 
				$_SESSION['message'] = "You have entered invalid MAIL for password reset!";
				header("location: error.php");
			}
			else{ 
				 $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
				$email = $mysqli->escape_string($_POST['email']);
				
				$sql = "UPDATE users SET password='$new_password' WHERE email='$email'";

				if ( $mysqli->query($sql) ) {

					$_SESSION['message'] = "Your password has been reset successfully!";
					header("location: success.php");    

				}
	
	}
	}

}

?>
<style type="text/css">
	body {
    background-image: -moz-linear-gradient(top, rgba(23, 24, 32, 0.95), rgba(23, 24, 32, 0.95)), url(img/overlay.png);
    background-image: -webkit-linear-gradient(top, #3bc087, #428bca), url(img/overlay.png);}

  body, input, select, textarea {
    color: rgb(255	, 255, 255) !important ;
    text-align: center !important; 

}
</style>
<?php require_once 'templates/footer.php'; ?>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
	

</html>
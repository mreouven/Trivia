<?php

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { 
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password'])) {
			
	if ($user['active']==1){
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
		$_SESSION['level_user'] = $user['level_user'];
		$_SESSION['admin'] = $user['admin'];
        $_SESSION['date_quiz']=strtotime($user['date_quiz']);
        

        $_SESSION['logged_in'] = true;
		header("location: index.php");}
		else{
			
			$_SESSION['message']="Account is unverified, please confirm your email by clickin on the email link!";
			 header("location: error.php");
			
		}
	
	
	
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}


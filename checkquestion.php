<?php
session_start();
require 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
else {
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	$level_user = $_SESSION['level_user'];
}

$quesc=1;
?>

<?php 
	$right_answer=0;
	$wrong_answer=0;
	$unanswered=0;
	$keys=array_keys($_POST);

	$order=join(",",$keys);

	$response= $bdd->query('SELECT id,reponse from question	ORDER BY id');
	while($result= $response->fetch()){
				if($result['reponse']==$_POST[$result['id']]){
					$right_answer++;
				}else if($_POST[$result['id']]=='nondefini'){
					$unanswered++;
				}
				else{
					$wrong_answer++;
				}
	}
	

		$time_res=$_POST['time'];
		$level_user= (2.66*$right_answer)+(0.08*$time_res)-($unanswered);
		if ($level_user<0)
			$level_user=0;
		if ($level_user>100)
			$level_user=100;
		$_SESSION['right_answer']=$right_answer;
		$_SESSION['wrong_answer']=$wrong_answer;
		$_SESSION['unanswered']=$unanswered;
		$_SESSION['level_user']=$level_user;
		$_SESSION['date_quiz']=time();
		
		$sql = "UPDATE users SET level_user='$level_user' WHERE email='$email'";

        if ( $mysqli->query($sql) ) { 
			$mysqli->query("UPDATE users SET date_quiz=NOW() WHERE email='$email'");
			header("location: result-quiz.php");
        }
		else {
		  $_SESSION['message'] = "Erreur de connection dataBase!";
		  header("location: error.php");    
		}


?>




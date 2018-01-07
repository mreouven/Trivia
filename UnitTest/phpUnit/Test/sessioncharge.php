  <?php   
include 'db.php';


$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc();

 	    $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
		$_SESSION['level_user'] = $user['level_user'];
		$_SESSION['admin'] = $user['admin'];
        $_SESSION['date_quiz']=strtotime($user['date_quiz']);
        

        ?>
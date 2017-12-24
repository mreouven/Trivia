<?php 
//ob_start();
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();

require_once 'config.php'; 
?>
<!DOCTYPE html>
  


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="php quiz script">
    <meta name="keywords" content="TrivaGame SCE SAMI RUBNET">
	<meta name="author" content="https://plus.google.com/mreouven/">
    
	
	<title>CYBER ISRAEL TECH</title>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    
	<!-- Bootstrap -->
    <link href="https://bootswatch.com/4/superhero/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://moodle.sce.ac.il/theme/image.php/sce_waxed/theme/1510567351/favicon" type="image/x-icon" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
   

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>
	<link rel="stylesheet" href="assets/css/main.css" />
    
 </head>
   
						<header id="header">
					<h1 id="logo"><a href="#">ICA</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#">Menu</a>
								<ul>
									<li><a href="question.php">Game Quiz Start</a></li>
									<li><a href="resultat.php">Result</a></li>
									<li><a href="contactus.php">Contact Us</a></li>


								</ul>
							</li>
							<?php if($_SESSION['logged_in']==1) {  ?>
							<li>
								<a href="#">Welcome <?php if($_SESSION['logged_in']) { echo $_SESSION['first_name']; }?></a>
								<ul>
									<li><a href="profile.php">My Account</a></li>
									<li><a href="logout.php">Logout</a></li>

								<?php  if(isset($_SESSION['admin'])==1 && $_SESSION['admin']!=0) { ?>
									<li>
										<a href="#">Admin</a>
										<ul>
											<li><a href="editquizlist.php">Question Managment</a></li>
											<?php if($_SESSION['admin']==2) echo "<li><a href='edituserlist.php'>User Managment</a></li>"; ?>
										</ul>
									</li>
								<?php } ?>

								</ul>
							</li>

							

							<?php }else{  ?>
							<li><a href="logpage.php" class="button special">Sign Up</a></li><?php } ?>
						</ul>
					</nav>
				</header>

	
			
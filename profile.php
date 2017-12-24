<?php

require_once 'templates/header.php';
session_start();


if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {

    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	 $level_user = $_SESSION['level_user'];
   $admin = $_SESSION['admin'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>
<style type="text/css">
  body {
    color: #292d38;
    background-image: -webkit-linear-gradient(top,#3bc087, #428bca ), url(img/overlay.png);
}

</style>
<body >
  <div id="page-wrapper">
  <div class="form">

          <h1>Welcome</h1>
          
          <p>
          <?php 
     

          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              

              unset( $_SESSION['message'] );
          }
          
          ?>  
          </p>
          
          <?php
          

          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          } 
        
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          <?   if ( $admin ==1 ){
              echo
              '<div class="info">
                Admin User
              </div>';
          }?>
          <?   if ( $admin==2 ){
              echo
              '<div class="info">
                Super Admin User
              </div>';
          }?>
		  <p><?= 'Level: '.$level_user ?> </p>          
          <a href="javascript:history.go(-1)"><button class="button button-block"/>Retour</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</div>
<?php require_once 'templates/footer.php'; ?>
</body>
</html>

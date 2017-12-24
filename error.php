<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];  
		
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>     
    <a href="javascript:history.go(-1)"><button class="button button-block"/>Retour</button></a>
</div>
</body>
</html>

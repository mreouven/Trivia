<?php

require_once 'templates/header.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
elseif (intval($_SESSION['date_quiz'])-time()>=(-86400)) {
	$_SESSION['message'] = "You can play once every 24 hours";
  	header("location: error.php");   
}
else {

    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	$level_user = $_SESSION['level_user'];
}
require 'db.php';

$reponse = $bdd->query('SELECT * FROM question');
$quesc=1;
echo  '<br/><br/><br/><br/><br/><br/><br/><br/><br/>';
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Questionnaire for <?php echo $first_name ?></title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<?php //include 'css/css.html'; ?>
  </head>


  <body>
	  <div class="col-sm-6">
	      <div class="well">
				<h3><span class="fa fa-user"></span> User</h3>
	  			<h2><?php echo $first_name.' '.$last_name; ?></h2>
	         	 <p><?= $email ?></p>
			  	<p><?= 'Level: '.$level_user ?> </p>          

		   </div>  
	    </div>

   <form name ="question" id="quiz_form" method ="post" action ="checkquestion.php">
		   <h1 class="text-center text_underline"> Timer : <span id='timer'></span> </h1>
				<?php
					while ($donnees = $reponse->fetch())
						{
				?>
			<div>
				<div class="questions">
					<div class="col-sm-9">
		     			 <div class="well">
			  
					        <h2>Question <?php echo $donnees['id'] ?>/30</h2>
							<p><?php echo $donnees['question']; ?><br><br>
					          <input class="repo" type="radio" value="1" name="<?php echo $donnees['id'];?>"  id="q<?php echo $donnees['id'] ?>"><?php echo $donnees['r1']; ?><br>
					          <input class="repo" type="radio" value="2" name="<?php echo $donnees['id'];?>"  id="q<?php echo $donnees['id'] ?>"><?php echo $donnees['r2']; ?><br>
							  <input class="repo" type="radio" value="3" name="<?php echo $donnees['id'];?>"  id="q<?php echo $donnees['id'] ?>"><?php echo $donnees['r3']; ?><br>
							  <input class="repo" type="radio" checked='checked' style='display:none' value="nondefini" id='q<?php echo $donnees['id'];?>' name='<?php echo $donnees['id'];?>'/>   
					        <br><span class="reponse" id="reponse<?php echo $donnees['id'] ?>"><?php echo $donnees['reponse']; ?><br></span>
							</p>
			 			 </div>
			  		</div>  
		   		 </div>
			
				    <?php
					$reponsearr[$quesc]=$donnees['reponse'];
					$quesc++;

					}
					$reponse->closeCursor();
					?>
					<input style='display:none' name='time' id='time' value="">
			 		 <div id="btnnext"><button type="button" class="btn btn-success" id="next">Next</button></div>
			</div>
    </form>
<style type="text/css">


body {
    background-image: -moz-linear-gradient(top, rgba(23, 24, 32, 0.95), rgba(23, 24, 32, 0.95)), url(img/overlay.png);
    background-image: -webkit-linear-gradient(top, #3bc087, #428bca), url(img/overlay.png);}

  body, input, select, textarea {
    color: rgb(14, 13, 13) !important ;
    text-align: center !important; 

}
#timer{
          animation: Resu 1s infinite;

      }

      @keyframes Resu{
          0%{color: black;}
          50%{color: red;}
          100%{color: black;}
      }
}
	
.btn-success {
{

	margin-top: 243px !important;
    margin-left: 123px !important;
}


</style>

		<div class="progress progress-striped active">
			<div class="progress-bar progress-bar-success" role="progress-bar" id="progress-bar" style="width: 0%"></div>
		</div>
<style>
.progress{

	width: 100%;
	height: 20px;
}
</style>
	<?php
		
		
	?>
	
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="js/questionnaire.js"></script> 
	<?php require_once 'templates/footer.php'; ?>
  </body>
</html>
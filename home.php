s<?php 
require 'db.php';
require_once 'templates/header.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}



$result = $bdd->query('SELECT first_name, last_name, level_user , admin FROM users ORDER BY level_user LIMIT 5');



?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Project SCE">
    <meta name="author" content="Reouven Mimoun">

    <title> Trivia Game</title>

 
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>


    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

   <style type="text/css">
     @-webkit-keyframes spaceboots {
        0% { -webkit-transform: translate(2px, 1px) rotate(0deg); }
        10% { -webkit-transform: translate(-1px, -2px) rotate(-1deg); }
        20% { -webkit-transform: translate(-3px, 0px) rotate(1deg); }
        30% { -webkit-transform: translate(0px, 2px) rotate(0deg); }
        40% { -webkit-transform: translate(1px, -1px) rotate(1deg); }
        50% { -webkit-transform: translate(-1px, 2px) rotate(-1deg); }
        60% { -webkit-transform: translate(-3px, 1px) rotate(0deg); }
        70% { -webkit-transform: translate(2px, 1px) rotate(-1deg); }
        80% { -webkit-transform: translate(-1px, -1px) rotate(1deg); }
        90% { -webkit-transform: translate(2px, 2px) rotate(0deg); }
        100% { -webkit-transform: translate(1px, -2px) rotate(-1deg); }
      }
      #Triviatitle{
          animation: spaceboots 1s infinite;
      }

   </style>
    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div id="Triviatitle">
              <h1 class="brand-heading">Trivia</h1></div>
              <p class="intro-text">project for hadas la pute</p>
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About Trivia</h2>
            <p> blablablablablablablabla blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla
              <a href="http://startbootstrap.com/template-overviews/grayscale/">blablablablablablablabla</a>. blablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablabla.</p>
            <p>blablablablablablablablablablablablablablablabla 
              <a href="http://gratisography.com/">blablablablablablablabla</a>
              blablablablablablablablablablablablablablablabla
              <a href="http://snazzymaps.com/">blablablablablablablabla</a>.</p>
            <p>blablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablabla	</p>
          </div>
        </div>
      </div>
    </section>
<style>
#rotata  a{
  -webkit-transition:-webkit-transform .9s; 
  -moz-transition:-moz-transform .9s;       
  -o-transition:-o-transform .9s;           
  -ms-transition:-ms-transform .9s;         
  transition:transform .9s;
}
 
#rotata  a:hover{
  -webkit-transform:rotate(360deg); 
  -moz-transform:rotate(360deg);
  -o-transform:rotate(360deg); 
  -ms-transform:rotate(360deg); 
  transform:rotate(360deg);
}
#rotata a span{
     position:absolute;
     margin-top:23px;
     margin-left:-35px;
     color:#09c;
     background:rgba(0,0,0,.9);
     padding:15px;
     border-radius:3px;
     box-shadow:0 0 2px rgba(0,0,0,.5);
     transition:all .25s; 
     opacity:0;               
}
#rotata a:hover span, a:focus span{
     transform:scale(1) rotate(0);   
     opacity:1;     
}
</style>
    <!-- Start Game Section -->
    <section id="download" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>Start the game</h2>
          <p>you can start start the game</p>
         <div id="rotata"> <a href="question.php" class="btn btn-default btn-lg">Start!
            
            </a>
          </div>
        </div>
      </div>
    </section>
	
	   <!-- Map Section -->
<style>
      #resu{
          animation: Resu 1s infinite;
      }
      @keyframes Resu{
          0%{opacity: 1;}
          50%{opacity: 0;}
          100%{opacity: 1;}
      }
</style>
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
           <div id="resu"> <h2>Resultat</h2></div>
            	<?php $index=0; while ($donnees = $result->fetch()) { ?>
	
					<p>
						<?php echo $donnees['first_name']; echo $donnees['last_name']; echo $donnees['level_user']; ?>
				   </p>
		<?php	}?>
		
		
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Contact Trivia SCE</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              <a href="http://rubnet.fr">blablablabla</a>
              oblablablablablablabla blablablablablablabla blabla</p>
            <ul class="list-inline banner-social-buttons">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/rubnet.fr/" class="btn btn-default btn-lg">
                  <i class="fa fa-facebook fa-fw"></i>
                  <span class="network-name">Facebook</span>
                </a>
              </li>
             
              <li class="list-inline-item">
                <a href="https://www.google.co.il/maps/place/Rub'Net/@31.239206,34.784291,15z/" class="btn btn-default btn-lg">
                  <i class="fa fa-google fa-fw"></i>
                  <span class="network-name">Google Maps</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

 
	
    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Copyright &copy; Rubnet 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>

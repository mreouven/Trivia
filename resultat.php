  <?php 
 require 'templates/db.php';
  require_once 'templates/header.php';




  $result = $bdd->query('SELECT first_name, last_name, level_user , admin FROM users ORDER BY level_user DESC LIMIT 5');

  echo  '<br/><br/><br/>';
  $alternate = "1";
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
      <link href="css/animate.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
          <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-7243260-2']);
                _gaq.push(['_trackPageview']);
                (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
          </script>

      <link href="css/grayscale.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

     <style type="text/css">

  body {
      background-image: -moz-linear-gradient(top, rgba(23, 24, 32, 0.95), rgba(23, 24, 32, 0.95)), url(img/overlay.png);
      background-image: -webkit-linear-gradient(top, #3bc087, #428bca), url(img/overlay.png);}

    body, input, select, textarea {
      font-family: "Roboto", Helvetica, sans-serif;
      color: rgb(14, 13, 13) !important ;
      text-align: center !important; 

  }

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
        #resu{
            animation: Resu 1s infinite;
        }
        @keyframes Resu{
            0%{opacity: 1;}
            50%{opacity: 0;}
            100%{opacity: 1;}
        }
        #mail a{
          
           -webkit-transition:-webkit-transform .9s; 
          -moz-transition:-moz-transform .9s;       
          -o-transition:-o-transform .9s;           
          -ms-transition:-ms-transform .9s;         
           transition:transform .9s;
        }
        #mail a:hover{
          -webkit-transform:rotate(360deg); 
          -moz-transform:rotate(360deg);
          -o-transform:rotate(360deg); 
          -ms-transform:rotate(360deg); 
          transform:rotate(360deg);
        }
        
  </style>


  <section>
   

    <div id="resu"> <h2>Result</h2></div>
    <?php if ( $_SESSION['logged_in'] == 1 ) {?>
  <div id="rotata"> <a href="resulttomail.php" class="btn btn-default btn-lg">Send To Mail
              
              </a>
            </div>

  <?php } ?>
    <table width="300" border="0" cellspacing="0" cellpadding="0">
          <?php

  echo "<table>";
  echo "<tr bgcolor=$color><td>First name</td><td>Last name</td><td>Level user</td></tr>"; 
  while ($row = $result->fetch()) 
  {
    
    $firstname = $row['first_name']; 
    $lastname = $row['last_name']; 
    $leveluser = $row['level_user'];
    if ($alternate == "1") { 
    $color = "#ffffff"; 
    $alternate = "2"; 
    } 
    else { 
    $color = "#efefef"; 
    $alternate = "1"; 
    } 


    echo "<tr bgcolor=$color><td>$firstname</td><td>$lastname</td><td>$leveluser</td></tr>"; 
  } 
  echo "</table>";
  ?>

  </table>
  </section>


  <style>
  #rotata  a{
    color: #000000 !important;
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
     
      <?php require_once 'templates/footer.php'; ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
      <script src="js/grayscale.min.js"></script>

    </body>

  </html>

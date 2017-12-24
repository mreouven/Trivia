<!DOCTYPE HTML>
<html>
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/main.css" />

	</head>

	<body class="landing">
		<div id="page-wrapper">
      <?php require_once 'templates/header.php';?>
			<!-- Banner -->

				<section id="banner">
					<div class="content">
						<header>
							<h2>Israel Cyber Association</h2>
							<p>Be Aware, Be Secure, Be Cyber</p>
						</header>
						<span class="image"><img src="img/rubnet.jpg" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="img/Bandeau.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u$(medium)">
									<header>
										<h2>About Israel Cyber Association</h2>
										<p>The New Age of Cyber is arriving</p>
									</header>
								</div>
								<div class="4u 12u$(medium)">
									<p>The Israel Cyber Association is a company in collaboration with the State of Israel which aims to develop the domain of Cyber in his country. In order that the company inovate in educational means at both professionals and amateurs. A new world based on cyber and the futur is approching and The ICA is here to tkae part in this new air.</p>
								</div>
								<div class="4u$ 12u$(medium)">
									<p>The ICA will bring together leaders of the cyber industry, government decision-makers from around the world, technology experts and enthusiasts for dialogue and presentation of commercial problem-solving strategies for diverse challenges in the cyber realm and also amateur in order to recruit them.</p>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>
<style type="text/css">
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
			
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="img/Hacker.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>About Trivia Game</h2>
							<p>A new way to show your skills </p>
						</header>
						<p>In order to find and recruit Cyber Genius in an interactive way for the entreprise. If you are in the field in Cyber here is your chance to show your skills in a Trivia Game. Only start the game and 30 questions are here to show your skills.</p>
						<ul class="actions">
              <div id="rotata">
							<li><a href="question.php" class="button">Start Game</a></li>
            </div>
						</ul>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>
<style type="text/css">
	span.icon.alt.major:hover {
					    background: #3bc087!important;
				}

</style>
			
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Laboratory of Security and Cyber</h2>
							<p>The ICA at the cutting edge</p>
						</header>
						<div class="box alt">
							<div class="row uniform">
								<section class="4u 6u(medium) 12u$(xsmall)">
									<span class="icon alt major fa-area-chart"></span>
									<h3>Statistic</h3>
									<p>The best-Enterprise award 2018</p>
								</section>
								<section class="4u 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-comment"></span>
									<h3>Contact Us</h3>
									<p>We are available for any question, 24/7</p>
								</section>
								<section class="4u$ 6u(medium) 12u$(xsmall)">
									<span class="icon alt major fa-flask"></span>
									<h3>ICA Branches</h3>
									<p>The Company has branches all around the world.</p>
								</section>
								<section class="4u 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-paper-plane"></span>
									<h3>Newsletter</h3>
									<p>We inform you about all updates</p>
								</section>
								<section class="4u$ 6u$(medium) 12u$(xsmall)">
									<span class="icon alt major fa-lock"></span>
									<h3>Level Security</h3>
									<p>All our products and projects have the best level in matter of Security.</p>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions">
								<li><a href="#" class="button">Back to Top</a></li>
							</ul>
						</footer>
					</div>
				</section>

			
			<!-- Footer -->
			<?php require_once'templates/footer.php' ;?>

		</div>



	</body>
</html>
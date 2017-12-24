<?php
session_start();
	if ( $_SESSION['logged_in'] == 1 ) {
    
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	$level_user = $_SESSION['level_user'];
}
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	//Load composer's autoloader
	require 'vendor/autoload.php';



	if(isset($_POST['submit'])){

		$namee=$_POST['name'];
		$emaile=$_POST['email'];
		$messagee=$_POST['message'];
		$category=$_POST['category'];

		$mail = new PHPMailer(true);                              
	     try{ //Server settings
	      $mail->SMTPDebug = 2;                              
	      $mail->isSMTP();                                      
	      require_once 'templates/mail.php';   
	      $mail->addAddress('mreouvenrubnet@outlook.com', 'SUPPORT TRIVIA'); 
	      if (isset($_POST['copy']))
			{
   			 $mail->addAddress($emaile, $namee); 
			}    
	      $mail->isHTML(true);   
		  $mail->setFrom('mreouvenrubnet@outlook.com', $namee);
		  $mail->Subject = ' SUPPORT Trivia( rubnet.fr ) '.$category;
	      $mail->Body=$messagee.'<body><br><br><p>Mail client:'.$emaile.'<br>Nom client:'.$namee.'<p><body><style>p{font-size: 14px;line-height: 1.428571429;color: #292d38;</style>';
				
				$mail->send();
				$_SESSION['message']= 'Message has been sent';
				header("location: success.php");

			}

					catch (Exception $e) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					}

		}

	else{ require_once 'templates/header.php'; ?>





	<!DOCTYPE HTML>
	
	<html>
		<head>
			<title>Elements - Landed by HTML5 UP</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<link rel="stylesheet" href="assets/css/main.css" />

		</head>
		<body>
			<style type="text/css">
				form {
			margin: 0 0 2em 0;
			}

		label {
			color: #ffffff;
			display: block;
			font-size: 0.9em;
			font-weight: 300;
			margin: 0 0 1em 0;
		}

		input[type="text"],
		input[type="password"],
		input[type="email"],
		select,
		textarea {
			-moz-appearance: none;
			-webkit-appearance: none;
			-ms-appearance: none;
			appearance: none;
			-moz-transition: border-color 0.2s ease-in-out;
			-webkit-transition: border-color 0.2s ease-in-out;
			-ms-transition: border-color 0.2s ease-in-out;
			transition: border-color 0.2s ease-in-out;
			background: transparent;
			border-radius: 4px;
			border: solid 1px rgba(255, 255, 255, 0.3);
			color: inherit;
			display: block;
			outline: 0;
			padding: 0 1em;
			text-decoration: none;
			width: 100%;
		}

			input[type="text"]:invalid,
			input[type="password"]:invalid,
			input[type="email"]:invalid,
			select:invalid,
			textarea:invalid {
				box-shadow: none;
			}

			input[type="text"]:focus,
			input[type="password"]:focus,
			input[type="email"]:focus,
			select:focus,
			textarea:focus {
				border-color: #e44c65;
			}

		.select-wrapper {
			text-decoration: none;
			display: block;
			position: relative;
		}

			.select-wrapper:before {
				-moz-osx-font-smoothing: grayscale;
				-webkit-font-smoothing: antialiased;
				font-family: FontAwesome;
				font-style: normal;
				font-weight: normal;
				text-transform: none !important;
			}

			.select-wrapper:before {
				color: rgba(255, 255, 255, 0.3);
				content: '\f078';
				display: block;
				height: 3em;
				line-height: 3em;
				pointer-events: none;
				position: absolute;
				right: 0;
				text-align: center;
				top: 0;
				width: 3em;
			}

			.select-wrapper select::-ms-expand {
				display: none;
			}

		input[type="text"],
		input[type="password"],
		input[type="email"],
		select {
			height: 3em;
		}

		textarea {
			padding: 0.75em 1em;
		}

		select option {
			background-color: #1c1d26;
			color: #ffffff;
		}

		select:focus::-ms-value {
			background: transparent;
		}

		input[type="checkbox"],
		input[type="radio"] {
			-moz-appearance: none;
			-webkit-appearance: none;
			-ms-appearance: none;
			appearance: none;
			display: block;
			float: left;
			margin-right: -2em;
			opacity: 0;
			width: 1em;
			z-index: -1;
		}

			input[type="checkbox"] + label,
			input[type="radio"] + label {
				text-decoration: none;
				color: rgba(255, 255, 255, 0.75);
				cursor: pointer;
				display: inline-block;
				font-size: 1em;
				font-weight: 100;
				padding-left: 2.55em;
				padding-right: 0.75em;
				position: relative;
			}

				input[type="checkbox"] + label:before,
				input[type="radio"] + label:before {
					-moz-osx-font-smoothing: grayscale;
					-webkit-font-smoothing: antialiased;
					font-family: FontAwesome;
					font-style: normal;
					font-weight: normal;
					text-transform: none !important;
				}

				input[type="checkbox"] + label:before,
				input[type="radio"] + label:before {
					border-radius: 4px;
					border: solid 1px rgba(255, 255, 255, 0.3);
					content: '';
					display: inline-block;
					height: 1.8em;
					left: 0;
					line-height: 1.725em;
					position: absolute;
					text-align: center;
					top: 0;
					width: 1.8em;
				}

			input[type="checkbox"]:checked + label:before,
			input[type="radio"]:checked + label:before {
				background: rgba(255, 255, 255, 0.25);
				color: #ffffff;
				content: '\f00c';
			}

			input[type="checkbox"]:focus + label:before,
			input[type="radio"]:focus + label:before {
				border-color: #e44c65;
			}

		input[type="checkbox"] + label:before {
			border-radius: 4px;
		}

		input[type="radio"] + label:before {
			border-radius: 100%;
		}

		::-webkit-input-placeholder {
			color: rgba(255, 255, 255, 0.5) !important;
			opacity: 1.0;
		}

		:-moz-placeholder {
			color: rgba(255, 255, 255, 0.5) !important;
			opacity: 1.0;
		}

		::-moz-placeholder {
			color: rgba(255, 255, 255, 0.5) !important;
			opacity: 1.0;
		}

		:-ms-input-placeholder {
			color: rgba(255, 255, 255, 0.5) !important;
			opacity: 1.0;
		}

		.formerize-placeholder {
			color: rgba(255, 255, 255, 0.5) !important;
			opacity: 1.0;
		}

			</style>
			<div id="page-wrapper">

							<br/>
								<section>
									<h3>Contact us</h3>
									<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
										<div class="row uniform 50%">
											<div class="6u 12u$(xsmall)">
													<?php if ( $_SESSION['logged_in'] != 1 ) {
																echo "<input type='text' name='name' id='name' value='' placeholder='Name' required/>";}
														else {
																echo "<input type='text' name='name' id='name' value='$first_name $last_name' placeholder='$first_name $last_name' required/>";} ?>
									
											</div>
											<div class="6u$ 12u$(xsmall)">
												<?php if ( $_SESSION['logged_in'] != 1 ) { 
																echo "<input type='email' name='email' id='email' value='' placeholder='Email' required/>";}
														else {
																echo "<input type='email' name='email' id='email' value='$email' placeholder='$email' required/>";} ?>
							
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="category" id="category" required>
														<option value="">- Category -</option>
														<option value="Trivia Game">Trivia Game</option>
														<option value="Administration">Administration</option>
														<option value="Login Erreur">Login</option>
														<option value="Human Resources">Human Resources</option>
														<option value="Other">Other</option>

													</select>
												</div>
											</div>
								
											<div class="6u 12u$(medium)">
												<input type="checkbox" id="copy" name="copy">
												<label for="copy">Email me a copy of this message</label>
											</div>
											<div class="12u$">
												<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" name="submit" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>

						

						</div>
					</div>

				<!-- Footer -->
				<?php require_once'templates/footer.php' ;?>

			</div>

			
		</body>
	</html>

	<?php } ?>
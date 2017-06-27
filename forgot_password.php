<html lang="fr">
	<head>
		<title>Innoside | Oublie mot de passe</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top:30%">
			<div class="row cols1">
				<div class="col-md-8 col-md-push-4 form1">
					<h2 style="text-align:justify">Mot de passe oubli&eacute; ?</h2>
					</br></br>
				</div>

				<div class="col-md-8 col-md-push-4 form1">
					<form method="POST" action="forgot_password.php">
						</br>
						<p style="text-align:justify; font-size:20px">Veuillez saisir l'adresse email que </br>
							vous avez utilis&eacute; lors de votre inscription.</p></br>
						<p style="text-align:justify; font-size:20px">Ainsi, vous recevrez un email contenant un hyperlien pour changer votre mot de passe.</p>
						<input type="text" name="email" class="form-control text-center input1" placeholder="Saisissez votre email" required="required"></br>
						</br>
				</div>

			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center">
			<p><button style="width:150px" type="submit" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right" onclick="function()">&nbsp;<font style="font-family:sans-serif">Envoyer</font></button></p>
					</form>
		</div>
		<?php
		if (isset($_POST['email'])){
		 	require('gmail.php');
		 	sentmail($_POST['email']);
		 	echo "un email a envoyé.";
		}
        
		 
		?>
	</body>
</html>

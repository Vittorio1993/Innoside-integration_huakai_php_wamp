<?php
session_start()
?>

<html lang="fr">
	<head>
		<title>Innoside | Connexion</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row cols1">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h1 class="text text-center titre1" ><img width="30%" height="30%" style="margin-left:auto; margin-right:auto;" src="img/innoside_hexagon_hdpi.png" class="img-responsive" id="logo" ></h1>
					</br></br>
					<h2 class="text text-center ">Identifiez-vous</h2>
					</br>
				</div>

				<div class="col-md-8 col-md-push-4 form1">
					<form method="POST" action="scanne.html" class="form-group">
						<input type="text" name="email" class="form-control text-center" placeholder="Adresse email"></br>
						<input type="text" name="mot" class="form-control text-center" placeholder="Mot de passe"></br>
						<p style="font-size:16px" class="text text-right "><a href="forgot_password.html"><font color="black">Mot de passe oubli&eacute;</font></a></p>
						</br>
				</div>
			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center">
			
			<p><button type="submit" style="width:150px" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right" >&nbsp;<font style="font-family:sans-serif">Valider</font></button></p>
					</form>
			<button style="width:150px" class="btn btn-default btn-lg  "><a href="inscription.html">Inscription</a></button>
		</div>
			
		
	</body>
</html>

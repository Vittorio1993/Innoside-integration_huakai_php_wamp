<?php
	session_start();
	$_SESSION['NOM']=$_POST['nom'];
	$_SESSION['PRENOM']=$_POST['prenom'];
	$_SESSION['DATE']=$_POST['date'];
	$_SESSION['EMAIL']=$_POST['email'];
	$_SESSION['MOT']=$_POST['motdepasse'];
	$_SESSION['CONF']=$_POST['confirmot'];
	require("function.php");
	$session=connectBD('root','Q03OT9');
	$sqlmembre="insert into membres (NOMM, PRENOMM, EMAIL, MOTDEPASSE, DATEDENAISSANCE) values (?,?,?,?,?)";
	$ordresqlmembre=mysqli_prepare($session,$sqlmembre);
	mysqli_stmt_bind_param($ordresqlmembre,"sssss",$_SESSION['NOM'],$_SESSION['PRENOM'],$_SESSION['EMAIL'],$_SESSION['MOT'],$_SESSION['DATE']);	
	mysqli_stmt_execute($ordresqlmembre);

	/*$sql="insert into membres (NOMM, PRENOMM, EMAIL, MOTDEPASSE, DATEDENAISSANCE) values (".$_SESSION['NOM'].",".$_SESSION['PRENOM'].",".$_SESSION['EMAIL'].",".$_SESSION['MOT'].",".$_SESSION['DATE'].")";
	mysqli_query($session,$sql);*/
?>
<html lang="fr">
	<head>
		<title>Innoside | Connexion</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="row cols1">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h1 class="text text-center titre1" ><img width="30%" height="30%" style="margin-left:auto; margin-right:auto;" src="img/innoside_hexagon_hdpi.png" class="img-responsive" id="logo" ></h1>
					</br></br>
					<h2 class="text text-center ">Connexion</h2>
					</br>
				</div>

				<div class="col-md-8 col-md-push-4 form1">
					<form class="form-group">
						<input type="text" class="form-control text-center" placeholder="Adresse email"></br>
						<input type="text" class="form-control text-center" placeholder="Mot de passe"></br>
						<p style="font-size:16px" class="text text-right "><a href="forgot_password.html"><font color="black">Mot de passe oubli&eacute;</font></a></p>
						</br>
							<img id="footer">
					</form>
				</div>
			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center">
			<p><button style="width:150px" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right">&nbsp;<a href="scanne.html"><font style="font-family:sans-serif">Valider</font></a></button></p>
		</div>
			
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>

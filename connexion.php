<html lang="fr">
	<head>
		<title>Innoside | Connexion</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
<div class="container" >
			<div class="row cols1">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h1 class="text text-center titre1" ><img width="25%" height="25%" style="margin-left:auto; margin-right:auto;" src="img/innoside_hexagon_hdpi.png" class="img-responsive" id="logo" ></h1>
					</br></br>
					<h2 class="text text-center ">Identifiez-vous</h2>
					</br>
				</div>

				<div class="col-md-8 col-md-push-4 form1">
					<form method="POST" action="connexion.php" class="form-group">
						<input type="email" name="email" class="form-control text-center" placeholder="Adresse email" required></br>
						<input type="password" name="mot" class="form-control text-center" placeholder="Mot de passe"></br>
						<p style="font-size:16px" class="text text-right "><a href="forgot_password.php"><font color="black">Mot de passe oubli&eacute;</font></a></p>
						</br>
				</div>
			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center">
			
			<p><button type="submit" style="width:150px" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right" >&nbsp;<font style="font-family:sans-serif">Valider</font></button></p>
					</form>
			<button style="width:150px" class="btn btn-default btn-lg  "><a href="inscription.php">Inscription</a></button>
		</div>
	</body>
	<?php
		session_start();
		if(isset($_POST['email']) and isset($_POST['mot'])){
			require("function.php");
			$session=connectBD("root","root");	
				$_SESSION['EMAIL']=$_POST['email'];
				$password=$_POST['mot'];
				$veriflogin= controlelogin($session,$_SESSION['EMAIL']);
				$verifpassword= password($session,$_SESSION['EMAIL'],$password);
				if ($veriflogin==true){
					if ($verifpassword==true){
						$sql="select NOMM, PRENOMM, DATEDENAISSANCE,IDM
							  from membres
							  where EMAIL='".$_SESSION['EMAIL']."'";
						$resultat=mysqli_query($session,$sql);
						while($linge=mysqli_fetch_array($resultat)){
							$_SESSION['NOM']=$linge['NOMM'];
							$_SESSION['PRENOM']=$linge['PRENOMM'];
							$_SESSION['DATE']=$linge['DATEDENAISSANCE'];
							$_SESSION['IDM']=$linge['IDM'];
						}
						echo "<script language='javascript' type='text/javascript'>" ;
						echo "window.location.href='scanne.php'";
						echo "</script>";
					}
					else{
						echo '<p align=center>Mot de passe incorrect.</p>';
					}
				}
				else{
					echo '<p align=center>Email incconu</p>';
				}

			}
		?>	

	
</html>

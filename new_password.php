<?php 
	session_start();
?>
<html lang="fr">
	<head>
		<title>Innoside | Nouveau mot passe</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top:15px">
			<div class="row cols1">
				<div class="col-md-8 col-md-push-4 form1">
					<h2 style="text-align:justify">Nouveau mot de passe</h2>
					</br></br>
				</div>

				<div class="col-md-8 col-md-push-4 form1 text-center">
					<form method="POST" action="new_password.php">
						</br>
						<p style="text-align:justify; font-size:20px">Veuillez saisir le nouveau mot de passe qui sera mis &agrave; jour. </br></br>
						Vous recevrez un email de confirmation de la mise &agrave; jour avec succ&egrave;s.</br></p>
						<input type="password" name="oldpassword"class="form-control text-center input1" placeholder="Entrez votre ancien mot de passe" required="required">
						<input type="password" name="newpassword"class="form-control text-center input1" pattern="[0-9A-Za-z]{6,}"  placeholder="Entrez votre nouveau mot de passe" required="required">
						<div style="text-align:center">
						<input style="margin-bottom:40px;" type="checkbox" required="required"><font size="4"> Vous respectez les<a href=mention_legale_1.html>mentions legales</font></a>
					
						</div>

			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center;margin-bottom:15px">
			<p><button type="submit" style="width:150px" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right">&nbsp;<font style="font-family:sans-serif">Enregistrer</font></button></p>
			</form>
		</div>
		<?php
			require("function.php");
			$session=connectBD("root","root");
			
			if (isset($_POST['oldpassword'])){
				if($_SESSION['mot']==$_POST['oldpassword']){
					$sqlmembre="update membres set MOTDEPASSE=?
								where EMAIL='".$_SESSION['emailenvoie']."'";
					$ordresqlmembre=mysqli_prepare($session,$sqlmembre);
					mysqli_stmt_bind_param($ordresqlmembre,"s",$_POST['newpassword']);	
					mysqli_stmt_execute($ordresqlmembre);
					echo "<script language='javascript' type='text/javascript'>" ;
					echo "window.location.href='connexion_after_inscription.php'";
					echo "</script>";
				}
				else{
					echo "<p align=center>L'ancien mot de passe n'est pas correct</p>";
				}
			}
			
		?>
		
		
		
	</body>
</html>

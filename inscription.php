<?php
	session_start();
?>
<html lang="fr">
	<head>
		<title>Innoside | Inscription</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script>
		window.onload=function(){
        var div2=document.getElementById("div2");
        var div1=document.getElementById("div1");
        div2.onclick=function(){
          div1.className=(div1.className=="close1")?"open1":"close1";
          div2.className=(div2.className=="close2")?"open2":"close2";
        }
		}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row cols1">
				<div class="col-md-12 col-sm-12 col-lg-12 ">
					<h1 class="text text-center titre1" ><img width="25%" height="25%" style="margin-left:auto; margin-right:auto;" src="img/innoside_hexagon_hdpi.png" class="img-responsive" id="logo" ></h1>
					<h2 class="text text-center titre1">Inscrivez-vous</h2>
					</br></br>
				</div>

				<div class="col-md-8 col-md-push-4 form1">
					<form class="form-group" method="POST" action="inscription.php">
						<input type="text" name="nom" class="form-control text-center" placeholder="Nom" required></br>
						<input type="text" name="prenom" class="form-control text-center" placeholder="Pr&eacute;nom" required></br>
						<input type="text" name="date" class="form-control text-center" placeholder="Date de naissance" onfocus="(this.type='date')" required></br>
						<input type="email" name="email" class="form-control text-center" placeholder="Email" required></br>
						<input type="password" name="motdepasse" class="form-control text-center" pattern="[0-9A-Za-z]{6,}" placeholder="Mot de passe" required></br>
						<input type="password" name="confirmot" class="form-control text-center" placeholder="Confirmez mot de passe" required></br>
						

					
				</div>

			</div><!-- cols1 -->
		</div>	<!-- container -->
		<div id="footer1"style="text-align:center">
			<p><button style="width:150px" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right">&nbsp;<a href="connexion_after_inscription.html"><font style="font-family:sans-serif">Valider</font></a></button></p></div></form>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
	<?php
		require("function.php");
		$session=connectBD("root","root");
		if(isset($_POST['email'])){
			if(!controlelogin($session,$_POST['email'])){
				if($_POST['motdepasse']==$_POST['confirmot']){
					$sqlmembre="insert into membres (NOMM, PRENOMM, EMAIL, MOTDEPASSE, DATEDENAISSANCE) values (?,?,?,?,?)";
					$ordresqlmembre=mysqli_prepare($session,$sqlmembre);
					mysqli_stmt_bind_param($ordresqlmembre,"sssss",$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['motdepasse'],$_POST['date']);
					mysqli_stmt_execute($ordresqlmembre);
					echo "<script language='javascript' type='text/javascript'>" ;
					echo "window.location.href='connexion_after_inscription.php'";
					echo "</script>";	
				}
				else{
					echo "<p align=center>les 2 mots de passe ne sont pas identiques.</p>";
				}
			}
			else{
				echo "<p align=center>Email déjà exist.</p>";
			}
							
		}
	?>
</html>

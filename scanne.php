<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr" style="overflow:hidden">
	<head>

		<meta charset="UTF-8" />
		<title>Innoside</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>
		<script>
			$(document).ready(function(){

			var dd = $('.vticker').easyTicker({
				direction: 'up',
				easing: 'easeInOutBack',
				speed: 'slow',
				interval: 2000,
				height: 'auto',
				visible: 1,
				mousePause: 0,
				
			}).data('easyTicker');

			});
	</script>
	
	<style>
		.vticker{
			background-color:rgba(0, 0, 0, 0);
			
			margin-left:2%;
			
			
			
		}
		.vticker ul{
			padding: 0;
		}
		.vticker li{
		
			list-style: none;
			
			padding: 10px;
		}
		.et-run{
			background: red;
		}
	
		.leaflet-touch .leaflet-bar a{
			display:none;
		}
		.leaflet-touch .leaflet-control-attribution, .leaflet-touch .leaflet-control-layers, .leaflet-touch .leaflet-bar{
			display:none;
		}
		#map {
			width: 100%;
			height: 1000px;
		}
		.contentbottom {
		position: fixed;
		left:0;
		right:0;
		z-index: 1030;
		bottom: 0;
		margin-bottom:2%;
		border-width: 1px 0 0;
		}
		
		#div1{
        width:80px;
        height: 45px;
        border-radius: 50px;
        position: relative;
		}
		#div2{
			width: 40px;
			height: 40px;
			border-radius: 48px;
			position: absolute;
			background: white;
			box-shadow: 0px 2px 4px rgba(0,0,0,0.4);
		}
		.open1{
			background: rgba(0,184,0,0.8);
		}
		.open2{
			top: 2px;
			right: 1px;
		}
		.close1{
			background: rgba(255,255,255,0.4);
			border:3px solid rgba(0,0,0,0.15);
			border-left: transparent;
		}
		.close2{
			left: 0px;
			top: 0px;
			border:2px solid rgba(0,0,0,0.1);
		}
		</style>
		
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
	
	
	
	<body class="popup" style="margin:0">
	

		<!-- LE CONTENU DE LA POPUP -->

		<div class="modal blur-effect" id="popup-moi">
			<div class="popup-content">
				<h3>Moi</h3></br>
				<div class="col-md-6"style="margin-left:15%;margin-right:15%">
					<div  style="font-size:30px;width:50% ;float:left">Je suis visible</div>
					<div id="div1" class="open1" style="float:right">
						<div id="div2" class="open2" style="float:right"></div>
					</div>	
				</div>
				<div>
				<?php
					require("function.php");
					$session=connectBD("root","root");
					echo '<form method="POST" action="scanne.php">';
					echo '<input type="text" name="nom" class="form-control text-center" value="'.$_SESSION['NOM'].'">';
					echo '<input type="text" name="prenom" class="form-control text-center" value="'.$_SESSION['PRENOM'].'">';
					echo '<input type="text" name="date" class="form-control text-center" value="'.$_SESSION['DATE'].'" onfocus="(this.type=\'date\')" >';
					echo '<input type="text" name="email" class="form-control text-center" value="'.$_SESSION['EMAIL'].'">';
					echo '<button style="width:150px" type="submit" class="btn btn-default btn-lg glyphicon glyphicon-chevron-right">&nbsp;<font style="font-family:sans-serif">Modifier</font></a></button></form>';
		
					

				if(isset($_POST['nom']) or isset($_POST['prenom']) or isset($_POST['date']) or isset($_POST['email'])){
					if(!controlelogin($session,$_POST['email'])){
						$_SESSION['NOM']=$_POST['nom'];
						$_SESSION['PRENOM']=$_POST['prenom'];
						$_SESSION['DATE']=$_POST['date'];
						$_SESSION['EMAIL']=$_POST['email'];
						echo $_POST['date'];
						$sqlmembre="update membres set NOMM=?, PRENOMM=?, DATEDENAISSANCE=?, EMAIL=?
									where IDM='".$_SESSION['IDM']."'";
						$ordresqlmembre=mysqli_prepare($session,$sqlmembre);
						mysqli_stmt_bind_param($ordresqlmembre,"ssss",$_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['email']);	
						mysqli_stmt_execute($ordresqlmembre);
						echo "<script language='javascript' type='text/javascript'>" ;
						echo "window.location.href='scanne.php'";
						echo "</script>";
					}
					
				}
		?>
					<div class="close"></div>
				</div>
			</div>
		</div>
		
		<div class="modal blur-effect" id="popup-univers">
			<div class="popup-content">
				<h3>Univers</h3></br>
				<div>
					<p><button style="width:60%">Restaurants</button></p></br></br>
					<p><button style="width:60%">Monde ORPI</button></p>
					<div class="close"></div>
				</div>
			</div>
		</div>
		
		
		<div class="modal blur-effect" style="height:1000px" id="popup-position">
			
				<div>
					<div id='map' style="background-color:transparent"></div>
					<div class="close"></div>
				</div>
				
		</div>


		<!-- FIN DE LA POPUP -->
		
		<!-- CONTENU DE LA PAGE -->
			
		<div class="popup container">
			<div class="content" style="margin-top:2%">
				<div class="vticker" style="fioat:left; width:98%">					
					<ul>
					<li><font color="white"><!-- weather widget start --><a target="_blank" href="http://hotelmix.fr/weather/toulouse-927"><img style="height:120px; width:200px" src="https://w.bookcdn.com/weather/picture/26_927_1_3_95a5a6_250_7f8c8d_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=13115-20170529&domid=581&anc_id=76589"  alt="booked.net"/></a><!-- weather widget end --></font></li>
					</ul>
					<img class="popup-button" data-modal="popup-moi" src="img/moi_white.png" style="padding-right:2%;width:55px;height:55px;float:right">
				</div>	
				
			</div>

			<div class="contentbottom">
			
			    <img class="popup-button" data-modal="popup-position" src="img/position.png" style="margin-left:2%;width:37px;height:55px;float:left" onclick="position()">
			    <img class="popup-button" data-modal="popup-univers" src="img/menu.png" style="margin-right:2%;width:37px;height:55px;float:right" >
			</div><!-- .content -->
		



			
		</div><!-- .container -->

		<!-- FIN DU COTENU DE LA PAGE -->

		<!-- Le script qui crée la popup -->
		<script src="js/popup.js"></script>
		<script>
				function position(){
					var map = L.map('map').fitWorld();

					L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
						maxZoom: 23,
						attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
							'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
							'Imagery © <a href="http://mapbox.com">Mapbox</a>',
						id: 'mapbox.streets'
					}).addTo(map);

					function onLocationFound(e) {
						var radius = e.accuracy / 2;

						L.marker(e.latlng).addTo(map)
							.bindPopup("You are within " + radius + " meters from this point").openPopup();

						L.circle(e.latlng, radius).addTo(map);
					}

					function onLocationError(e) {
						alert(e.message);
					}

					map.on('locationfound', onLocationFound);
					map.on('locationerror', onLocationError);

					map.locate({setView: true, maxZoom: 20});
					}
					
		</script>
		
			
		
	
		
	</body>
	
</html>
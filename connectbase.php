<?php
$serveur='b4e9xxkxnpu2v96i.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$login="bild01c3czfq9my4";
$pwd="zs4etoudjbw31woc";
$nom_bd=""
				$nom_bd='$serveur';
				$con=mysqli_connect($serveur,$login,$pwd);

				if(!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				else
				{
					$db_selected=mysqli_select_db($con,$nom_bd);
					
					if ($db_selected)
					{
						return $con;
					}
					else
					{
						die ('Can\'t use : '.$nom_bd. mysql_error());
					}	
				}

?>
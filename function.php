<?php
		
			//Connexion à la BD.
			
			function connectBD($login,$pwd)
			{
				$serveur='localhost';
				$nom_bd='projet_innoside';
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
			}
?>
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
			//Vérification contrôle mail
			function controlelogin($session,$mail)
			{
		
				$sqllogin="select * from membres m where m.EMAIL='$mail'";
				$resultlogin = mysqli_query ($session, $sqllogin);
				$row=mysqli_num_rows($resultlogin);
				
					if($row!=0)
					{
						return true;
					}
					else
					{
						return false;	
					}	
			}
			//Vérification mot de passe
			function password($session,$mail,$motdepasse)
			{
				$sqlpsswrd="select * from membres m where m.EMAIL='$mail' and m.MOTDEPASSE='$motdepasse'";
				$resultpsswrd = mysqli_query ($session, $sqlpsswrd);
				$row=mysqli_num_rows($resultpsswrd);
				
				if($row!=0)
				{
					return true;
				}
				else
				{
					return false;	
				}	
			}
			//Email unique
			
			function emailunique($session,$email)
			{
				$sqlemail="select count(*) from membres
						where EMAIL=?";
				$ordreemail=mysqli_prepare($session,$sqlemail);
				mysqli_stmt_bind_param($ordreemail,"s",$email);
				mysqli_stmt_execute($ordreemail);
				mysqli_stmt_bind_result($ordreemail,$cpt);
				mysqli_stmt_fetch($ordreemail);
				
				if ($cpt==0)
				{
					return true;	
				}	
				else
				{
					return false;
				}
					
			}
?>
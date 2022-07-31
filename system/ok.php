<?php 
	require('myconsav.php');
	
	$email= $_POST['email'];
	$pass=md5(md5($_POST['mdp'])) ;
	$query = "select * from user where mdp='".$pass."' and email ='".$email."'";
	$resultat = mysqli_query($conn,$query);
	$row = mysqli_fetch_row($resultat); // madertch while 7it ghadi ikon fiha wa7d la ligne
	$pseudo = $row[4];
	$nom = $row[1];
	if($resultat != null){
		$numRows = mysqli_num_rows($resultat);
		if($numRows > 0){
			session_start();
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['nom'] = $nom;
			if($pseudo == 2){
				header("location:RepartionsavdistanceusermDA.php");
			}
			else{
				header("location:Gestionsav.php");
			}
		}
		else
		{
			header("location:index.php");	
		}
	}
	else{

		header("location:index.php");	
	}
?>
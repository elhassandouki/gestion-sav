<?php
	session_start();
	$pseudo = 0;
	if(!isset($_SESSION['pseudo'])){
		header("location:index.php");
	
	//header("location:index.php");		

	


	}
	else{
		$pseudo = $_SESSION['pseudo'];
	}



?>
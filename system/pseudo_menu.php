<?php
	switch($pseudo){
			case 1: require("menusavDA.php"); // menu admin
				break;
			case 2: require("menuUserDA.php");
				break;
			case 3: require("menuTechnicienDA.php");
				break;
			case 4: require("menuResponsableDA.php");
				break;
			case 5: require("menuAssistanceDA.php");
				break;	
			default : header("location:index.php");	
	} 
?>
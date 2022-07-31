<?php
	require('system/myconsav.php'); 
	$ns=$_POST['Resultat'];
	$sql="select count(*) from produit where numSerie = '$ns'";
	$res=mysqli_query($conn,$sql);
	echo $sql;
	
	if(mysqli_fetch_row($res) == 1)
	{
		echo "votre porduit en cours";
		}
	else
	{
		echo "auncan inforamtion sur votre produit ";
		}
	
?>
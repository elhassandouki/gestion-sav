<?php
	session_start();
	require('system/myconsav.php'); 
	$ns= $_POST['ns'];
	$sql="select resultat from repartion where NP = '$ns'";
	$res=mysqli_query($conn,$sql);
	//echo $sql;
	$_SESSION['alert'] = '10';
	while($row = mysqli_fetch_object($res))
	{
		//echo $row->resultat.'<br/>';
		$_SESSION['alert'] = $row->resultat;
	}
	//echo $_SESSION['alert'];
	header('location:index.php#about');
?>
			<?php

require('myconsav.php');


$ns = $_POST["ns"];

$fr =$_POST["fr"];

$date =$_POST["dates"];

$np =$_POST["np"];


$sql="select count(*) from stockp where NP = '".$np."'";

echo $sql;

$res = mysqli_query($conn,$sql);

$r = mysqli_fetch_row($res);



if($r[0] == 0)

{

		$sql = "INSERT INTO stockp (produitentre,dateentre,FRs,NP)"

	." VALUES ('" . $ns . "','".$date . "','" .$fr . "','".$np . "')";

	$res=mysqli_query($conn,$sql);

	echo $sql;

	if($res != null){

		header("location:stockentresav.php?msg=1");

		}

}

else

{

	header("location:stockentresav.php?msg=0");

}

$conn->close();

exit;

 



?>
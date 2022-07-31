<?php

include('myconsav.php');

$id = -1;

if(isset($_POST['id']))

{

	$id = $_POST['id'];

}

//$id=$_POST['id'];

$d1 =$_POST['dater'];

$d2 = $_POST['dates'];

$nb =$_POST['nb'];





$sql =  "UPDATE stockp SET DateRF ='".$d1."',datesortie= '".$d2."',etat='".$nb."' WHERE suivistock='".$id."'";



echo $sql;

if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

    header("location: stockentresav.php");

	

} else {

   echo "Error updating record: " . mysqli_error($conn);

}



mysqli_close($conn);

?>
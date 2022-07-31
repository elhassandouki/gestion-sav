<?php

include('myconsav.php');


$id=$_POST["id"];
$ns=$_POST["ns"];

$tec = $_POST["tecSelect"];

$res =$_POST["resSelect"];

$nb =$_POST["txtnb"];



$sql =  "UPDATE repartion_distance SET etat = '".$res."',TECH = '".$tec."',Nb ='".$nb."' WHERE numsiere = '".$ns."' and id = '".$id."' ";
 
echo $sql;

if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

     header("location: RepartionsavdistanceDA.php");

	

} else {

   echo "Error updating record: " . mysqli_error($conn);

}



mysqli_close($conn);

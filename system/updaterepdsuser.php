<?php

include('myconsav.php');


$id=$_POST["id"];
$idS=$_POST["srsr"];

$ref =$_POST["txtref"];

$date =$_POST["txtdate"];

$gara =$_POST["txtgara"];

$client =$_POST["txtnomclient"];

$tel =$_POST["txttel"];

$fax =$_POST["txtfax"];

$facture =$_POST["txtfacture"];

$adr =$_POST["txtadr"];

$select =$_POST["tecSelect"];



$sql =  "UPDATE repartion_distance SET ref = '".$ref."',dateachat = '".$date."',garantie ='".$gara."',nomcl ='".$client."',tel ='".$tel."',fax ='".$fax."',adresse2 ='".$adr."',panne ='".$select."',NFABLBV ='".$facture."' WHERE numsiere = '".$idS."' and id = '".$id."'";

echo $sql;





if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

     header("location: RepartionsavdistanceusermDA.php");

	

} else {

   echo "Error updating record: " . mysqli_error($conn);

}



mysqli_close($conn);

?>
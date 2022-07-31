<?php

include('myconsav.php');



$id =$_POST['id'];

$panne = $_POST['panne'];




$sql =  "UPDATE panne SET DescriptionPanne ='".$panne."' WHERE ID ='".$id."'";

echo $sql;
//echo phpInfo();

if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

     header("location: panneAD.php");

} else {

   echo "Error updating record: " . mysqli_error($conn);

}

mysqli_close($conn);

?>
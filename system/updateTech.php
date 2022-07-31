<?php

include('myconsav.php');



$id =$_POST['id'];

$nom = $_POST['nom'];

$tel1 =$_POST['tel1'];

$tel2 =$_POST['tel2'];

$email =$_POST['email'];



$sql =  "UPDATE technicien SET nom ='".$nom."',email= '".$email."',tel  ='".$tel1."', fax ='".$tel2."' WHERE Cin='".$id."'";

//echo $sql;
//echo phpInfo();

if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

  header("location: technicienAD.php");

} else {

   echo "Error updating record: " . mysqli_error($conn);

}

mysqli_close($conn);

?>
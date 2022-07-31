<?php
include('myconsav.php');

$id=$_POST['id'];
$civilite =$_POST['civiliteSelect'];
$nom = $_POST['txtnom'];
$adresse =$_POST['txtadresse'];
$tel =$_POST['txttel'];
$fax =$_POST['txtfax'];
$email =$_POST['txtemail'];

$sql =  "UPDATE client SET civilite ='".$civilite."',Nom= '".$nom."',adresse='".$adresse."',tel='".$tel."', fax='".$fax."',email='".$email."' WHERE cin='".$id."'";

echo $sql;
if (mysqli_query($conn, $sql)) {
   // echo "Record updated successfully";
     header("location: ClientsavDA.php");
	
} else {
   echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
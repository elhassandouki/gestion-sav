<?php

include('myconsav.php');



$id =$_POST['id'];

$tel = $_POST['tel'];

$fax =$_POST['fax'];

$email =$_POST['email'];

$res =$_POST['res'];
$adresse =$_POST['adresse'];
$site =$_POST['site'];


$sql =  "UPDATE fournisseur SET TEL ='".$tel."',FAX= '".$fax."',EMAIL  ='".$email."', responsable ='".$res.
"',Adresse ='".$adresse."', SiteWeb ='".$site."' WHERE FOUR='".$id."'";

//echo $sql;
//echo phpInfo();

if (mysqli_query($conn, $sql)) {

   // echo "Record updated successfully";

  header("location: fourAD.php");

} else {

   echo "Error updating record: " . mysqli_error($conn);

}

mysqli_close($conn);

?>
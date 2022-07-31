
<?php


$four =$_POST['txtFournisseur'];
$tel =$_POST['txttel'];
$fax = $_POST["txtfax"];
$email = $_POST["txtemail"];
$resp =$_POST["txtresponsable"];
$adresse =$_POST["txtadresse"];
$site =$_POST["txtsite"];
require('myconsav.php');




$sql = "INSERT INTO fournisseur (four,Tel,fax,email,responsable,Adresse,SiteWeb)"
." VALUES ('" . $four . "','".$tel . "','" .$fax . "','".$email . "','".$resp . "','".$adresse . "','".$site . "')";

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 header("location: fourAD.php");

?>
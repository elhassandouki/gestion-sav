<?php
include('myconsav.php');
//$id = -1;
//if(isset($_POST['id']))
//{
//	$id = $_POST['id'];
//}
$id=$_POST['id'];
$compte =$_POST['select'];
$nom = $_POST['Nom'];
$email =$_POST['email'];
$mdp =MD5(MD5($_POST['mdp']));


$sql =  "UPDATE user SET Nom= '".$nom."',pseudo='".$compte."', mdp='".$mdp."',email='".$email."' WHERE id='".$id."'";

//echo $sql;
if (mysqli_query($conn, $sql)) {
   // echo "Record updated successfully";
     header("location: utilisateursavAD.php");
	
} else {
   echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
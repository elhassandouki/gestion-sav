			<?php

$nom =$_POST['txtnom'];
$email =$_POST['txtemail'];
$mdp = MD5(MD5($_POST["txtmdp"]));
$usertype = $_POST["userSelect"];

require('myconsav.php');
$sql = "INSERT INTO user (id,Nom,email,mdp,pseudo)"
." VALUES ('".NULL."','" . $nom . "','".$email . "','" .$mdp . "','".$usertype ."')";

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  header("location: utilisateursavAD.php");

?>
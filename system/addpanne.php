<?php


$panne =$_POST['txtpanne'];

require('myconsav.php');

$sql = "INSERT INTO PANNE (DescriptionPanne)VALUES ('".$panne."')";
if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  header("location: panneAD.php");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
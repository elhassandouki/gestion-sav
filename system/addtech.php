			<?php


$id =$_POST['txttec'];
$nom =$_POST['txtnom'];
$email = $_POST["txtemail"];
$tel1 = $_POST["txttel1"];
$tel2 =$_POST["txttel2"];


require('myconsav.php');

$sql = "INSERT INTO technicien(Cin,Nom,Email,tel,fax)"
." VALUES ('". $id ."','".$nom . "','".$email."','".$tel1."','".$tel2."')";

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  header("location: technicienAD.php");

?>
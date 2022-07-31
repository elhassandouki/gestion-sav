<?php



$dateR =$_POST['daterep'];
$nbr=$_POST['txtNbonR'];
$Technicien =$_POST['TechnicienSelect'];

$produit =$_POST['produitSelect'];
$panne=$_POST['panneSelect'];

$NB =$_POST['txtremarque'];

$resultat =$_POST['resultatSelect'];

$dateE=$_POST['datersd'];

$PrixRepation =$_POST['txtprixrep'];




require('myconsav.php');



$sql = "INSERT INTO repartion(dateR,panne,Technicien,produit,NB,resultat,DateEF,PrixRepation,NP)VALUES"

 ."('".$dateR."','".$panne."','".$Technicien."','".$produit."','".$NB."','".$resultat."','".$dateE."','".$PrixRepation."','".$nbr."')";



$sql2 = "Update stockp set dateEF = '".$dateE."' Where NP = '".$nbr."'";
 
if ($conn->query($sql) === TRUE) {
	
	if($conn->query($sql2) === TRUE){

  //  echo "New record created successfully";
  header("location:RepartionsavDA.php");

  	}
 
 
   else {

    echo "Error: " . $sql . "<br>" . $conn->error;

	}
}

   else {

    echo "Error: " . $sql . "<br>" . $conn->error;

	}

$conn->close();

 header("location: RepartionsavDA.php");
?>
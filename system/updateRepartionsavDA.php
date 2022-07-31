<?php

include('myconsav.php');


$id=$_POST['id'];



$tech = $_POST['techSelect'];

$article =$_POST['articleSelect'];

$nb =$_POST['nb'];

$etat =$_POST['etatSelect'];

$prix =$_POST['prix'];

$panne=$_POST['panneSelect'];

$NP=$_POST['nmbr'];

$datee =$_POST['dateefm'];

//echo $sql;

$sql =  "UPDATE repartion SET NP ='$NP',Technicien= '$tech',produit='$article',NB='$nb',resultat='$etat',PrixRepation='$prix',DateEF='$datee',panne ='$panne' WHERE NumBR='$id'";
$sql1= "UPDATE stockp SET DateEF = '$datee' WHERE produitentre ='$article' ";





echo $sql;

if (mysqli_query($conn, $sql)) {

if (mysqli_query($conn, $sql1)) {

   header("location: RepartionsavDA.php");
}
else
{
	echo "Error updating record: " . mysqli_error($conn);
	}
	

} else {

   echo "Error updating record: " . mysqli_error($conn);

}



mysqli_close($conn);

?>
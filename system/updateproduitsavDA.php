<?php
include('myconsav.php');
$id = -1;
if(isset($_POST['id']))
{
	$id = $_POST['id'];
}
//$id=$_POST['id'];
$cl =$_POST['clientSelect'];
$numfact = $_POST['nfact'];
$dateachat =$_POST['dateachat'];
$prixachat =$_POST['prixachat'];
$four =$_POST['fourSelect'];
$ref =$_POST['ref'];
$marque =$_POST['marque'];
$gara =$_POST['gara'];
$acc =$_POST['acc'];
$panne =$_POST['panneSelect'];

$sql =  "UPDATE produit SET ClientDemande ='".$cl."',NumFacture= '".$numfact."',dateachat='".$dateachat."',prixachat='".$prixachat."', typeMarque='".$four."',Ref='".$ref."',TypeModele='".$marque."',garantie='".$gara."',accessoires='".$acc."',panne='".$panne."' WHERE numSerie='".$id."'";

echo $sql;
if (mysqli_query($conn, $sql)) {
   // echo "Record updated successfully";
     header("location: ProduitsavDA.php");
	
} else {
   echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
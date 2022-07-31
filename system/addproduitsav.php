<?php

require('myconsav.php');

$ns =$_POST['txtns'];

$client=$_POST['clSelect'];

$facture =$_POST['txtnfacture'];

$dateachat = $_POST["dateachat"];

$prixachat = $_POST["txtpreixachat"];

$four =$_POST["fournisseurSelect"];

$ref =$_POST["txtref"];

$marque =$_POST["txtmarque"];

$garan =$_POST["chekgar"];

$accessoires =$_POST["txtQteAccessoires"];

$panne =$_POST["panneSelect"];
 
 $NBR =$_POST["NP"];


$sql="select count(*) from produit where numSerie = '".$ns."'";



$res = mysqli_query($conn,$sql);

$r = mysqli_fetch_row($res);



if($r[0]==0)
{

	$sql = "INSERT INTO produit (numSerie,ClientDemande,NumFacture,dateachat,prixachat,typeMarque,Ref,TypeModele,garantie,accessoires,panne)"
." VALUES ('" . $ns . "','".$client."','".$facture . "','" .$dateachat . "','".$prixachat . "','".$four . "','".$ref . "','".$marque . "','".$garan . "','".$accessoires . "','".$panne . "')";

			$res=mysqli_query($conn,$sql);

			if($res != null){
				$sql = "INSERT INTO stockp VALUES (null,'".$ns."',NOW(),null,null,null,null,'".$four."','".$NBR."')";
				$res=mysqli_query($conn,$sql);	
			}
			

			if($res != null){
				header("location:ProduitsavDA.php?msg=1");

			}

}	

else

{

	header("location:ProduitsavDA.php?msg=0");

}



$conn->close();

exit;

 

?>
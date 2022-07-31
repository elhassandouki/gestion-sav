<!DOCTYPE html><head>





<meta charset="UTF-8">

<title>Sav Menagere </title>

<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="icon" href="../img/favicon.ico"/>

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="js/js.js" type="text/javascript"></script>

<style>





	#rcorners1 {

    border-radius: 25px;

    border: 2px solid #73AD21;

    padding: 20px; 

    width: 49%;

    height: 150px; 

}

	#rcorners2 {

    border-radius: 25px;

    border: 2px solid #73AD21;

    padding: 20px; 

    width: 49%;

    height: 150px; 

	margin-left:50%;

	margin-top:-150px;

}

 	#rcorners3 {

    border-radius: 25px;

    border: 2px solid #73AD21;

    padding: 20px; 

    width: 100%;

    height: 200px; 

	margin-top:5px;

}

</style>

</head>

<body>

<div class="container">

  <br>

  <center><img src="../img/lmdlm.png"></center>

  <br>

  <br>

 <?php

 	include('myconsav.php');

	$i = -1;

if(isset($_GET['i']))

{

	$i = $_GET['i'];

}

	$sql = "select cl.cin ,cl.civilite,cl.nom,cl.tel,cl.fax,cl.email,p.numSerie,p.Ref,p.NumFacture,p.typeMarque,p.TypeModele,p.garantie,s.NP,s.dateentre,s.DateEF,s.DateRF,s.datesortie,pa.DescriptionPanne,t.nom,re.Resultat,r.PrixRepation,r.NB,r.dateR from client cl , produit p ,stockp s,repartion r,panne pa,fournisseur f,technicien t,resultat re where cl.cin=p.ClientDemande and p.numSerie=s.produitentre and p.numSerie=r.produit and p.panne=pa.ID and f.four=p.typeMarque  and t.Cin=r.Technicien and r.resultat=re.IdResultat and  s.NP=r.NP and r.NP='".$i."'	";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

    ?>

	<div id="rcorners1">

    	<h5>La Maison De La Ménagère - Service après-vente</h5>

        <h6>Intervention N°: <?php echo "$row[12]"; ?></h6>

        <h6>Date :<?php echo "$row[16]"; ?></h6>

        <h4><center>Garantie :<?php echo "$row[11]"; ?></center></h4>

    </div>

   <div id="rcorners2">

   <h5>N° Client : <?php echo "$row[0]"; ?></h5>

    	<h5>  <?php echo "$row[1] $row[2]"; ?> </h5>

        <h6>Tel/Fax : <?php echo "$row[3] / $row[4] "; ?></h6>

        <h6>Email : <?php echo "$row[5]"; ?></h6>

    </div>

    <div id="rcorners3">

    	<h5><center>MATERIEL</center></h5>

        <h6>N/S : <?php echo "$row[6]"; ?></h6>

        <h6>Num Facture : <?php echo "$row[8]"; ?></h6>

        <h6>Réf : <?php echo "$row[7]"; ?></h6>

        <h6>Marque : <?php echo "$row[10]"; ?></h6>

        <h6>panne : <?php echo "$row[17]"; ?></h6>

       

    </div>

     <div id="rcorners3">

    	<h5><center>INTERVENTION</center></h5>

        <h6>Date: <?php echo "$row[22]"; ?></h6>

        <h6>Etat: <?php echo "$row[19]"; ?></h6>

        <h6>Prix: <?php echo "$row[20]"; ?></h6>

        <h6>N.B : <?php echo "$row[21]"; ?></h6>

    </div>

  <br>

     <div id="rcorners1">

    <h5><?php echo "$row[18]"; ?></h5>

        <br>

        <br>

        <h6>

		 

		

<?php echo "$row[16]"; ?></h6>

    	

    </div>

     <div id="rcorners2">

    	<h5> <?php echo "$row[1] $row[2]"; ?></h5>

        <br>

        <br>

        <h6><?php echo "$row[16]"; ?></h6>

 <?php

    }

} else {

    echo "0 results";

}



mysqli_close($conn);

?>

    </div>

   

  

</div>

</body>

</html>
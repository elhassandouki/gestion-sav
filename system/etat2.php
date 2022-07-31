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

	$sql = "select `rs`.`id` AS `id`,`rs`.`numsiere` AS `numsiere`,`rs`.`ref` AS `ref`,`rs`.`dateachat` AS `dateachat`,`rs`.`garantie` AS `garantie`,`rs`.`nomcl` AS `nomcl`,`rs`.`tel` AS `tel`,`rs`.`fax` AS `fax`,`rs`.`adresse1` AS `adresse1`,`rs`.`adresse2` AS `adresse2`,`rs`.`facture` AS `facture`,`rs`.`NFABLBV` AS `NFABLBV`,`p`.`DescriptionPanne` AS `DescriptionPanne`,`s`.`Resultat` AS `resultat`,`t`.`Nom` AS `Nom`,`rs`.`Nb` AS `Nb` from repartion_distance rs , panne p , technicien t , resultat s where rs.panne = p.ID and rs.TECH = t.Cin and rs.etat =s.IdResultat and rs.id ='".$i."'	";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

    ?>

	<div id="rcorners1">

    	<h5>La Maison De La Ménagère - Service après-vente</h5>

        <h6>Intervention à Domicile N°: <?php echo "$row[0]"; ?></h6>

        <h6>Date :<?php echo "$row[3]"; ?></h6>

        <h4><center>Garantie :<?php echo "$row[4]"; ?></center></h4>

    </div>

   <div id="rcorners2">

   <h5>Client : <?php echo "$row[5]"; ?></h5>

    	

        <h6>Tel/Fax : <?php echo "$row[6] / $row[7] "; ?></h6>

       <h5>Adresse  <?php echo "$row[8] $row[9]"; ?> </h5>

    </div>

    <div id="rcorners3">

    	<h5><center>MATERIEL</center></h5>

        <h6>N/S : <?php echo "$row[1]"; ?></h6>

        <h6>Num Facture/ BL : <?php echo "$row[11]"; ?></h6>

        <h6>Réf : <?php echo "$row[2]"; ?></h6>

        <h6>panne : <?php echo "$row[12]"; ?></h6>

       

    </div>

     <div id="rcorners3">

    	<h5><center>INTERVENTION</center></h5>

        <h6>Date: <?php echo date("d/m/Y") ?></h6>

        <h6>Etat: ..................................................................................................................................................</h6>

        <h6>Prix: <?php //echo "$row[1]"; ?> Garantie </h6>

        <h6>N.B : ..................................................................................................................................................</h6>

    </div>

  <br>

     <div id="rcorners1">

    <h5><?php echo "$row[14]"; ?></h5>

        <br>

        <br>

          <h6></h6>

		 </h6>

    	

    </div>

     <div id="rcorners2">

    	<h5> <?php echo "$row[5] "; ?></h5>

        <br>

        <br>

        <h6></h6>

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
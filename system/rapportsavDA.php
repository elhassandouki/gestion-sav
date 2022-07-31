<?php require("pseudo_session.php");



if(in_array($_SESSION['pseudo'], array(2)))

{

  header("location:index.php"); 

}

?>

<!DOCTYPE html>

<html lang="FR">

  <head>

    <meta charset="UTF-8">

<title>Sav Menagere </title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="css/style.css"/>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="icon" href="../img/favicon.ico"/>

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css"/>

<style>

	 .modal-dialog {

		z-index: 2000;

	 }

	

    

    </style>



</head>

<body>

<div class="container-fluid">





<div class="container">

<?php

require("pseudo_menu.php"); 

?>

</div>



 <div style="font-size:11px ; padding:40px;" class="table-responsive">

            <table class="table table-hover table-bordered" id="bootstrap-table">

        

    <thead>

      <tr> 

            <th>N°</th>  

         

            <th>N° serie</th> 
            <th>Réf</th>
            <th>N° FA</th>
            <th>FR/s</th>

      <th>Garantie</th>

     <th>Date Entrer</th>

     <th>Date Sorite</th>


      <th>RESULTAT</th>

      <th>NB</th>

      <th><span class="glyphicon glyphicon-print"></span></th>

    



          </tr>  

        </thead>  

        <tbody>  

      <?php

require("myconsav.php");



$id = -1;

if(isset($_GET['id']))

{

	$id = $_GET['id'];

}

$sql = "select cl.cin ,cl.civilite,cl.nom,cl.tel,p.numSerie,p.Ref,p.NumFacture,p.typeMarque,p.garantie,s.NP,s.dateentre,s.DateEF,s.DateRF,s.datesortie,pa.DescriptionPanne,t.nom,re.Resultat,r.PrixRepation,r.NB from client cl , produit p ,stockp s,repartion r,panne pa,fournisseur f,technicien t,resultat re where cl.cin=p.ClientDemande and p.numSerie=s.produitentre and p.numSerie=r.produit and p.panne=pa.ID and f.four=p.typeMarque and s.NP=r.NP and t.Cin=r.Technicien and r.resultat=re.IdResultat";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_array()) {

		?>

        <tr id="trcolor">

        <?php

        echo "

    <td>".$row[9]."</td>
	<td>".$row[4]."</td>

    <td>".$row[5]."</td>

    <td>".$row[6]."</td>

    <td>".$row[7]."</td>

    <td>".$row[8]."</td>

    <td>".$row[10]."</td>

    <td>".$row[13]."</td>

   


	";

    



if($row[16] == "En Cours")

{

	 echo '<td style="background-color:#F90">En Cours</td>';

}

else if($row[16] == "Non")

{

	echo '<td style="background-color:#F00">Non</td>';

}

else if($row[16] == "Envoie fournisseur")

{

	echo '<td style="background-color:#CF6">Envoie fournisseur</td>';

}

else{

      echo '<td style="background-color:#090">OK</td>';

}







   echo " <td>".$row[18]."</td>

    <td ><a href='etat1.php?i=".$row[9]."'>";

	?>

    <span class="glyphicon glyphicon-print">

    <?php 

	"</span></td>";

	

    }

	

    echo "</table>";

} else {

    echo "0 results";

}

$conn->close();

?>

        </tbody>  

      </table> 

     

 </div>

</div>   

</div>

 <?php  include('footer.php');?>

<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>

<script src="js/jquery.bdt.js" type="text/javascript"></script>

<script>

    $(document).ready( function () {

        $('#bootstrap-table').dbtable();

    });

	$(document).ready(function() {

    $(".dropdown-toggle").dropdown();

});

</script>



  

  </body>

</html>
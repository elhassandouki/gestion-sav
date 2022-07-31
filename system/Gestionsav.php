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
	<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sav Menagere </title>

<!-- Latest compiled and minified CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="icon" href="../img/favicon.ico"/>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<style>
	 .modal-dialog {
		z-index: 2000;
	 }

   body {
    /* background-image: url(img/mypattern.png) repeat;
     background-color: #F4F4F4;*/
     }
     
   #container {
    background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(0,0,0,0) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(0,0,0,1)));
    background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(0,0,0,0) 100%);
    background: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(0,0,0,0) 100%);
    background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(0,0,0,0) 100%);
    background: linear-gradient(top, rgba(255,255,255,1) 0%,rgba(0,0,0,0) 100%);
  }
  

  tbody{
      overflow-x: scroll;       
  }

    </style>

</head>
<body>
<div class="container-fluid">
<div class="row">

<div class="container">
<?php
 require("pseudo_menu.php"); 
?>
</div>
<div class="container-fluid">


   <div style="font-size:11px; padding:5px;" class="table-responsive">
            <table class="table table-hover table-bordered " id="bt">
        
    <thead>
      <tr> 
            <th>N° CL</th>  
            <th>Client</th>  
            <th>Tel</th> 
            <th>N° serie</th> 
             <th>Réf</th>
             <th>N° FA</th>
             <th>FR/s</th>
              <th>Garantie</th>
            <th>N° BR</th>
            <th>D Entrer</th>
       <th>D Envoi FR/s</th>
       <th>D Roture  FR/s</th>
       <th>D Sorite</th>
       <th>Tech</th>
      <th>Panne</th>
      
    
      
      
   
      <th>RESULTAT</th>
         <th>Prix</th>
      <th>NB</th>
      
    

          </tr>  
        </thead>  
        <tbody>  
      <?php
require("myconsav.php");


$sql = "select cl.cin ,cl.civilite,cl.nom,cl.tel,p.numSerie,p.Ref,p.NumFacture,p.typeMarque,p.garantie,s.NP,s.dateentre,s.DateEF,s.DateRF,s.datesortie,pa.DescriptionPanne,t.nom,re.Resultat,r.PrixRepation,r.NB from client cl , produit p ,stockp s,repartion r,panne pa,fournisseur f,technicien t,resultat re where cl.cin=p.ClientDemande and p.numSerie=s.produitentre and p.numSerie=r.produit and p.panne=pa.ID and f.four=p.typeMarque and s.NP=r.NP and t.Cin=r.Technicien and r.resultat=re.IdResultat ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
		?>
        <tr id="trcolor">
        <?php
        echo "
		
    <td>".$row[0]."</td>
    <td>".$row[1]." ".$row[2]."</td>
    <td>".$row[3]."</td>
	<td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[6]."</td>
    <td>".$row[7]."</td>
    <td>".$row[8]."</td>
    <td>".$row[9]."</td>
    <td>".$row[10]."</td>
    <td>".$row[11]."</td>
	<td>".$row[12]."</td>
    <td>".$row[13]."</td>
	<td>".$row[15]."</td>
	<td>".$row[14]."</td>
	";

  
if($row[16] == "En Cours")
{
	 echo '<td style="background-color:#F781F3">En Cours</td>';
}
else if($row[16] == "Non")
{
	echo '<td style="background-color:#FA58D0">Non</td>';
}
else if($row[16] == "Envoie fournisseur")
{
	echo '<td style="background-color:#FE9A2E">Envoie fournisseur</td>';
}
else{
      echo '<td style="background-color:#2E9AFE">OK</td>';
}


   echo " 

   <td>".$row[17]."</td>
   <td>".$row[18]."</td>
  
   </tr>";
 
	
    }
    echo " </tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
?>    
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
        $('#bt').dbtable();
		
    });
	$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});
</script>

  
  </body>
</html>
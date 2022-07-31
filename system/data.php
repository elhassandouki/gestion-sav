<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {
 "aProcessing": true,
 "aServerSide": true,
"ajax": "server-response.php",
} );
} );

</script>
</head>

<body class="dt-example">
<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Client</th>  
            <th>Raison Social</th>  
            <th>N° Tel</th>  
            <th>N° serie</th> 
      <th>Garantie</th>
      <th>Panne</th>
      <th>Date Entrer</th>
      <th>Date Envoi  Fournisseur</th>
      <th>Date Roture  Fournisseur</th>
      <th>Date Sorite</th>
      <th>Prix</th>
      <th>RESULTAT</th>
      <th>NB</th>

</tr>
</thead>
</table>


</body>
</html>
<?php require("pseudo_session.php");
if(in_array($_SESSION['pseudo'], array(2,3,4,5)))
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
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php require("pseudo_menu.php"); ?>

</div>

<?php
include('myconsav.php');
include ('nombre_online.php');
// on prépare une requête SQL permettant de compter le nombre de tuples (soit le nombre de clients connectés au site) contenu dans la table
$sql = 'SELECT count(*) FROM nb_online';
// on lance la requête SQL (mysql_query) et on affiche un message d'erreur si la requête ne se passait pas bien (or die)
$req = mysqli_query($conn,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
// on récupère le nombre de tuples obtenus
$data = mysqli_fetch_array($req);
// on libère l'espace mémoire alloué pour cette requête SQL
mysqli_free_result($req);
echo '<h4>Il y a actuellement ' , $data[0] , ' personne(s) surfant sur ce site.</h4>';
?>
            <br>
             <div style="font-size:11px" class="table-responsive">
            <table class="table table-hover table-bordered" id="bootstrap-table">
      <thead>
      <tr>
      <th>IP Adresse </th>
     
       </tr>
       </thead>
      <tbody>
<?php
require('myconsav.php');
$sql = "SELECT * FROM nb_online order by ip DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["ip"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
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
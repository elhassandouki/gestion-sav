<?php require("pseudo_session.php");

if(in_array($_SESSION['pseudo'], array(2,3,5)))
{
  header("location:index.php"); 
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<title>Sav Menagere </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="icon" href="../img/favicon.ico"/>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">


$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});

</script>
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

<div class="container">
<br>
<div class="col-lg-3">
<img src="img/Excel-Logo.png" />
</div>
<div class="col-lg-6">
<center>
   <a href="exprds.php" class="btn btn-info" role="button" charset="UTF-8">Les Réparation a distance</a>
   <br>
   <br>
   <a href="expg.php" class="btn btn-info" role="button">Les données</a>
   
    <br>
   <br>
   <a href="expre.php" class="btn btn-info" role="button">Les Réparation</a>
   <br>
   <br>
  <a href="expcl.php" class="btn btn-info" role="button">Les Produits</a>
 <br>
  <br>
  <a href="expclient.php" class="btn btn-info" role="button">Clients</a>
   <br>
   <br>
  <a href="expst.php" class="btn btn-info" role="button">Stock</a>
 
   </center>
  </div>
</div>
 </div>

 <?php  include('footer.php');?>
</body>
</html>
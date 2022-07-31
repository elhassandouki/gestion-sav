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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="icon" href="../img/favicon.ico"/>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
	 .modal-dialog {
		z-index: 2000;
	 }    
   
    </style>

</head>
<body>
<div class="container-fluid">
<div class="row">

<div class="container">
<?php require("pseudo_menu.php"); ?> 
</div>

<a onclick="$('#myModal1').modal('show');">
<div class="container-fluid">
<button type="button" class="btn btn-success btn-md"><img src="img/ajouter.png" height="25" width="25" /></button>
</a>
<!-- Modal1 -->
<div class="modal fade"  id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">
         
         <span style="color: #658716; font-weight: bold;"><h4 class="modal-title">Ajouter Produit N° 
                       <?php
include('myconsav.php');
$sql = "select count(*) from produit";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
      $i=$row[0]+1;
        echo " $i </h4>";                       
	 }
	}else {
    echo "0 results";
}
mysqli_close($conn);
?></span> </h4>  
      </div>     
      <div class="modal-body">
           <div style="text-align: justify;">
        <span style="font-weight: normal ; font-size: 12px ; font-family: Arial, Helvetica, sans-serif ; color: #000000; ">
          <form class="form-horizontal" role="form" id="formaddproduit" method="post" action="addproduitsav.php" >
        <div class="form-group">
      <label for="nsproduit" class="col-sm-2 control-label">Num Serie</label>
      <div class="col-sm-8">
        <input class="form-control" name="txtns" id="id" type="text" placeholder="Entrer Num Serie Article **">
      </div>
    </div>
      <div class="form-group">
      <label for="cinclient" class="col-sm-2 control-label">Client</label>
      <div class="col-sm-8">
      <select name="clSelect" class="form-control">
               <?php
include('myconsav.php');
$sql = "SELECT * FROM client";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value=".$row[0]."> $row[2] - $row[0] - $row[4]</option>";                       
	 }
	}else {
    echo "0 results";
}
mysqli_close($conn);
?>
         
          </select>
      </div>
    </div>
      <div class="form-group">
      <label for="cinclient" class="col-sm-2 control-label">N Facture</label>
      <div class="col-sm-8">
        <input class="form-control" name="txtnfacture" type="text" placeholder="Entrer Num Facture">
      </div>
    </div>
      <div class="form-group">
      <label for="cinclient" class="col-sm-2 control-label">Date Achat</label>
      <div class="col-sm-8">
        <input class="form-control" name="dateachat" type="date" >
      </div>
    </div>
      <div class="form-group">
      <label for="cinclient" class="col-sm-2 control-label">Prix Achat</label>
      <div class="col-sm-8">
        <input class="form-control" name="txtpreixachat" type="text" placeholder="Entrer Prix Achat ">
      </div>
    </div>
      
      <div class="form-group">
        <label for="civiliteSelect" class="col-sm-2 control-label">Fournisseur</label>
        <div class="col-sm-8">
          <select name="fournisseurSelect" class="form-control">
              <?php
include('myconsav.php');
$sql = "SELECT * FROM fournisseur";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option>$row[0]</option>";                       
	 }
	}else {
    echo "0 results";
}
mysqli_close($conn);
?>
          </select>
        </div>
      </div>   
     <div class="form-group">
      <label for="txtnom" class="col-sm-2 control-label">Ref</label>
      <div class="col-sm-8">
        <input class="form-control" id="txtref" name="txtref" type="text" placeholder="Entrer Ref Article ** ">
      </div>
    </div>
     <div class="form-group">
      <label for="txtprenom" class="col-sm-2 control-label">Marque</label>
      <div class="col-sm-8">
        <input class="form-control" id="txtmarque" name="txtmarque" type="text" placeholder="Entrer Mraque Article **">
      </div>
    </div>
    <div class="form-group">
  <label for="sel1" class="col-sm-2 control-label">Garantie</label>
  <div class="col-sm-8">
  <select class="form-control" id="sel1" name="chekgar">
    <option>OUI</option>
    <option>NON</option>
  </select>
  </div>
</div>
     <div class="form-group">
      <label for="txttel" class="col-sm-2 control-label">Qte Accessoires</label>
      <div class="col-sm-8">
        <input class="form-control" name="txtQteAccessoires" id="txtQteAccessoires" type="text" placeholder="Entrer Qte Accessoires **">
      </div>
    </div>
    <div class="form-group">
        <label for="civiliteSelect" class="col-sm-2 control-label">Panne</label>
        <div class="col-sm-8">
          <select name="panneSelect" class="form-control">
              <?php
include('myconsav.php');
$sql = "SELECT * FROM panne";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value=".$row[0].">$row[1]</option>";                       
	 }
	}else {
    echo "0 results";
}
mysqli_close($conn);
?>
          </select>
        </div>
      </div>
      <div class="form-group">
      <label for="txtnom" class="col-sm-2 control-label"> N° Pièce </label>
      <div class="col-sm-8">
        <input class="form-control" id="txtref" name="NP" type="text" placeholder="Entrer N° Pièce ** ">
      </div>
    </div>
       <div class="col-sm-8">
    <label id="ch" style="display:none; color:#FB070B;">veuillez remplir le champ obligatoire **</label>
    </div>
    <br>
  </form>
        </span>
            </div> 
      </div>
      <div class="modal-footer">
     
        <!--<a onclick="$('#myModal1').modal('hide');">-->
        <button type="button" class="btn btn-success" onclick="validate()" >Ajouter</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
       <!-- </a>-->
   
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->        

  <script>
        function validate() {
        if (document.getElementById("id").value == "" || document.getElementById("txtref").value == ""
		|| document.getElementById("txtmarque").value == "" ||  document.getElementById("txtQteAccessoires").value == "" ) 
		{
			document.getElementById('ch').style.display= "block";
            return false;
        }
        document.getElementById('formaddproduit').submit();
    	}
    </script>
<!---->

   <div style="font-size:11px" class="table-responsive">
            <table class="table table-hover table-bordered" id="bootstrap-table">
                <thead>
                <tr >
     <th>Num Serie </th>
     <th>Client </th>
      <th >N° Facture</th>
     <th >Date Achat </th>
        <th > Prix Achat</th>
        <th >FR/s</th>
        <th >Ref</th>
        <th>Marque</th>
        <th >Gara..</th>
        <th >Accessoires</th>
        <th >Panne</th>
        <th><center><span class="glyphicon glyphicon-pencil"></span></center></th>
                </tr>
                </thead>
                <tbody>         
     <?php
include('myconsav.php');
$msg = -1;
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
if($msg == '0'){
	echo '<center><p>Le Produit Déja Existe</p></center>';
}
else if ($msg == '1') {
	echo '<center><p>Bien Ajouter</p></center>';
}
////
$sql = "select `p`.`numSerie` AS `numSerie`,`p`.`ClientDemande` AS `ClientDemande`,`p`.`NumFacture` AS `NumFacture`,`p`.`dateachat` AS `dateachat`,`p`.`prixachat` AS `prixachat`,`p`.`typeMarque` AS `typeMarque`,`p`.`Ref` AS `Ref`,`p`.`TypeModele` AS `TypeModele`,`p`.`garantie` AS `garantie`,`p`.`accessoires` AS `accessoires`,`a`.`DescriptionPanne` AS `DescriptionPanne` from produit p join panne a where p.panne = a.ID";
//$s="select * from fournisseur ";
//$q2="select * from panne";
//$q4="select * from demande";
//$q5=mysqli_query($conn,$q4);
//$q3=mysqli_query($conn,$q2);
//$q=mysqli_query($conn,$s);
$result = mysqli_query($conn, $sql);
//////

$id = -1;
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
///////
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
		
        echo "<tr>
        <td>$row[0]</td>
        <td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td>$row[8]</td>
	 <td>$row[9]</td>
		<td>$row[10]</td>
		 <td>";
		 ?>
		 <?php 
	echo "<a onclick=$('#myModal$row[0]').modal('show'); class='btn btn-warning btn-xs'> ";
	
	?> <span class="glyphicon glyphicon-pencil"></span> </a>
	<?php	echo " </td> 
	</tr> "; ?>
      <!-- Modal2 -->
     <div class="modal fade"  <?php echo "id=myModal$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-title">
        <h5> numéro série: <?php
		echo $row[0]; 
        ?></h5>
      </div>
      </div>     
      <div class="modal-body">
          <form role="form" method="post"  action="updateproduitsavDA.php" id="formupdateproduit">
    <div class="form-group">
      <input class="form-control input-sm"  name="id" type="hidden" <?php echo "   value='".$row[0]."'"; ?> >
    <label for="inputsm">Client</label>
                 <select name="clientSelect" class="form-control inputsm" >
              <?php
$sql1 = "SELECT * FROM client";
$re = mysqli_query($conn, $sql1);

if (mysqli_num_rows($re) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_array($re)) {
		
		if($row[1] == $row1[0])
	{
		echo '  <option selected="selected" value="'.$row1[0].'">'. $row1[0]. $row1[2].'</option> ';
		}
echo "  <option  value='".$row1[0]."'> $row1[0] $row1[2] </option> ";                    
	 }
	}
?>
          </select>

  </div>
    <div class="form-group">
    <label for="inputsm">N° Facture</label>
    <input class="form-control input-sm"  name="nfact" type="text" <?php echo "   value='".$row[2]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Date Achat</label>
    <input class="form-control input-sm"  name="dateachat" type="date" <?php echo "   value='".$row[3]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Prix Achat</label>
    <input class="form-control input-sm"  name="prixachat" type="text" <?php echo "   value='".$row[4]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">FR/s </label>
                 <select name="fourSelect" class="form-control inputsm" >
              <?php
$sql2 = "SELECT * FROM fournisseur";
$reS1 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($reS1) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_array($reS1)) {
		
		if($row[5] == $row2[0])
	{
		echo '  <option selected="selected" value="'.$row2[0].'">'. $row2[0].'</option> ';
		}
echo '  <option  value="'.$row2[0].'">'. $row2[0].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
    <div class="form-group">
    <label for="inputsm">Ref </label>
    <input class="form-control input-sm"  name="ref" type="text" <?php echo "   value='".$row[6]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Marque </label>
    <input class="form-control input-sm"  name="marque" type="text" <?php echo "   value='".$row[7]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Garantie </label>
    <input class="form-control input-sm"  name="gara" type="text" <?php echo "   value='".$row[8]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Accessoires </label>
    <input class="form-control input-sm"  name="acc" type="text" <?php echo "   value='".$row[9]."'"; ?> >
  </div>
    <div class="form-group">
    <label for="inputsm">Panne</label>
     <select name="panneSelect" class="form-control inputsm" >
              <?php
$sql3 = "SELECT * FROM panne";
$reS2 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($reS2) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_array($reS2)) {
		
		if($row[10] == $row3[1])
	{
		echo '  <option selected="selected" value="'.$row3[0].'">'. $row3[1].'</option> ';
		}
echo '  <option  value="'.$row3[0].'">'. $row3[1].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
 

      

      </div>
      <div class="modal-footer">
       
        <!--<a onclick="$('#myModal1').modal('hide');">-->
       <button type="submit" class="btn btn-success" >Modifier</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
       <!-- </a>-->
    
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->      
    <?php
	  }
	}
	else {
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
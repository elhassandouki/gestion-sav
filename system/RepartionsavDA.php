<?php 
include("pseudo_session.php");
if(in_array($_SESSION['pseudo'], array(2,5)))
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

<a onclick="$('#myModal1').modal('show');">
<div class="container-fluid">

    <div class="row">
    <div class="col-md-12">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"><img src="img/ajouter.png" height="25" width="25" /></button>
</a>
  <!-- Modal -->
 <div class="modal fade"  id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Repartion N 
                       <?php
		include('myconsav.php');
$sql = "select count(*) from repartion";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
		$i=$row[0]+1;
        echo "$i </h4>";                       
	 }
	}else {
    echo "0 results";
}
mysqli_close($conn);
?>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="formaddrepartion" method="post" action="addRepartionsav.php" >
     <div class="form-group">
        <label for="civiliteSelect" class="col-sm-2 control-label">N BON Repartion</label>
        <div class="col-sm-8">
          <select id="txtNbonR" name="txtNbonR" class="form-control">
           <?php
	include('myconsav.php');
$sql = "SELECT NP FROM  stockp ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row[0]."'> $row[0] </option>";                       
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
      <label for="cinclient" class="col-sm-2 control-label">Date Repartion </label>
      <div class="col-sm-8">
        <input class="form-control" name="daterep" type="date" id="daterep" placeholder="Code Client ">
      </div>
    </div>
      <div class="form-group">
        <label for="civiliteSelect" class="col-sm-2 control-label">Technicien</label>
        <div class="col-sm-8">
          <select name="TechnicienSelect" class="form-control">
           <?php
	include('myconsav.php');
$sql = "SELECT * FROM  technicien";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row[0]."'> $row[1] </option>";                       
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
        <label for="produitSelect" class="col-sm-2 control-label">Article</label>
        <div class="col-sm-8">
          <select id="produitSelect" name="produitSelect" class="form-control">
              
          </select>
        </div>
      </div> 
      
                  <div class="form-group">
        <label for="panneSelect" class="col-sm-2 control-label">Panne</label>
        <div class="col-sm-8">
          <select name="panneSelect" class="form-control">
              <?php
	include('myconsav.php');
$sql = "SELECT * FROM panne";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row[0]."'>$row[1]</option>";                       
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
      <label for="txtremarque" class="col-sm-2 control-label">Remarque </label>
      <div class="col-sm-8">
         <textarea class="form-control" rows="2" id="txtremarque" name="txtremarque"  placeholder="Entrer Remarque .... "></textarea>
      </div>
    </div>
                <div class="form-group" >
        <label for="panneSelect" class="col-sm-2 control-label">Resultat </label>
        <div class="col-sm-8">
          <select name="resultatSelect" class="form-control" id="selectresultat"  onChange="va();">
              <?php
		include('myconsav.php');
$sql = "SELECT * FROM resultat";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0 ) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<option value=".$row[0].">$row[1]</option>";                       
	 }
	}else {
    echo "0 results";
	}
mysqli_close($conn);
?>          </select>
        </div>
      </div>
      <div class="form-group" style="display:none;" id="datefrsd">
      <label for="cinclient" class="col-sm-2 control-label" id="inputdate">Date Envoi</label>
      <div class="col-sm-8">
        <input class="form-control" name="datersd" type="date" id="datefrs" placeholder="Code Client ">
      </div>
    </div>    
      <script type="text/javascript">
	  function va()
	  {
		 // alert(document.getElementById('selectresultat').value);
	  if(document.getElementById('selectresultat').value == 4)
	  {
		  document.getElementById('datefrsd').style.display= "block";  
		}
		  }
      </script>
      <div class="form-group">
      <label for="txtprixrep" class="col-sm-2 control-label">Prix Repartion</label>
      <div class="col-sm-8">
        <input class="form-control" name="txtprixrep" type="text" placeholder="Entrer Prix de Repartion ... ">
      </div>
    </div>
       <div class="col-sm-8">
    <label id="ch" style="display:none; color:#FB070B;">veuillez remplir le champ obligatoire **</label>
    </div>
    <br>
  </form>
        </div>
         <div class="modal-footer">
        
        <button type="button" class="btn btn-success"
        onclick="valide();">Ajouter</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
		<script>
		 function valide()
	  {
		  //alert(document.getElementById("daterep").value);
		  if(document.getElementById("daterep").value == "" || document.getElementById('datefrsd').value == "")
		  {
				document.getElementById('ch').style.display= "block";
				document.getElementById('datefrsd').value = "-";		
			  return false;
			  }
			  else
			  {
				  document.getElementById('formaddrepartion').submit();
				  }  
		  }
		</script>
    
        </div>
      </div>
    </div>
  </div>
<div style="font-size:11px; padding:20px;min-height:600px;" class="table-responsive">
            <table class="table table-hover table-bordered results" id="bootstrap-table">
                <thead>
                <tr>
      <th>ID</th>
       <th>Date</th>
      <th>N° Pièce</th>
        <th>Article</th>
        <th>Technicien</th>
        <th>Not Bien</th>
        <th>Panne</th>
         <th>date envoi four</th>
      
        <th>Prix Repartion</th>
         <th>Resultat</th>
        <th><center><span class="glyphicon glyphicon-pencil"></span></center></th>
        <th><center><span class="glyphicon glyphicon-trash"></span></center></th>
                </tr>
                </thead>
                <tbody>         
     <?php
require('myconsav.php');
$sql = "SELECT r.NumBR, r.dateR, r.NP, r.produit, t.nom, pa.DescriptionPanne, r.DateEF, r.PrixRepation, re.Resultat, 

r.NB
FROM repartion r, resultat re, panne pa, technicien t where r.resultat=re.IdResultat and r.technicien=t.Cin and 

r.panne =pa.ID";
$sql1=" select * from resultat";
$sql2 ="select * from technicien";
$sql3="select * from produit";
$result = mysqli_query($conn, $sql);
$r1=mysqli_query($conn,$sql1);
$r2=mysqli_query($conn,$sql2);
$r3=mysqli_query($conn,$sql3);
//

$id = -1;
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
	
        echo "<tr>
        <td>".$row[0]."</td>
        <td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[9]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td>$row[8]</td>
		<td>
		<center>";
		 ?>
		 <?php 
	echo "<a onclick=$('#myModalu$row[0]').modal('show'); class='btn btn-warning btn-xs'>";
	
	?>
   
<span class="glyphicon glyphicon-pencil"></span>

	</a></center></td>
    <?php 
		 echo"<td><center> <a class='btn btn-danger btn-xs' href='deleterepsav.php?id=".$row[0]."' role='button'><span class='glyphicon glyphicon-trash
'></span></a>
       </center>  </td>
		</tr>"; 
		?>
	    <!-- Modal2 -->
     <div class="modal fade"  <?php echo "id=myModalu$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-title">
        <h5> ID : <?php
		echo $row[0]; 
        ?></h5>
      </div>
      </div>     
      <div class="modal-body">
          <form role="form" method="post"  action="updateRepartionsavDA.php" id="formupdaterepartion">
    <div class="form-group">
    <label for="inputsm">Date</label>
    <input class="form-control input-sm" name="id" id="id" type="hidden" <?php echo "   value='".$row[0]."'"; ?>>
    <input class="form-control input-sm" type="date" name="daterepm" <?php echo "   value='".$row[1]."'"; ?> disabled>
  </div>
    <div class="form-group">
    <label for="inputsm">Technicien</label>
                 <select name="techSelect" class="form-control inputsm" >
              <?php
$sql1 = "SELECT * FROM technicien";
$res1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($res1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_array($res1)) {
		
		if($row[4] == $row1[1])
	{
		echo '  <option selected="selected" value="'.$row1[0].'">'. $row1[1].'</option> ';
		}
echo '  <option  value="'.$row1[0].'">'. $row1[1].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
  
   <div class="form-group">
    <label for="inputsm">Panne</label>
                 <select name="panneSelect" class="form-control inputsm" >
              <?php
$sql1 = "SELECT * FROM panne";
$res1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($res1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_array($res1)) {
		
		if($row[5] == $row1[1])
	{
		echo '  <option selected="selected" value="'.$row1[0].'">'. $row1[1].'</option> ';
		}
echo '  <option  value="'.$row1[0].'">'. $row1[1].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
  
      <div class="form-group">
    <label for="inputsm">Article</label>
                 <select name="articleSelect" class="form-control inputsm" >
              <?php
$sql2 = "SELECT * FROM produit";
$res2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($res2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_array($res2)) {
		
		if($row[3] == $row2[0])
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
    <label for="inputsm">NB</label>
    <input class="form-control input-sm"  name="nb" type="text" <?php echo "   value='".$row[9]."'"; ?> >
  </div>
          <div class="form-group">
    <label for="inputsm">Etat</label>
                 <select name="etatSelect" class="form-control inputsm" >
              <?php
$sql3 = "SELECT * FROM resultat";
$res3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($res3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_array($res3)) {
		
		if($row[8] == $row3[1])
	{
		echo '  <option selected="selected" value="'.$row3[0].'">'. $row3[1].'</option> ';
		}
echo '  <option  value="'.$row3[0].'">'. $row3[1].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
    <div class="form-group">
    <label for="inputsm">Prix Repartion</label>
    <input class="form-control input-sm"  name="prix" type="text" <?php echo "   value='".$row[7]."'"; ?> >
  </div>
    
    <div class="form-group">
    <label for="inputsm">date envoi four</label>
    <input class="form-control input-sm"  name="dateefm" type="date" <?php echo "   value='".$row[6]."'"; ?> >
  </div>
  <div class="form-group">
    <label for="inputsm">N° BR</label>
    <input class="form-control input-sm"  name="nmbr" type="text" <?php echo "   value='".$row[2]."'"; ?> >
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
	
	var article = $('#produitSelect');
	$('#txtNbonR').on('change',function(){
		var _np = $(this).val();
		//alert(_np);
		ajaxFunc(_np);
		
	});
	
	var ajaxFunc = function(_np){
		
		if(_np == null){
			_np = $('#txtNbonR option:selected').val();	
		}
		
		$.ajax({
			url: 'ArticleService.php',
			method : 'post',
			dataType: 'json',
			data : { 'np' : _np},
			success: function(art){
				//alert(art.article);
				article.empty();
				article.append('<option value="' + art.article + '">' + art.article + '</option>');
			}	
		});	
	}
	
	ajaxFunc(null);
	
});
</script>

</body>
</html>

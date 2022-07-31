<?php require("pseudo_session.php");
if(in_array($_SESSION['pseudo'], array(2,5,3)))
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

<div class="container-fluid">

 <div style="font-size:11px" class="table-responsive">
            <table class="table table-hover table-bordered" id="bootstrap-table">
                <thead>
                <tr>
                  <th>N°</th>
      	<th>NS</th>
        <th>Ref</th>
        <th>Date achat</th>
        <th>Gar..</th>
        <th>CL</th>
        <th>Tel</th>
        <th>Fax</th>
        <th>Adr 1</th>
        <th>Adr 2</th>
        <th>Facture</th>
        <th>Panne</th>
        <th>Etat</th>
        <th>Tech </th>
        <th>Nb</th>
        <th><span class="glyphicon glyphicon-download" ></span></th>
         <th><span class="glyphicon glyphicon-print"></span></th>
          <th><span class="glyphicon glyphicon-edit"></span></th>
                </tr>
                </thead>
                <tbody>         
     <?php
require('myconsav.php');
$sql = "select `rs`.`id` AS `id`,`rs`.`numsiere` AS `numsiere`,`rs`.`ref` AS `ref`,`rs`.`dateachat` AS `dateachat`,`rs`.`garantie` AS `garantie`,`rs`.`nomcl` AS `nomcl`,`rs`.`tel` AS `tel`,`rs`.`fax` AS `fax`,`rs`.`adresse1` AS `adresse1`,`rs`.`adresse2` AS `adresse2`,`rs`.`facture` AS `facture`,`rs`.`NFABLBV` AS `NFABLBV`,`p`.`DescriptionPanne` AS `DescriptionPanne`,`s`.`Resultat` AS `resultat`,`t`.`Nom` AS `Nom`,`rs`.`Nb` AS `Nb` from repartion_distance rs , panne p , technicien t , resultat s where rs.panne = p.ID and rs.TECH = t.Cin and rs.etat =s.IdResultat";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>
        <td>$row[0]</td>
        <td>$row[1]</td>";
		?>
		<td id="date">
        <?php
		echo "
		
		$row[2]</td>
	
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td>$row[8]</td>
		<td>$row[9]</td>
		<td><a target='_blank' href='$row[10]'>$row[11]</a></td>
		<td>$row[12]</td>
		<td>$row[13]</td>
		<td>$row[14]</td>
			<td>$row[15]</td>
			<td><a target='_blank' href='$row[10]' download='$row[11]'><span class='glyphicon glyphicon-download'></span></a></td>";
   echo " 
    <td ><a href='etat2.php?i=".$row[0]."'>";?>
    <span class="glyphicon glyphicon-print">
    <?php 
	"</span></td>";
	
	
		
	?>
	<?php 
	echo "<td><a onclick=$('#myModal$row[0]').modal('show'); class='btn btn-warning btn-xs'>";
	
	?>
	<span class="glyphicon glyphicon-pencil"></span> </a>
	<?php	echo " </td> 
	</tr> "; ?>
      <!-- Modal2 -->
    <div class="modal fade" <?php echo "id=myModal$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <div class="modal-title">
        <h5>Répartition a Distances N: <?php
		echo $row[1]; 
        ?></h5>
      </div>
      </div>     
      <div class="modal-body">
   
          <form role="form" method="post"  action="updaterespadis.php" <?php echo 'id=formupdaterepds"'.$row[0].'"'; ?> >



<div class="form-group">
     <input class="form-control input-sm" id="id2" name="id" type="hidden" <?php echo 'value="'.$row[0].'"'; ?> >
    <input class="form-control input-sm" id="id" name="ns" type="hidden" <?php echo 'value="'.$row[1].'"'; ?> >
  </div>



   <div class="form-group">
    <label for="inputsm">Technicien</label>
              <select name="tecSelect" class="form-control inputsm">
    <?php
$sqlsql = "SELECT * FROM technicien";
$re = mysqli_query($conn, $sqlsql);

if (mysqli_num_rows($re) > 0) {
    // output data of each row
    while($ro1 = mysqli_fetch_array($re)) {
		
		if($row[14] == $ro1[1])
	{
		echo '  <option selected="selected" value="'.$ro1[0].'">'. $ro1[1].'</option> ';
		}
echo '  <option  value="'.$ro1[0].'">'. $ro1[1].'</option> ';                    
	 }
	}
?>
          </select>
  </div> 
  <div class="form-group">
    <label for="inputsm">Resultat</label>
     <select name="resSelect" class="form-control inputsm">
              <?php
$sqlsql = "SELECT * FROM resultat";
$re = mysqli_query($conn, $sqlsql);

if (mysqli_num_rows($re) > 0) {
    // output data of each row
    while($ro1 = mysqli_fetch_array($re)) {
		
		if($row[13] == $ro1[1])
	{
		echo '  <option selected="selected" value="'.$ro1[0].'">'. $ro1[1].'</option> ';
		}
echo '  <option  value="'.$ro1[0].'">'. $ro1[1].'</option> ';                    
	 }
	}
?>
          </select>

  </div>
   <div class="form-group">
    <label for="inputsm">Nb</label>
    <input class="form-control input-sm" id="inputsm" name="txtnb"  type="text"<?php echo 'value="'.$row[15].'"'; ?> >
  </div>


        </span>
        
			</div>
          <div class="modal-footer">
        
        <!--<a onclick="$('#myModal1').modal('hide');">
        echo "onclick=\"document.getElementById('formupdaterepds').submit();\""; 
        -->
        <button type="submit" class="btn btn-success" >Modifier</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
       <!-- </a>-->
   
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->     
    </div>
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
  <script type="text/javascript">
  function dateaff()
  {
	  alert(document.getElementById('date').value);
	  if(date("d-m-Y")== document.getElementById('date').value)
	  {
		  document.getElementById('date').style.backgroundColor = "#000";
		  }
	  
	  }
  </script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>
<script src="js/jquery.bdt.js" type="text/javascript"></script>
<script type="text/javascript">
 
    $(document).ready( function () {
        $('#bootstrap-table').dbtable();
    });
$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});
	//function showModel(value){
//		alert(value);
//		$('#myModal' + value).modal('show');
//	}
</script>
</body>
</html>
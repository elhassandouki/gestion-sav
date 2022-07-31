<?php require("pseudo_session.php");

if(in_array($_SESSION['pseudo'], array(1,4,5,3)))

{

  header("location:index.php"); 

}

?>

<!doctype html>

<html lang="fr">

<head> 

  <head>

    <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sav Menagere </title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="icon" href="../img/favicon.ico"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="jqueryUI/jquery-ui.css" >

<style>

 .modal-dialog {

    z-index: 1500;

 }

</style>

</head>

<body>

<div class="container" >
<div class="row">
<div class="col-md-12">
<center><img src="../img/lmdlm.png" style=" padding-top:20px; width:100%;"/></center>
</div></div></div>
<br>
<br>
<div class="container-fluid">

<div class="row">
<div class="col-lg-12">
<div class="btn-group">

  <button type="button" class="btn btn-primary" >Bienvenue<b>

  <?php

    echo ' '. $_SESSION['nom'];

  ?> </b></button>

  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">

    <span class="caret"></span>

  </button>

  <ul class="dropdown-menu" role="menu">

    

    <li><a href="deconexion.php"> <span class=" glyphicon glyphicon-off"></span> Déconnexion </a></li>

  </ul>

</div>

</div>
</div></div>

<br>

 <a onclick="$('#myModal1').modal('show');">

<div class="container-fluid">



    <div class="row">

    <div class="col-md-12">

  <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"><span class=" glyphicon glyphicon-plus"></span></button>

</a>

 <!-- Modal -->

 <div class="modal fade"  id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

  <button type="button" class="close" data-dismiss="modal">&times;</button>

   <h4 class="modal-title">Ajouter Répartition a Domicile  N 

                       <?php

include('myconsav.php');

$sql = "select count(*) from repartion_distance";

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

          <form class="form-horizontal" role="form" id="addrepds" method="post" action="addRepartionsavds.php" enctype="multipart/form-data" >

        <div class="form-group">

      <label for="NS" class="col-sm-2 control-label">Num serie </label>

      

      <div class="col-sm-8">

        <input class="form-control" name="ns" id="idns" type="text" placeholder="Num serie Article **" required autofocus>

      </div>

    </div>

     

   

     <div class="form-group">

      <label for="txtnom" class="col-sm-2 control-label">Réf</label>

      <div class="col-sm-8">

        <input class="form-control" id="txtref1" name="txtref" type="text" placeholder="Entrer Réf ** ... " />

      </div>

    </div>

     <div class="form-group">

      <label for="txtprenom" class="col-sm-2 control-label">Date d'achat</label>

      <div class="col-sm-8">

        <input class="form-control" id="txtdate1" name="txtdate" type="date" />

      </div>

    </div>

 <div class="form-group">
  <label for="sel1" class="col-sm-2 control-label">Garantie</label>
  <div class="col-sm-8">
  <select class="form-control" id="rdoui" name="chk">
    <option>OUI</option>
    <option>NON</option>
  </select>
  </div>
</div>
     <div class="form-group">

      <label for="txttel" class="col-sm-2 control-label">Client </label>

      <div class="col-sm-8">

        <input class="form-control" name="txtclient" type="text" id="txtclient1" placeholder="Entrer Nom Client  ** ...">

      </div>

    </div>

    <div class="form-group">

      <label for="txttel" class="col-sm-2 control-label">Tel</label>

      <div class="col-sm-8">

        <input class="form-control" name="txttel" id="txttel1" type="tel" placeholder="Entrer Numero Telephone Mobile  ** ... ">

      </div>

      </div>

     <div class="form-group">

      <label for="txtfax" class="col-sm-2 control-label">Fax</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtfax" id="txtfax1" type="tel" placeholder="Entrer Numero Telephone Fixe  ** ... ">

      </div>

    </div>

     <div class="form-group">

      <label for="txtadresse1" class="col-sm-2 control-label">Adresse 1</label>

      <div class="col-sm-8">

        <textarea class="form-control" rows="2"  id="txtadresse1" name="txtadresse1"  placeholder="Entrer Adresse 1 Client ** ..."></textarea>

      </div>

    </div>

     <div class="form-group">

      <label for="txtadresse2" class="col-sm-2  control-label">Adresse 2</label>

      <div class="col-sm-8">

        <textarea class="form-control" rows="2" name="txtadresse2" id="txtadresse2"   placeholder="Entrer Adresse 2 Client ..."></textarea>

      </div>

    </div>



      <div class="form-group">

      <label for="nfacture" class="col-sm-2 control-label">N° piece</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtpiece" id="txtpiece1" type="text" placeholder="Entrer N° piece ex:BL001/FA001/BV001  ** ... ">

      </div>

    </div>

    

     <div class="form-group">

        <label for="tpfacture" class="col-sm-2  control-label"><span class="glyphicon glyphicon-picture

"></span></label>

        <div class="col-sm-8">

       <!-- <div id="factureType" >

        <input type="radio" id="fa" name="typefacture" >

        <label for="fa">FA</label>

        <input type="radio" id="bl" name="typefacture">

        <label for="bl">BL</label>

        <input type="radio" id="bv" name="typefacture">

        <label for="bv">BV</label>

        </div>-->

<div >

        <a class='btn btn-primary' href='javascript:;'>

            Choose File...

            <input type="file" name="fileToUpload" id="fileToUpload" style='position:absolute;z-index:2;top:0;left:0;

            filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' onchange='$("#upload-file-info").html($(this).val());'>

        </a>

        <span class='label label-info' id="upload-file-info"></span>

</div>        </div>

    </div>

    

     <div class="form-group">

        <label for="civiliteSelect" class="col-sm-2 control-label">Panne</label>

        <div class="col-sm-8">

          <select name="panneSelect" class="form-control" id="txtpanne">

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

         <div class="col-sm-8">

    <label id="ch" style="display:none; color:#FB070B;">veuillez remplir les champs obligatoire **</label>

    </div>

    <br>

 

     

        </div>

        <div class="modal-footer">

        <button type="button" class="btn btn-success"  

        onclick="valide();" >Ajouter</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

        </div>
 </form>
      </div>

    </div>

  </div>

  <script type="text/javascript">

  function valide()

  {

 if(document.getElementById("idns").value == ""|| document.getElementById("txtref1").value == "" || document.getElementById("txtdate1").value == "" || document.getElementById("txtclient1").value == "" || document.getElementById("txttel1").value == ""     || document.getElementById("txtfax1").value == "" || document.getElementById("txtadresse1").value== "" || document.getElementById("txtpanne").value =="")

	  {

		  document.getElementById('ch').style.display= "block";

		  return false ;

		  }

	  else 

	  {

		 document.getElementById('addrepds').submit(); 

		 }

	  }

  </script>

  

       <div class="container-fluid">
       <div class="row">
       <div class="col-lg-12">  

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

        <th>Adresse </th>

        <th>Facture</th>

        <th>Panne</th>

        <th>Etat</th>

        <th>Tech </th>

        <th>Nb</th>

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

    <td>$row[8] / $row[9]</td>

    <td><a href='$row[10]'>$row[11]</a></td>

    <td>$row[12]</td>

    <td>$row[13]</td>

    <td>$row[14]</td>

      <td>$row[15]</td>";

  

    

  ?>

  <?php 

  echo "<td><a onclick=$('#myModale$row[0]').modal('show'); class='btn btn-warning btn-xs'>";

  

  ?>

  <span class="glyphicon glyphicon-pencil"></span> </a>

  <?php echo " </td> 

  </tr> "; ?>

      <!-- Modal2 -->

    <div class="modal fade" <?php echo "id=myModale$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-md">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

        <div class="modal-title">

        <h5>Répartition a Distances N: <?php

    echo"$row[0] / $row[1] "; 

        ?></h5>

      </div>

      </div>     

      <div class="modal-body">

          <form role="form" method="post"  action="updaterepdsuser.php" >



 

  <div class="form-group">

   <!-- <label for="inputsm">N° serie</label>-->

    <input class="form-control input-sm" id="inputsm" name="id" type="hidden" <?php echo 'value="'.$row[0].'"'; ?>  >
    <input class="form-control input-sm" id="inputsm" name="srsr" type="hidden" <?php echo 'value="'.$row[1].'"'; ?>  >

  </div>



  <div class="form-group">

    <label for="inputsm">Réf</label>

    <input class="form-control input-sm" id="inputsm" name="txtref" type="text"<?php echo 'value="'.$row[2].'"'; ?> >

  </div>



  <div class="form-group">

    <label for="inputsm">Date Achat</label>

    <input class="form-control input-sm" id="inputsm" name="txtdate" type="date"<?php echo 'value="'.$row[3].'"'; ?> >

  </div>



  <div class="form-group">

    <label for="inputsm">Garantie</label>

    <input class="form-control input-sm" id="inputsm" name="txtgara" type="text"<?php echo 'value="'.$row[4].'"'; ?>  >

  </div>

    <div class="form-group">

    <label for="inputsm">Nom Client</label>

    <input class="form-control input-sm" id="inputsm" name="txtnomclient" type="text"<?php echo 'value="'.$row[5].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Tel</label>

    <input class="form-control input-sm" id="inputsm" name="txttel" type="text"<?php echo 'value="'.$row[6].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Fax</label>

    <input class="form-control input-sm" id="inputsm" name="txtfax" type="text"<?php echo 'value="'.$row[7].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Adresse</label>

    <input class="form-control input-sm" id="inputsm" name="txtadr" type="text"<?php echo 'value="'.$row[8].'"'; ?> >

  </div>

   <div class="form-group">

    <label for="inputsm">N° Bon</label>

    <input class="form-control input-sm" id="inputsm" placeholder="Ex:BL0001/FA00001" name="txtfacture" type="text"<?php  echo 'value="'.$row[11].'"'; ?> >

  </div>



   <div class="form-group">

    <label for="inputsm">Panne</label>

              <select name="tecSelect" class="form-control inputsm">

              <?php

$sqlsql = "SELECT * FROM panne";

$re = mysqli_query($conn, $sqlsql);



if (mysqli_num_rows($re) > 0) {

    // output data of each row

    while($row1 = mysqli_fetch_array($re)) {

    

    if($row[11] == $row1[0])

  {

    echo '  <option selected="selected" value="'.$row1[0].'">'. $row1[1].'</option> ';

    }

echo '  <option  value="'.$row1[0].'">'. $row1[1].'</option> ';                    

   }

  }

?>

          </select>

  </div> 

  



        </span>

            </div>

     

      <div class="modal-footer">

        

        <!--<a onclick="$('#myModal1').modal('hide');">-->

        <input type="submit" class="btn btn-success" value="Modifier"/>

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

</div>   

</div>
 </div>

</div>   

</div>
 <?php  include('footer.php');?>



<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>

<script src="js/jquery.bdt.js" type="text/javascript"></script>

<script src="jqueryUI/jquery-ui.js" type="text/javascript"></script>

<script>

        $(document).ready( function () {

        $('#bootstrap-table').dbtable();

		$(".dropdown-toggle").dropdown();

		$("#factureType").buttonset();

		$("#uploadFile").css('display','none');

		$('#factureType').on('click','input[type="radio"]',function(event){

			$("#uploadFile").fadeIn(3000);

		});

    });

</script>





</body>

</html>
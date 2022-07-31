<?php require("pseudo_session.php");

if(in_array($_SESSION['pseudo'], array(2,3)))

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



<meta name="viewport" content="width=device-width, initial-scale=1">

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

<div class="container">

<?php require("pseudo_menu.php"); ?>

</div>



<!-- page container -->

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

          <h4 class="modal-title">Ajouter Client N° 

                       <?php

include('myconsav.php');

$sql = "select count(*) from client";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

        echo "$row[0] </h4>";                       

	 }

	}else {

    echo "0 results";

}

mysqli_close($conn);

?>

        </div>

        <div class="modal-body">

          <form class="form-horizontal" role="form" id="formaddclient" method="post" action="addclientsav.php" >

        <div class="form-group">

      <label for="cinclient" class="col-sm-2 control-label"> N Client</label>

      <div class="col-sm-8">

        <input class="form-control" name="id" id="id" type="text" placeholder="Code Client * " required>

      </div>

    </div>

      <div class="form-group">

        <label for="civiliteSelect" class="col-sm-2 control-label">Civilite</label>

        <div class="col-sm-8">

          <select name="civiliteSelect" class="form-control">

              <?php

include('myconsav.php');



$sql = "SELECT * FROM civilite";

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

      <label for="txtnom" class="col-sm-2 control-label">Nom</label>

      <div class="col-sm-8">

        <input class="form-control" id="txtnom" name="txtnom" type="text" placeholder="Entrer Nom * " >

      </div>

    </div>

     <div class="form-group">

      <label for="txtadresse" class="col-sm-2 control-label">Adresse</label>

      <div class="col-sm-8">

        <textarea class="form-control" rows="2" name="txtadresse"  placeholder="Entrer Adresse Client"></textarea>

      </div>

    </div>

     <div class="form-group">

      <label for="txttel" class="col-sm-2 control-label">Tel</label>

      <div class="col-sm-8">

        <input class="form-control" name="txttel" type="tel" id="tel" placeholder="Entrer Numero Telephone Mobile * ">

      </div>

    </div>

     <div class="form-group">

      <label for="txtfax" class="col-sm-2 control-label">Fax</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtfax" type="text" placeholder="Entrer Numero Telephone Fixe ">

      </div>

    </div>

    <div class="form-group">

      <label for="txtemail" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtemail" type="email" placeholder="Entrer Email ">

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

        onclick="validate()" >Ajouter</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

    

        </div>

      </div>

    </div>

  </div>

  </div>

  <script>

    function validate() {

        if (document.getElementById("id").value == "" || document.getElementById("txtnom").value == ""||

		 document.getElementById("tel").value == "" ) 

		{

			document.getElementById('ch').style.display= "block";

            return false;

        }

        document.getElementById('formaddclient').submit();

    }

</script>

 <div class="col-lg-12">

  

   <div style="font-size:11px" class="table-responsive">

            <table class="table table-hover table-bordered" id="bootstrap-table">

                <thead>

                <tr>

      <th>Cin</th>

        <th>Civilité</th>

        <th>Nom</th>

        <th>Adresse</th>

        <th>Tel</th>

        <th>Fax</th>

        <th>Email</th>
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

	echo '<center><p>Le Client  Existe</p></center>';

}

else if ($msg == '1') {

	echo '<center><p>Bien Ajouter</p></center>';

}



 $s="select * from civilite ";



$sql = "SELECT * FROM client";

$q=mysqli_query($conn,$s);

$result = mysqli_query($conn, $sql);





if (mysqli_num_rows($result) > 0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

	

	  echo '<tr>

	 	 <td>'.$row[0].'</td>

        <td>'.$row[1].'</td>

		<td>'.$row[2].'</td>

		<td>'.$row[3].'</td>

		<td>'.$row[4].'</td>

		<td>'.$row[5].'</td>

		<td>'.$row[6].'</td>

		

		 <td>';

		 ?>

		 <?php 

	echo "<center><a onclick=$('#myModal$row[0]').modal('show'); class='btn btn-warning btn-xs' >";

	

	?> <span class="glyphicon glyphicon-pencil"> </span> </a></center>

	<?php	echo " </td> 

	</tr> "; ?>

      <!-- Modal2 -->

     <div class="modal fade"  <?php echo "id=myModal$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="modal-title">

        <h5> Client N: <?php

		echo $row[0]; 

        ?></h5>

      </div>

      </div>     

      <div class="modal-body">

          <form role="form" method="post"  action="updateclientsav.php" id="formupdateclient">

   <div class="form-group">

    <label for="inputsm">Civilite</label>

              <select name="civiliteSelect" class="form-control inputsm" >

              <?php

$sqlsql = "SELECT * FROM civilite";

$re = mysqli_query($conn, $sqlsql);



if (mysqli_num_rows($re) > 0) {

    // output data of each row

    while($row1 = mysqli_fetch_array($re)) {

		

		if($row[1] == $row1[0])

	{

		echo '  <option selected="selected" value="'.$row1[0].'">'. $row1[0].'</option> ';

		}

echo '  <option  value="'.$row1[0].'">'. $row1[0].'</option> ';                    

	 }

	}

?>

          </select>

  </div> 

  <input type="hidden" name="id" <?php echo '    value="'.$row[0].'"'; ?> >

   <div class="form-group">

    <label for="inputsm">Nom</label>

    <input class="form-control input-sm" id="inputsm" name="txtnom" type="text" <?php echo '    value="'.$row[2].'"'; ?> >

  </div>

  <div class="form-group">

    <label for="inputsm">Adresse</label>

    <input class="form-control input-sm" id="inputsm"  name="txtadresse" type="text"<?php echo '  value="'.$row[3].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Tel</label>

    <input class="form-control input-sm" id="inputsm" name="txttel" type="text" <?php echo '  value="'.$row[4].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Fax</label>

    <input class="form-control input-sm" id="inputsm" name="txtfax"  type="text"<?php echo ' value="'.$row[5].'"'; ?> >

  </div>

    <div class="form-group">

    <label for="inputsm">Email</label>

    <input class="form-control input-sm" id="inputsm" name="txtemail"  type="text"<?php echo ' value="'.$row[6].'"'; ?> >

  </div>



      



      </div>

      <div class="modal-footer">

        

        <!--<a onclick="$('#myModal1').modal('hide');">-->

        <!--<a class="btn btn-success" onClick="submit()">Modifier</a>-->

        <button type="submit" class="btn btn-success" >Modifier</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

        

       <!-- </a>-->

     

      </div>

      </form>

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->     

  <script type="text/javascript" >

  function valide()

  {

	  //ift(document.getElementById()

//	  {}

//	  else

//	  {}

	  }

  </script>

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
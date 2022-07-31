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

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="icon" href="../img/favicon.ico"/>

<!-- Optional theme -->



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



 <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css"/>

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

<?php

 require("pseudo_menu.php");  

?>

</div>

<br>



<div class="container-fluid">

    <div class="row">

    <div class="col-lg-12">

<div style="font-size:11px" class="table-responsive">

            <table class="table table-hover table-bordered results" id="bootstrap-table">

                            <thead>

                <tr>

      <th>N suivi stock</th>

        <th>produit</th>

        <th>FR/s</th>

        <th>Date entre</th>

        <th>Date Envoi FR/s</th>

        <th>Date Retour  FR/s</th>

        <th>Date sortie</th>

        <th>NB</th>
        <th> N° Pièce </th>
        <th><center><span class="glyphicon glyphicon-pencil"></span></center></th>
        <th><center><span class="glyphicon glyphicon-refresh"></span></center></th>

                </tr>

                </thead>

                <tbody>         

     <?php

include('myconsav.php');



$sql = "SELECT * FROM stockp";

$result = mysqli_query($conn, $sql);




$msg = -1;

if(isset($_GET['msg'])){

	$msg = $_GET['msg'];

}

if($msg == '0'){

	echo '<center><p>Le N° Bon Réception déja utilisé </p></center>';

}

else if ($msg == '1') {

	echo '<center><p>Bien Ajouter</p></center>';

}







if (mysqli_num_rows($result) >0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {



			echo "<tr>

        <td>$row[0]</td>

		<td>$row[1]</td>

		<td>$row[7]</td>

		<td>$row[2]</td>

		<td>$row[5]</td>

		<td>$row[6]</td>

		<td>$row[3]</td>

		<td>$row[4]</td>
		
		<td>$row[8]</td>

		<td>";

		 ?>

		 <?php 

	echo "<center><a onclick=$('#myModal$row[0]').modal('show'); class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-pencil'></span></a></center></td>
	<td>
	<center><a onclick=$('#myModale$row[0]').modal('show'); class='btn btn-info btn-xs'>";

	

	?>

   

<span class="glyphicon glyphicon-refresh"></span>



	</a></center>

    <?php echo"

         </td>

		</tr>"; 

		?>
        
        <!-- debit Modal2 act -->
        
     <div class="modal fade"  <?php echo "id=myModale$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

          <form role="form" method="post"  action="addnoust.php" id="formupdatestock">    

    <div class="form-group">

    <label for="inputsm">N° Bon Reception</label>

    <input class="form-control input-sm"  name="id" type="hidden" <?php echo "   value='".$row[0]."'"; ?> >
    <input class="form-control input-sm"  name="ns" type="hidden" <?php echo "   value='".$row[1]."'"; ?> >
    <input class="form-control input-sm"  name="fr" type="hidden" <?php echo "   value='".$row[7]."'"; ?> >

    <input class="form-control input-sm"  name="np" type="text" >

  </div>

     <div class="form-group">

    <label for="inputsm">nouveau date entre</label>

    <input class="form-control input-sm"  name="dates" type="date" >

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

        <!-- fin Modal1 act -->

	    <!-- Modal2 -->

     <div class="modal fade"  <?php echo "id=myModal$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

          <form role="form" method="post"  action="updatestock.php" id="formupdatestock">    

    <div class="form-group">

    <label for="inputsm">Date Retour FR/s</label>

    <input class="form-control input-sm"  name="id" type="hidden" <?php echo "   value='".$row[0]."'"; ?> >

    <input class="form-control input-sm"  name="dater" type="date" <?php echo "   value='".$row[6]."'"; ?> >

  </div>

     <div class="form-group">

    <label for="inputsm">Date sortie</label>

    <input class="form-control input-sm"  name="dates" type="date" <?php echo "   value='".$row[3]."'"; ?> >

  </div>

 <div class="form-group">

    <label for="inputsm">N° BR</label>

    <input class="form-control input-sm"  name="nb" type="text" <?php echo "   value='".$row[8]."'"; ?> >

  </div>
     <div class="form-group">

    <label for="inputsm">NB</label>

    <input class="form-control input-sm"  name="nb" type="text" <?php echo "   value='".$row[4]."'"; ?> >

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
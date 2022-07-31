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

	<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sav Menagere </title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="icon" href="../img/favicon.ico"/>

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"/>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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

<?php

 require("pseudo_menu.php");  

?>

</div>



<a onclick="$('#myModal1').modal('show');">

<div class="container-fluid">

 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal"><img src="img/ajouter.png" height="25" width="25" /></button>

 </a>



  <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog modal-md">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ajouter Panne</h4>

        </div>

        <div class="modal-body">

  <form action="addpanne.php" method="post" target="&lt;div" class="form-horizontal" id="formaddpanne" role="formpanne">

   

    <div class="form-group">

      <label class="control-label col-sm-2" for="panne">Description Panne</label>

      <div class="col-sm-8">          

        <input type="text" class="form-control" id="panne" name="txtpanne" placeholder="Enter Panne  .. ">

      </div>

    </div>

     <div class="col-sm-8">

    <label id="ch1" style="display:none; color:#FB070B;">veuillez remplir le champ obligatoire **</label>

    </div>

    <br>

    </form>

        </div>

        <div class="modal-footer">

        <button type="button" class="btn btn-info"  

        onclick="valid();">Ajouter</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

        </div>

      </div>

    </div>

  </div>

  <script type="text/javascript">

function valid()

	  {

		  if(document.getElementById("panne").value == "")

		  {

				document.getElementById('ch1').style.display= "block";

			  return false;

			  }

			  else

			  {

				  document.getElementById('formaddpanne').submit();

				  }

			  

		  }

		  </script>

       <div style="font-size:12px;">

       



    <div style="font-size:11px" class="table-responsive">

            <table class="table table-hover table-bordered" id="bootstrap-table">

                <thead>

                <tr>

      <th>ID</th>

        <th>Panne</th>

<th><center><span class="glyphicon glyphicon-pencil"></span></center></th>
                </tr>

                </thead>

                <tbody>         

     <?php

include('myconsav.php');

$sql = "SELECT * FROM panne";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) >0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

		        echo "<tr>

        <td>$row[0]</td>

        <td>$row[1]</td>

		<td><center>";

		 ?>

		 <?php 

	echo "<a onclick=$('#myModale$row[0]').modal('show'); class='btn btn-warning btn-xs'>";

	

	?>

   

<span class="glyphicon glyphicon-pencil"></span>



	</a>

    <?php 

		 echo" 

       </center>  </td>

		</tr>"; 

		?>

	    <!-- Modal2 -->

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

          <form role="form" method="post"  action="updatepanne.php" id="formupdatepanne">

    <div class="form-group">

    <!--<label for="inputsm">ID</label>-->

    <input class="form-control input-sm" type="hidden" name="id" type="text" <?php echo "   value='".$row[0]."'"; ?> >

  </div>

      <div class="form-group">

    <label for="inputsm">Panne</label>

    <input class="form-control input-sm" type="text" name="panne" type="text" <?php echo 'value="'.$row[1].'"'; ?> >

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
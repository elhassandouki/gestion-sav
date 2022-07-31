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

<div class="row">



<div class="container">

<?php

require("pseudo_menu.php"); 

?>

</div>

<br>

<div class="container-fluid">

    <div class="row">

    <div class="col-md-12">

  <a onclick="$('#myModal1').modal('show');">

<div class="container-fluid">



   

  <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"><img src="img/ajouter.png" height="25" width="25" /></button>

</a>

  <!-- Modal -->

  <!-- Modal -->

 <div class="modal fade"  id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"></h4>        

        </div>

        <div class="modal-body">

          <form class="form-horizontal" role="form" id="formaddutilisateur" method="post" action="addutilisateurAD.php" >

        <div class="form-group">

      <label for="txtnom" class="col-sm-2 control-label">Nom</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtnom" id="nom" type="text" placeholder="Entrer Nom utilisateur" required>

      </div>

    </div>

         <div class="form-group">

      <label for="txtemail" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-8">

        <input class="form-control" name="txtemail" id="email" type="text" placeholder="Entrer Email utilisateur" required>

      </div>

    </div>

     <div class="form-group">

      <label for="mdp" class="col-sm-2 control-label">MDP </label>

      <div class="col-sm-8">

        <input class="form-control" name="txtmdp" id="mdp" type="text" placeholder="Mot De Passe " required>

      </div>

    </div>

      <div class="form-group">

        <label for="userSelect" class="col-sm-2 control-label">Type De Compte</label>

        <div class="col-sm-8">

          <select name="userSelect" class="form-control">

              <?php

	include('myconsav.php');



$sql = "SELECT * FROM typecompte where id >1";

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
        <div class="col-sm-8">

    <label id="ch" style="display:none; color:#FB070B;">veuillez remplir le champ obligatoire **</label>

    </div>

  </form>

        </div>

        <div class="modal-footer">

        <button type="button" class="btn btn-info" 

        onclick="validate()">Ajouter</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>      

        </div>

      </div>

    </div>

  </div>
  
  <script>

    function validate() {

        if (document.getElementById("nom").value == "" || document.getElementById("email").value == ""||

		 document.getElementById("mdp").value == "" ) 

		{

			document.getElementById('ch').style.display= "block";

            return false;

        }

        document.getElementById('formaddutilisateur').submit();

    }

</script>

  

  <div style="font-size:11px" class="table-responsive">

            <table class="table table-hover table-bordered results" id="bootstrap-table">

                <thead>

                <tr>

        <th>ID</th>            

        <th>Nom</th>

        <th>Email</th>

  

        <th>pseudo</th>

        <th><span class="glyphicon glyphicon-pencil"></span></th>

                </tr>

                </thead>

                <tbody>  

                <?php

include('myconsav.php');

$sql = "select u.id,u.Nom,u.email,t.typecompte from user u ,typecompte t where u.pseudo = t.id and u.id>1";

$result = mysqli_query($conn, $sql);



//

//$id = -1;

//if(isset($_GET['id']))

//{

//	$id = $_GET['id'];

//}



if (mysqli_num_rows($result) > 0) {

    // output data of each row

    while($row = mysqli_fetch_array($result)) {

		        echo "<tr>

             <td>$row[0]</td>

        <td>$row[1]</td>

		<td>$row[2]</td>



		<td>$row[3]</td>

	

		<td>";

		 ?>

		 <?php 

	echo "<a onclick=$('#myModal$row[0]').modal('show'); class='btn btn-warning btn-xs'>";

	

	?>

   

<span class="glyphicon glyphicon-pencil"></span>



	</a>

    <?php 

		 echo" 

         </td>

		</tr>"; 

		?>

	    <!-- Modal2 -->

     <div class="modal fade"  <?php echo "id=myModal$row[0]"; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="modal-title">

        <h5> user : <?php

		echo $row[1]; 

        ?></h5>

      </div>

      </div>     

      <div class="modal-body">

          <form role="form" method="post"  action="updateuserAD.php" id="formupdateuser">

    <input type="hidden" name="id" <?php echo " value='".$row[0]."'"; ?> >

    <div class="form-group">

    <label for="inputsm">Nom</label>

    <input class="form-control input-sm"  name="Nom" type="text" <?php echo "   value='".$row[1]."'"; ?> required>

  </div>

   <div class="form-group">

    <label for="inputsm">Email</label>

    <input class="form-control input-sm"  name="email" type="email" <?php echo "   value='".$row[2]."'"; ?> required>

  </div>

    <div class="form-group">

    <label for="inputsm">MDP</label>

    <input class="form-control input-sm"  name="mdp" type="text" required >

  </div>

      <div class="form-group">

    <label for="inputsm">pseudo</label>

    <select class="form-control" name="select">';

  <?php

$sqlsql = "SELECT * FROM typecompte where id>1";

$re = mysqli_query($conn, $sqlsql);



if (mysqli_num_rows($re) > 0) {

    // output data of each row

    while($row1 = mysqli_fetch_array($re)) {

		

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

      <div class="modal-footer">

        

        <!--<a onclick="$('#myModal1').modal('hide');">-->

       <!-- <?php //echo' <a class="btn btn-success" href="updateuserAD.php?id='.$row[0].'"> ';?>-->

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
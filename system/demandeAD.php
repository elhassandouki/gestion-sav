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



 <div style="font-size:11px ; padding:40px;" class="table-responsive">

            <table class="table table-hover table-bordered" id="bootstrap-table">

        

    <thead>

      <tr> 

            <th>N°</th>  

            <th> Date </th>  

            <th>Email</th>  

            <th>Ref</th> 

      <th>NS</th>

      <th>Date d'achat</th>

      <th>Client</th>

     <th>Tel</th>

      <th>Fax</th>

      <th>Adresse</th>

      <th>N_FA</th>
      <th><span class="glyphicon glyphicon-download" ></span></th>
      <th>Msg</th>


    



        </tr>  

        </thead>  

        <tbody>  

      <?php

require("myconsav.php");


$sql="select * from demande";
$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_array()) {

		?>

        <tr id="trcolor">

        <?php

        echo "


    <td>".$row[0]."</td>

    <td>".$row[1]."</td>

    <td>".$row[2]."</td>

    <td>".$row[3]."</td>

    <td>".$row[4]."</td>

    <td>".$row[5]."</td>

    <td>".$row[6]."</td>

    <td>".$row[7]."</td>

    <td>".$row[8]."</td>
	  <td>".$row[9]."</td>
	    <td><a target='_blank' href='../$row[11]'>$row[10]</a></td>
	<td><a target='_blank' href='../$row[11]' download='$row[10]'><span class='glyphicon glyphicon-download'></span></a></td>
		    <td>".$row[12]."</td>";

    }

	

    echo "</table>";

} else {

    echo "0 results";

}

$conn->close();

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
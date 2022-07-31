<?php 
include("pseudo_session.php");
if(in_array($_SESSION['pseudo'], array(2,3,4,5)))
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
<div style="font-size:11px; padding:20px;" class="table-responsive">
            <table class="table table-hover table-bordered results" id="bootstrap-table">
                <thead>
                <tr>
      <th>ID</th>
        <th>Date</th>
         <th>Email</th>
          <th>Nom</th>
           <th>Sujt</th>
            <th>Msg</th>
       
        <th><center><span class="glyphicon glyphicon-trash"></span></center></th>
                </tr>
                </thead>
                <tbody>         
     <?php
require('myconsav.php');
$sql = "select * from message";
$result = mysqli_query($conn, $sql);

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
		<td><center> <a class='btn btn-danger btn-xs' href='deleteMsg.php?id=".$row[0]."' role='button'><span class='glyphicon glyphicon-trash
'></span></a>
       </center>  </td>
		</tr>"; 
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

<?php
include('myconsav.php');
	$id = -1;
if(isset($_GET["id"])){
	
   $id = $_GET["id"];
}

// sql to delete a record
$sql = "DELETE FROM client WHERE cin='".$id."'";

if (mysqli_query($conn, $sql)) {
   //echo 'bien supprimer';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
 header("location: ClientsavDA.php");
mysqli_close($conn);
?>

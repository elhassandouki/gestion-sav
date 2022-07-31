<?php
include('myconsav.php');
	$id = -1;
if(isset($_GET["id"])){
	
   $id = $_GET["id"];
}

// sql to delete a record
$sql = "DELETE FROM user WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
    header("location: utilisateursavAD.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php

include('myconsav.php');

	$id = -1;

if(isset($_GET["id"])){

	

   $id = $_GET["id"];

}



// sql to delete a record

$sql = "DELETE FROM message WHERE IDMessage =".$id;



if (mysqli_query($conn, $sql)) {

    header("location: MsgAD.php");

} else {

    echo "Error deleting record: " . mysqli_error($conn);

}



mysqli_close($conn);

?>


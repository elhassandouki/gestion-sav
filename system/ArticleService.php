<?php
include('myconsav.php');
$np = $_POST['np'];
$sql = "SELECT produitentre FROM stockp where NP ='".$np."'";
$result = mysqli_query($conn, $sql);
$articles = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
		 $articles['article'] = $row[0];      
	 }
}else {
    echo  $articles['article'] = '';
}
mysqli_close($conn);
echo json_encode($articles);
?>
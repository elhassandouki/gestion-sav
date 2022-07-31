			<?php
require('myconsav.php');

$cinclient =$_POST['id'];
$civilite =$_POST['civiliteSelect'];
$nom = $_POST["txtnom"];
$adresse =$_POST["txtadresse"];
$tel =$_POST["txttel"];
$fax =$_POST["txtfax"];
$email =$_POST["txtemail"];


$sql="select count(*) from client where cin = '".$cinclient."'";
echo $sql;
$res = mysqli_query($conn,$sql);
$r = mysqli_fetch_row($res);

if($r[0] == 0)
{
		$sql = "INSERT INTO client (cin,civilite,nom,adresse,tel,fax,email)"
	." VALUES ('" . $cinclient . "','".$civilite . "','" .$nom . "','".$adresse . "','".$tel . "','".$fax . "','".$email . "')";
	$res=mysqli_query($conn,$sql);
	echo $sql;
	if($res != null){
		header("location:ClientsavDA.php?msg=1");
		}
}
else
{
	header("location:ClientsavDA.php?msg=0");
}
$conn->close();
exit;
 

?>
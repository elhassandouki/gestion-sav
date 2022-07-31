<?php
require('myconsav.php');

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$id =$_POST['ns'];
$ref =$_POST['txtref'];
$dateachat = $_POST["txtdate"];
$gar = $_POST["chk"];
$clinet =$_POST["txtclient"];
$tel =$_POST["txttel"];
$fax =$_POST["txtfax"];
$adresse1 =$_POST["txtadresse1"]; 
$adresse2 =$_POST["txtadresse2"];
//$fchier=$_POST["fchier"]; 
 $bl=$_POST["txtpiece"];
$panne =$_POST["panneSelect"];


/// parameter par defulat 
$u=null;
$tech='TE01';
$resultat=0;
$local=$target_dir.basename( $_FILES["fileToUpload"]["name"]);
//echo $local;

$sql="select count(*) from repartion_distance where numsiere = '".$id."'";
$res = mysqli_query($conn,$sql);
$r = mysqli_fetch_row($res);
if($r[0]==0)
{
$sql1 = "INSERT INTO repartion_distance (numsiere,ref,dateachat,garantie,nomcl,tel,fax,adresse1,adresse2,facture,panne,etat,TECH,NFABLBV) 
VALUES ('".$id."','".$ref."','".$dateachat."','".$gar."','".$clinet."','".$tel."','".$fax."','".$adresse1."','".$adresse2."','".$local."','".$panne."','".$resultat."','".$tech."','".$bl."')";
echo $sql1;
			$res1=mysqli_query($conn,$sql1);

			if($res1 != null)
			{
		header("location:RepartionsavdistanceusermDA.php?msg=1");
			}
}
else
{ 
	header("location:RepartionsavdistanceusermDA.php?msg=0");
}
$conn->close();
exit; 
?>
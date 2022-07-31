<?php

require('system/myconsav.php');

$target_dir = "system/FA/";

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

&& $imageFileType != "gif" && $imageFileType != "PNG"  ) {

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


 
 $email =$_POST["email"];
$ref =$_POST["ref"];
$ns =$_POST["NMS"];
$date =$_POST["dateachat"];
$cl =$_POST["client"];
$tel =$_POST["tel"];
$fax =$_POST["fax"];
$adr =$_POST["adresse"];
$nf =$_POST["nf"];
$img =$target_dir . basename($_FILES["fileToUpload"]["name"]);
$Msg =$_POST["Msg"];
echo $img;

  
 $sql = "INSERT INTO demande (datedemande, email, ref,ns,dateachat,client,tel,fax,adresse,NFacture,imgFacture,msg) VALUES (NOW(),'"
 .$email."','".$ref."','".$ns."','".$date."','".$cl."','".$tel."','".$fax."','".$adr."','".$nf."','".$img."','".$Msg."')";
    // use exec() because no results are returned
	

   if($conn->query($sql) === TRUE){

  //  echo "New record created successfully";

	header("location:index.php");

  	}
 
 
   else {

	header("location:index.php");
    echo "Error: " . $sql . "<br>" . $conn->error;
	

	}
?>

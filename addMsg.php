<?PHP
include("system/myconsav.php");

$name =$_POST["nom"];
$email =$_POST["email"];
$tel =$_POST["tel"];
$msg =$_POST["msg"];
  
$sql = "INSERT INTO message (Date, email, nom,sujet,message)VALUES (NOW(),'".$email."','".$name."','".$tel."','".$msg."')";
    // use exec() because no results are returned

//echo $sql;

$var = array();

if($conn->query($sql) === TRUE){
  	// echo "New record created successfully";
	// header("location:index.html");
	$var['msg'] = 1;
}
else {
    $var['msg'] = 0; 
}

echo json_encode($var);
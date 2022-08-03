<?php
$servername = "name_server";
$username = "user_db";
$password = "password_db";
$data="name_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$data);
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

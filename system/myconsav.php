<?php
$servername = "sql213.eb2a.com";
$username = "eb2a_16744879";
$password = "WTH5410IX";
$data="eb2a_16744879_sav";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$data);
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
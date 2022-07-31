<?php
	session_start();
	unset($_SESSION['pseudo']);
	header("location:index.php");
?>
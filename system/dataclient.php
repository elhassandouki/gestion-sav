<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<table border="1">
    <tr>
		<th>Num </th>
		<th>civilite</th>
        <th>Nom</th>
		<th>Adresse</th>
        <th>Tel </th>
		<th>Fax</th>
        <th>Email </th>
	</tr>
	<?php
	include('myconsav.php');
	
	//query get data
	$sql = "SELECT * FROM client";
		$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
		echo '
		<tr>
			<td>'.$data['cin'].'</td>
			<td>'.$data['civilite'].'</td>
			<td>'.$data['Nom'].'</td>
			<td>'.$data['adresse'].'</td>
			<td>'.$data['tel'].'</td>
			<td>'.$data['fax'].'</td>
			<td>'.$data['email'].'</td>
		</tr>
		';
	}
	?>

</body>
</html>
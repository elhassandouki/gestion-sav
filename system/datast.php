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
		<th>Article</th>
        <th>Date Entrer</th>
		<th>FR/s</th>
        <th>Date Envoi </th>
		<th>Date Retour</th>
        <th>Date Sortie </th>
        <th>Etat</th>
        <th>N° BonR</th>
	</tr>
	<?php
	include('myconsav.php');
	
	//query get data
	$sql = "SELECT * FROM stockp";
		$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
		echo '
		<tr>
			<td>'.$data['suivistock'].'</td>
			<td>'.$data['produitentre'].'</td>
			<td>'.$data['dateentre'].'</td>
			<td>'.$data['FRs'].'</td>
			<td>'.$data['DateEF'].'</td>
			<td>'.$data['DateRF'].'</td>
			<td>'.$data['datesortie'].'</td>
			<td>'.$data['etat'].'</td>
			<td>'.$data['NP'].'</td>
		</tr>
		';
	}
	?>

</body>
</html>
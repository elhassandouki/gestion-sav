<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Untitled Document</title>

</head>



<body>



 

<table border="1">

    <tr>

		<th>Num Série</th>

		<th>Client</th>

        <th>Num Facture</th>

		<th>Date Achat</th>

        <th>Prix Achat</th>

		<th>Type Marque</th>

        <th>Réf</th>

		<th>Type Modele</th>

        <th>Garantie</th>

		<th>Accessoires</th>

        <th>Panne</th>

	</tr>

	<?php

	include('myconsav.php');

	

	//query get data

	$sql = "select `p`.`numSerie` AS `numSerie`,`p`.`ClientDemande` AS `ClientDemande`,`p`.`NumFacture` AS `NumFacture`,`p`.`dateachat` AS `dateachat`,`p`.`prixachat` AS `prixachat`,`p`.`typeMarque` AS `typeMarque`,`p`.`Ref` AS `Ref`,`p`.`TypeModele` AS `TypeModele`,`p`.`garantie` AS `garantie`,`p`.`accessoires` AS `accessoires`,`a`.`DescriptionPanne` AS `DescriptionPanne` from produit p join panne a where p.panne = a.ID";

		$result = mysqli_query($conn, $sql);

	while($data = mysqli_fetch_assoc($result)){

		echo '

		<tr>

			<td>'.$data['numSerie'].'</td>

			<td>'.$data['ClientDemande'].'</td>

			<td>'.$data['NumFacture'].'</td>

			<td>'.$data['dateachat'].'</td>

			<td>'.$data['prixachat'].'</td>

			<td>'.$data['typeMarque'].'</td>

			<td>'.$data['Ref'].'</td>

			<td>'.$data['TypeModele'].'</td>

			<td>'.$data['garantie'].'</td>

			<td>'.$data['accessoires'].'</td>

			<td>'.$data['DescriptionPanne'].'</td>

		</tr>

		';

	}

	?>

</body>

</html>
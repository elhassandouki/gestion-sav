<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Untitled Document</title>

</head>



<body>



<table border="1">

    <tr>

		<th>N°</th>

      	<th>NS</th>

        <th>Ref</th>

        <th>Date achat</th>

        <th>Gar..</th>

        <th>CL</th>

        <th>Tel</th>

        <th>Fax</th>

        <th>Adresse 1</th>

        <th>Adresse 2</th>

        <th>N° FA/BL/BV</th>

        <th>Panne</th>

        <th>Etat</th>

        <th>Tech </th>

        <th>Nb</th>

	</tr>

	<?php

	include('myconsav.php');

	

	//query get data

	$sql = "select `rs`.`id` AS `id`,`rs`.`numsiere` AS `numsiere`,`rs`.`ref` AS `ref`,`rs`.`dateachat` AS `dateachat`,`rs`.`garantie` AS `garantie`,`rs`.`nomcl` AS `nomcl`,`rs`.`tel` AS `tel`,`rs`.`fax` AS `fax`,`rs`.`adresse1` AS `adresse1`,`rs`.`adresse2` AS `adresse2`,`rs`.`facture` AS `facture`,`rs`.`NFABLBV` AS `NFABLBV`,`p`.`DescriptionPanne` AS `DescriptionPanne`,`s`.`Resultat` AS `resultat`,`t`.`Nom` AS `Nom`,`rs`.`Nb` AS `Nb` from repartion_distance rs , panne p , technicien t , resultat s where rs.panne = p.ID and rs.TECH = t.Cin and rs.etat =s.IdResultat";

		$result = mysqli_query($conn, $sql);

	while($data = mysqli_fetch_assoc($result)){

		echo '

		<tr>

		<td>'.$data['id'].'</td>

			<td>'.$data['numsiere'].'</td>

			<td>'.$data['ref'].'</td>

			<td>'.$data['dateachat'].'</td>

			<td>'.$data['garantie'].'</td>

			<td>'.$data['nomcl'].'</td>

			<td>'.$data['tel'].'</td>

			<td>'.$data['fax'].'</td>

			<td>'.$data['adresse1'].'</td>

			<td>'.$data['adresse2'].'</td>

			<td>'.$data['NFABLBV'].'</td>

			<td>'.$data['DescriptionPanne'].'</td>

			<td>'.$data['resultat'].'</td>

			<td>'.$data['Nom'].'</td>

			<td>'.$data['Nb'].'</td>

		</tr>

		';

	}

	?>



</body>

</html>
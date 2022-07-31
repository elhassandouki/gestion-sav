<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>MDM-Les Réparation</title>

</head>



<body>



<table border="1">

    <tr>

		<th>Num </th>

		

        <th>Date reparation </th>
        <th>N° Pièce</th>
         <th>Article</th>


        <th>Tech</th>

       
		<th>NB</th>
         <th>Panne</th>

 <th>Date Envoi FR/s </th>



		<th>prix reparation </th>

        <th>Resultat</th>       
	</tr>

	<?php

	include('myconsav.php');

	

	//query get data

	$sql = "SELECT r.NumBR, r.dateR, r.NP, r.produit, t.nom as 'nomtech', 

pa.DescriptionPanne, r.DateEF, r.PrixRepation, 

re.Resultat, r.NB
FROM repartion r, resultat re, panne pa, technicien t 

where r.resultat=re.IdResultat and r.technicien=t.Cin and 

r.panne =pa.ID";

		$result = mysqli_query($conn, $sql);

	while($data = mysqli_fetch_assoc($result)){

		echo '

		<tr>

			<td>'.$data['NumBR'].'</td>

			<td>'.$data['dateR'].'</td>
			<td>'.$data['NP'].'</td>
<td>'.$data['produit'].'</td>
			<td>'.$data['nomtech'].'</td>

			<td>'.$data['NB'].'</td>

			<td>'.$data['DescriptionPanne'].'</td>
<td>'.$data['DateEF'].'</td>
			<td>'.$data['Resultat'].'</td>

			<td>'.$data['PrixRepation'].'</td>

			

		</tr>

		';

	}

	?>

    

</body>

</html>
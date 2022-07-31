<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Untitled Document</title>

</head>



<body>



 

<table border="1">

    <tr>

		<th>N° CL</th>
<th>Civilite</th>
        <th>Client</th>


        <th>Tel</th>
        <th>NumSerie</th>
           <th>Réf</th>
           <th>N° FA</th>
               <th>Fournisseur</th>
                  <th>Garantie </th>
        <th> N° BR </th>

          <th>Date Entrée</th>

        <th>Date Envoi Four</th>

        <th>Date Retour Four</th>

        <th>Date Sortie</th>

     

    

     

        <th>Panne</th>

       <th>Tech</th>

    

        <th>Resultat</th>

        <th>Prix </th>
            <th>Nb</th>

  

	</tr>

	<?php

	include('myconsav.php');

	

	//query get data

	$sql = "select cl.cin 

,cl.civilite,cl.nom AS  'nomclient' ,cl.tel,p.numSerie,p.Ref,p.NumFacture,p

.typeMarque,p.garantie,s.NP,s.dateentre,s.DateEF,s.DateRF,s.datesortie,pa.DescriptionPanne,t.nom,re.Resultat,

r.PrixRepation,r.NB from client cl , produit p ,stockp 

s,repartion r,panne pa,fournisseur f,technicien t,resultat 

re where cl.cin=p.ClientDemande and 

p.numSerie=s.produitentre and p.numSerie=r.produit 

and p.panne=pa.ID and f.four=p.typeMarque and 

s.NP=r.NP and t.Cin=r.Technicien and 

r.resultat=re.IdResultat";

		$result = mysqli_query($conn, $sql);

	while($data = mysqli_fetch_assoc($result)){

		echo '

		<tr>

			

			<td>'.$data['cin'].'</td>
			<td>'.$data['civilite'].'</td>

			<td>'.$data['nomclient'].'</td>

			<td>'.$data['tel'].'</td>
			<td>'.$data['numSerie'].'</td>
						<td>'.$data['Ref'].'</td>

				<td>'.$data['NumFacture'].'</td>
			<td>'.$data['typeMarque'].'</td>
			<td>'.$data['garantie'].'</td>
			
			<td>'.$data['NP'].'</td>
<td>'.$data['dateentre'].'</td>
<td>'.$data['DateEF'].'</td>
<td>'.$data['DateRF'].'</td>

			<td>'.$data['datesortie'].'</td>

			<td>'.$data['DescriptionPanne'].'</td>

			<td>'.$data['nom'].'</td>

		

			<td>'.$data['Resultat'].'</td>

			<td>'.$data['PrixRepation'].'</td>
	<td>'.$data['NB'].'</td>
			

		

			

		</tr>

		';

	}

	?>

</body>

</html>
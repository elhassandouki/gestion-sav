<nav class="navbar navbar-default">

  <div class="container-fluid">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>                        

      </button>

         <a class="navbar-brand" href="Gestionsav.php"><center>

      	<img alt="Site" src="img/favicon.png" style="margin-top:-13px;"/>

        </center>

      </a>

    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">

         <li><a href="ClientsavDA.php" ><center><img src="img/client.png" width="30" height="30" style="margin-top:-15px;"/><h6>Clients</h6></center></a></li><li><a href="ProduitsavDA.php" ><center><img src="img/produit.png" width="30" height="30" style="margin-top:-15px;"/><h6>Produits</h6>

</center></a></li>

   <li><a href="RepartionsavDA.php" ><center><img src="img/compte.png" width="30" height="30" style="margin-top:-15px;" /><h6>Repartion</h6></center></a></li>

   <li><a href="stockentresav.php" ><center><img src="img/commande.png" width="30" height="30" style="margin-top:-15px;"/><h6>Stock</h6></center></a></li>

<li><a href="RepartionsavdistanceDA.php" ><center><img src="img/running16.png" width="30" height="30" style="margin-top:-15px;"/><h6>Domicile</h6></center></a></li>

<li><a href="exportesavDA.php" ><center><img src="img/Mimetypes-application-vnd-ms-excel-icon.png" width="30" height="30" style="margin-top:-15px;"/><h6>Exporte</h6></center></a></li>

<li><a href="rapportsavDA.php" ><center><img src="img/Rapport.png" width="30" height="30" style="margin-top:-15px;"/><h6>Rapport</h6></center></a></li>
<li><a href="demandeAD.php" ><center><img src="img/Demande.gif" width="30" height="30"style="margin-top:-15px;"/><h6>Demande<h6></center></a></li>

<li class="dropdown">

        <a class="dropdown-toggle" data-toggle="dropdown">

        <center>

        <img src="img/config2.png" width="30" height="30"style="margin-top:-15px;"/>

        <h6>Config<span class="caret"></span></h6>

        </center>

        </a>

        <ul class="dropdown-menu">

          <li><a href="panneAD.php">Panne</a></li>

          <li><a href="fourAD.php">Fournisseur</a></li>

       

        </ul>

      </li>

</ul>

      <ul class="nav navbar-nav navbar-right" style="margin-top:10px;">

<div class="btn-group">

  <button type="button" class="btn btn-primary" >Bienvenue<b><?php

  	echo ' '. $_SESSION['nom'];

  ?></b></button>

  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">

    <span class="caret"></span>

  </button>

  <ul class="dropdown-menu" role="menu">

 <li><a href="deconexion.php"> <span class=" glyphicon glyphicon-off"></span> Déconnexion </a></li>

  </ul>

</div>

      </ul>

    </div>

  </div>

</nav>

  


<?php

require_once __DIR__ .'/Include/init.php';

require __DIR__ .'/layout/top.php';

$db_server = 'localhost';
$db_name = 'menuiz';
$db_user_login = 'root';
$db_user_pass = '';

// Ouvre une connexion au serveur MySQL
$connect = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);


//  // Récupère la recherche pour le nom du user
//  $recherche_nom = isset($_POST['recherche-nom']) ? $_POST['recherche-nom'] : '';

//  // la requete mysql
//  $q = $connect->query(
//  "SELECT USR_LASTNAME, USR_FIRSTNAME FROM t_d_user_usr
//   WHERE USR_LASTNAME LIKE '%$recherche_nom%'
//   OR USR_FIRSTNAME LIKE '%$recherche_nom%'
//   LIMIT 10");

//  // affichage du résultat
//  while( $r = mysqli_fetch_array($q)){
//  echo 'Résultat de la recherche Nom Prénom: '.$r['USR_LASTNAME'].', '.$r['USR_FIRSTNAME'].' <br />';
//  }

//   //critère
//   extract($_POST);

//   $i = 0;
        
//   if(!empty($recherche_nom)) { $choix[$i++] = "recherche-nom = '$recherche_nom'"; }
//   if(!empty($recherche_ville)) { $choix[$i++] = "recherche-ville = '$recherche_ville'"; }

//   $critere = $choix[0]." ";

//   for($j=1;$j<$i;$j++) {
//     $critere .= " AND ".$choix[$j]." ";
//   }

//   if($i > 0) {
//     $sql = "SELECT * FROM menuiz WHERE $critere";
//     $requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
//   }else {
//       $sql = "SELECT * FROM menuiz ";
//     }

//     while( $result = mysql_fetch_array( $requete ) )
//     {	
//     echo( "<tr>\n" );
//     echo( "<td><div align=\"center\">".$result[""]."</div></td>\n" );
//     echo( "<td><div align=\"center\">".$result[""]."</div></td>\n" );
// }

//  // Récupère la recherche pour la ville
//  $recherche_ville = isset($_POST['recherche-ville']) ? $_POST['recherche-ville'] : '';

//  // la requete mysql
//  $q = $conn->query(
//  "SELECT ADR_CITY FROM t_d_address_adr
//   WHERE ADR_CITY LIKE '%$recherche_nom%'
//   LIMIT 10");
?>

<h1>Recherche de la commande client</h1>
<form method="post" class="search_form">
   
    <!-- <div class="form-group">
        <label>Numéro de commande</label>
        <input type="text" name="" class="form-control" value="">
    </div> -->

    <div class="form-group">
        <label>Nom Client</label>
        <input type="text" name="recherche-nom" class="form-control">
    </div>
    <div class="form-group">
        <label>ville</label>
        <input type="text" name="recherche-ville" class="form-control">
    </div>

    <!-- <div class="form-group">
        <label>Numéro de dossier</label>
        <input type="text" name="" class="form-control" value="">
    </div>

    <div class="form-group">
        <label>code postale</label>
        <input type="text" name="" class="form-control" value="">
    </div>
   
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary" value="search">Chercher</button>
    </div>
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">RAZ</button>
    </div>
</form>

<?php
require __DIR__ .'/layout/bottom.php';
?>
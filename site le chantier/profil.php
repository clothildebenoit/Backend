<?php
require_once("./inc/init.inc.php");
require_once(".\inc\haut.inc.php");

if(!internauteEstConnecte()) header("location:connexion.php");
// debug($_SESSION);

$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';


echo $contenu;

require_once("./inc/bas.inc.php");
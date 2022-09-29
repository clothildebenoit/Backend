<?php

//fichier initialisation et inclusion

//connection BDD
$mysqli = new mysqli("localhost", "root", "", "lechantier");
if ($mysqli->connect_error) die('Connexion à 
la BDD échouée: ' . $mysqli->connect_error);

//SESSION
session_start();
 
// gestion en CHEMIN absolu
define("RACINE_SITE","site le chantier");
 
//VARIABLES
$contenu = '';
 
//AUTRES INCLUSIONS
require_once("fonction.inc.php");
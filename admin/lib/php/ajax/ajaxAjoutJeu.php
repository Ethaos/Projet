<?php
header('Content-Type: application/json');

/*
 * Inclure les fichiers nécessaires à la communication avec la BD car on ne passe par l'index
 * Ce fichier est appelé par fonctions*jquery.js
 */
// A partir de admin/lib/php/ajax revenir dans dossier précédent
include('../pg_connect.php');
include('../Classes/Connexion.class.php');
include('../classes/Jeux.class.php');
include('../classes/JeuxBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);

$j = array();
$jeu = new JeuxBD($cnx);
//id_produit est un parametre de l'url
//ds js : var parametre = "id_produit="+id;
extract($_GET, EXTR_OVERWRITE);
$j[] = $jeu->getJeuByName($nomjeu);
//conversion du tableau PHP au format javascript
print json_encode($j);
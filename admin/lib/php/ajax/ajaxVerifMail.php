<?php
header('Content-Type: application/json');

/*
 * Inclure les fichiers nécessaires à la communication avec la BD car on ne passe par l'index
 * Ce fichier est appelé par fonctions*jquery.js
 */
// A partir de admin/lib/php/ajax revenir dans dossier précédent
include('../pg_connect.php');
include('../Classes/Connexion.class.php');
include('../classes/User.class.php');
include('../classes/UserBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);

$u = array();
$user = new UserBD($cnx);
extract($_GET, EXTR_OVERWRITE);
$u[] = $user->getClientByMail($mail);

print json_encode($u);

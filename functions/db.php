<?php
session_start();

$dbhost = 'localhost';
$dbname = 'module2';
$dbuser = 'root';
$dbpassword = '';

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOexception $e) {
    die("Une erreur est survenue lors de la connexion à la base des données");
}


// Programme d'explication de l'appli.
# 1-Analyse et conception BDD
# 2-Module à integrer
# 3-Elements basiques (register, login, update password, update profile)
# 4-Privilège des sites et attribution des tâches
# 5-Gestion élève
# 6-Gestion personnel
# 7-Autres gestion
# 8-Explication TP (gestion bulletin, paiement frais eleve, paiement personnel, mot de passe oublié, ajout de possibilité de bloqué le compte d'un parent)
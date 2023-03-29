<?php

if (isset($_POST['submit'])) {

    $personel = htmlspecialchars(trim(intval($_POST['id_util'])));
    $classe = htmlspecialchars(trim($_POST['id_classe']));
    $matiere = htmlspecialchars(trim(intval($_POST['id_matiere'])));
    $option = htmlspecialchars(trim($_POST['id_option']));
    $debutH = htmlspecialchars(trim($_POST['heure_debut_charge_horaire']));
    $finH = htmlspecialchars(trim($_POST['heure_fin_charge_horaire']));
    $jour = htmlspecialchars(trim($_POST['id_jour']));
    $vacation = htmlspecialchars(trim($_POST['id_vacation']));


    creatHoraire($personel, $classe, $matiere, $option, $debutH, $finH, $jour, $vacation);
    $error = "<font color='green'>Charge horaire effectuée avec succès !</font>";
}



// Recuperation des classes pour le select du formulaire ajouter un eleve
function get_classes()
{
    global $db;

    $req = $db->query("SELECT * FROM classes  ORDER BY id_classe DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}
$classes = get_classes();

// Recuperation des classes pour le select du formulaire ajouter un eleve
function get_options()
{
    global $db;

    $req = $db->query("SELECT * FROM options  ORDER BY id_option DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}
$options = get_options();


function get_personels()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM utils 
    JOIN grades 
    ON utils.id_grade = grades.id_grade   
    WHERE utils.id_grade != 6
    ORDER BY date_inscription_util DESC
    ");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$personels = get_personels();



// Recuperation du matiere pour le select du formulaire ajouter un eleve
function get_matieres()
{
    global $db;

    $req = $db->query("SELECT * FROM matieres  ");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$matieres = get_matieres();


// Recuperation des jours pour le select du formulaire update
function get_jours()
{
    global $db;

    $req = $db->query("SELECT * FROM jours  ORDER BY id_jour DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}
$jours = get_jours();


// Recuperation du vacation pour le select du formulaire ajouter un eleve
function get_vacations()
{
    global $db;

    $req = $db->query("SELECT * FROM vacations  ORDER BY id_vacation DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$vacations = get_vacations();

// Recuperation du heure pour le select du formulaire ajouter un eleve
function get_heures()
{
    global $db;

    $req = $db->query("SELECT * FROM heures  ORDER BY id_heure DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$heures = get_heures();



// Cette fonction permet l'insertion d'un Eleve dans la BDD
function creatHoraire($personel, $classe, $matiere, $option, $debutH, $finH, $jour, $vacation)
{

    global $db;
    $sql = "INSERT INTO charges_horaires(id_util, id_classe, id_matiere, id_option, heure_debut_charge_horaire, heure_fin_charge_horaire, id_jour, id_vacation) VALUES(:id_util, :id_classe, :id_matiere, :id_option, :heure_debut_charge_horaire, :heure_fin_charge_horaire, :id_jour, :id_vacation)";
    $req = $db->prepare($sql);
    $c = ([

        'id_util'                       => $personel,
        'id_classe'                     => $classe,
        'id_matiere'                    => $matiere,
        'id_option'                     => $option,
        'heure_debut_charge_horaire'    => $debutH,
        'heure_fin_charge_horaire'      => $finH,
        'id_jour'                       => $jour,
        'id_vacation'                   => $vacation
    ]);
    $req->execute($c);
}

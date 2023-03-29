<?php

if (isset($_POST['submit'])) {

    $nom = htmlspecialchars(trim($_POST['nom_eleve']));
    $postnom = htmlspecialchars(trim($_POST['postnom_eleve']));
    $prenom = htmlspecialchars(trim($_POST['prenom_eleve']));
    $dateNaissance = htmlspecialchars(trim($_POST['date_naissance_eleve']));
    $lieuNaissance = htmlspecialchars(trim($_POST['lieu_naissance_eleve']));
    $option = htmlspecialchars(trim(intval($_POST['id_option'])));
    $classe = htmlspecialchars(trim(intval($_POST['id_classe'])));
    $sexe = htmlspecialchars(trim(intval($_POST['id_sexe'])));
    $statut = isset($_POST['statut_eleve']) ? "1" : "0";

    $photo = $_FILES['image_eleve']['name'];
    $chemin = "assets/img/eleves/" . $photo;
    // $nom_image = ;

    if (!empty($nom) && !empty($postnom)  && !empty($prenom) && !empty($dateNaissance) && !empty($lieuNaissance) && !empty($photo)) {


        createEleve($nom, $postnom, $prenom, $dateNaissance, $lieuNaissance, $option, $classe, $sexe, $statut, $photo, $chemin);
        $error = "<font color='green'>Inscription effectuée avec succès !</font>";
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}













// Cette fonction permet l'insertion d'un Eleve dans la BDD
function createEleve($nom, $postnom, $prenom, $dateNaissance, $lieuNaissance,  $option, $classe, $sexe, $statut, $photo, $chemin)
{

    global $db;
    $sql = "INSERT INTO eleves(nom_eleve, postnom_eleve, prenom_eleve, date_naissance_eleve, lieu_naissance_eleve,  date_inscription_eleve, id_option, id_classe, id_sexe, statut_eleve, image_eleve) VALUES(:nom_eleve, :postnom_eleve, :prenom_eleve, :date_naissance_eleve, :lieu_naissance_eleve, NOW(), :id_option, :id_classe, :id_sexe, :statut_eleve, :image_eleve)";
    $req = $db->prepare($sql);
    $c = ([

        'nom_eleve'             => $nom,
        'postnom_eleve'         => $postnom,
        'prenom_eleve'          => $prenom,
        'date_naissance_eleve'  => $dateNaissance,
        'lieu_naissance_eleve'  => $lieuNaissance,
        'id_option'             => $option,
        'id_classe'             => $classe,
        'id_sexe'               => $sexe,
        'statut_eleve'          => $statut,
        'image_eleve'           => $photo
    ]);
    move_uploaded_file($_FILES['image_eleve']['tmp_name'], $chemin);
    $req->execute($c);
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




// Recuperation du sexe pour le select du formulaire ajouter un eleve
function get_sexes()
{
    global $db;

    $req = $db->query("SELECT * FROM sexes  ORDER BY id_sexe DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$sexes = get_sexes();

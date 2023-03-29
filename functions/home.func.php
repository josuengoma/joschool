<?php
if (isset($_POST['submit'])) {

    $objet = htmlspecialchars(trim($_POST['objet_rapport']));
    $contenu = htmlspecialchars(trim($_POST['contenu_rapport']));


    if (!empty($objet) && !empty($contenu)) {

        createRapport($objet, $contenu, $getid_util);
        $error = "<font color='green'>Rapport soumis avec succès !</font>";
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}


// Reccuperation de la charge horaire de l'utilisateur connecté
function get_horaires()
{
    global $db;

    $req = $db->query("SELECT * FROM charges_horaires 
    JOIN utils 
    JOIN matieres 
    ON charges_horaires.id_util = utils.id_util   
    AND charges_horaires.id_matiere = matieres.id_matiere   
    WHERE utils.id_util='{$_SESSION['id_util']}'
    ");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$horaires = get_horaires();


// Cette fonction permet l'insertion d'un rapport dans la BDD
function createRapport($objet, $contenu, $getid_util)
{

    global $db;
    $sql = "INSERT INTO rapports(id_util, objet_rapport, contenu_rapport, date_rapport) VALUES(:id_util, :objet_rapport, :contenu_rapport, NOW())";
    $req = $db->prepare($sql);
    $c = ([

        'id_util'             => $getid_util,
        'objet_rapport'       => $objet,
        'contenu_rapport'     => $contenu
    ]);

    $req->execute($c);
}

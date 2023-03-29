<?php

// Cette fonction permet de reccuperer tous les coordonnées d'un uyilisateur par rapport à son id
function getUtil()
{

    global $db;
    $sql = "SELECT * FROM utils JOIN grades   ON utils.id_grade=grades.id_grade WHERE utils.id_util='{$_SESSION['id_util']}'";

    $req = $db->query($sql);

    $result =

        $req->fetchObject();
    return $result;
}

$util = getUtil();
$getid_util = $util->id_util;


// Compteurs du menu de navigation
# 1-Compte non validé
function compteur_accountNovalide()
{
    global $db;


    $sql = "SELECT id_util FROM utils  WHERE utils.id_grade != 6 AND confirmation_util = 0 ORDER BY date_inscription_util DESC";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurAccountNoValid = compteur_accountNovalide();

# 2-Liste du personel
function ListPersonel()
{
    global $db;


    $sql = "SELECT id_util FROM utils  WHERE utils.id_grade != 6 AND confirmation_util = 1";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurListPersonel = ListPersonel();

# 2-Liste des eleves
function ListEleve()
{
    global $db;


    $sql = "SELECT id_eleve FROM eleves WHERE id_eleve != 1";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurListEleve = ListEleve();

# 3-Liste des parents
function ListParent()
{
    global $db;


    $sql = "SELECT id_util FROM utils WHERE id_grade = 6";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurListParent = ListParent();

# 4-Liste des rapports journaliers
function dayRapport()
{
    global $db;


    $sql = "SELECT id_rapport FROM rapports";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurRapport = dayRapport();


# 4-Liste des annonces
function annonce()
{
    global $db;


    $sql = "SELECT id_annonce FROM annonces";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);

    return $exist;
}

$compteurAnnonce = annonce();

<?php

if (isset($_POST['submit'])) {

    $email_util = htmlspecialchars(trim($_POST['email_util']));
    $motpass_util = htmlspecialchars(trim($_POST['motpass_util']));


    if (!empty($email_util) && !empty($motpass_util)) {




        if (utilConnect($email_util) == 1) {

            $pas = utilInfo($email_util, $motpass_util);

            $motpass_util_hasher = sha1($motpass_util);

            if ($motpass_util_hasher == $pas['motpass_util']) {
                // Vous avez 20 min pour resoudre ceci :
                //TP1: Facliter la tâche de connexion à l'utilisateur dont le grade est parent afin qu'il passe
                // outre de la confirmation de compte, contairement aux autres utilisateurs
                // TP2: Pourquoi $pas['motpass_util'] n'est pas écit comme d'habitude avec l'ecriture $pas->motpass_util ?
                //TP3: En essayant de me connecter avec un mot passe incorrecte une notice me sera envoyée via la ligne 20
                // règler cette erreur
                // TP4 : Si l'utilisateur a une grade parent, et qu'il n'a pas mentionner le matricule de l'élève,
                // une erreur lui sera renvoyée, celle-ci n'est pas beau à voir, personnalisez cette erreur

                $utilInfo = utilInfo($email_util, $motpass_util);
                $_SESSION['id_util'] = $utilInfo['id_util'];
                $_SESSION['matricule_eleve'] = $utilInfo['matricule_eleve'];
                $_SESSION['nom_util'] = $utilInfo['nom_util'];
                $_SESSION['prenom_util'] = $utilInfo['prenom_util'];
                $_SESSION['email_util'] = $utilInfo['email_util'];
                $_SESSION['date_inscription_util'] = $utilInfo['date_inscription_util'];
                $_SESSION['image_util'] = $utilInfo['image_util'];
                $_SESSION['motpass_util'] = $utilInfo['motpass_util'];
                $_SESSION['etat_civil_util'] = $utilInfo['etat_civil_util'];
                $_SESSION['token_util'] = $utilInfo['token_util'];
                $_SESSION['id_grade'] = $utilInfo['id_grade'];
                $_SESSION['matiere_util'] = $utilInfo['matiere_util'];
                $_SESSION['sexe_util'] = $utilInfo['sexe_util'];
                $_SESSION['confirmation_util'] = $utilInfo['confirmation_util'];
                $_SESSION['confirmation_email'] = $utilInfo['confirmation_email'];
                header('Location: home.php?page=home&id_util=' . $_SESSION['id_util']);
            } else {
                $error = "<font color='red'>Mot de passe incorrect !</font>";
            }
        } else {

            $error = "<font color='red'>Cet utilisateur n'existe pas ! ";
        }
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}

function utilConnect($email_util)
{
    $motpass_util = htmlspecialchars(trim($_POST['motpass_util']));
    global $db;

    $a = [

        'email_util'     => $email_util


    ];


    $sql = "SELECT * FROM utils WHERE email_util = :email_util AND confirmation_util = '1'";
    $req = $db->prepare($sql);
    $req->execute($a);

    $exist = $req->rowCount($sql);

    return $exist;
}

function utilInfo($email_util, $motpass_util)
{

    global $db;

    $a = [

        'email_util'     => $email_util,
        'motpass_util'  => sha1($motpass_util)
    ];


    $sql = "SELECT * FROM utils WHERE email_util = :email_util AND motpass_util = :motpass_util";
    $req = $db->prepare($sql);
    $req->execute($a);

    $exist = $req->fetch();

    return $exist;
}

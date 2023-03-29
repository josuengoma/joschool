<?php

// Traitement d'autres information de l'utilisateur
if (isset($_POST['updateProfile'])) {

    $nom = htmlspecialchars(trim($_POST['nom_util']));
    $prenom = htmlspecialchars(trim($_POST['prenom_util']));
    $email = htmlspecialchars(trim($_POST['email_util']));
    $grade = htmlspecialchars(trim($_POST['id_grade']));
    $matiere = htmlspecialchars(trim($_POST['matiere_util']));
    $sexe = htmlspecialchars(trim($_POST['sexe_util']));
    $matricule_eleve = htmlspecialchars(trim(intval($_POST['matricule_eleve'])));
    $etat_civil = htmlspecialchars(trim($_POST['etat_civil_util']));



    if (!empty($nom) && !empty($prenom) && !empty($email)) {

        if ($nom != $util->nom_util || $prenom != $util->prenom_util || $sexe != $util->sexe_util || $email != $util->email_util || $etatcivil != $util->etat_civil_util || $matiere != $util->matiere_util || $grade != $util->id_util_grade || $matricule_eleve != $util->matricule_eleve) {

            updateUtil($nom, $prenom, $email, $grade, $matiere, $sexe, $etat_civil, $matricule_eleve,  $getid_util);
?>
            <script>
                window.location.replace("profileUtil.php?id_util=<?= $_GET['id_util'] ?>");
            </script>
            <?php
        }
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}
// Traitement de l'avatar de l'utilisateur
if (isset($_FILES['image_util']) && !empty($_FILES['image_util']['name'])) {

    $tailleMax = 2097152;
    $extensionValid_utiles = array('jpg', 'jpeg', 'png', 'gif');

    if ($_FILES['image_util']['size'] <= $tailleMax) {

        $extensionUploads = strtolower(substr(strrchr($_FILES['image_util']['name'], '.'), 1));

        if (in_array($extensionUploads, $extensionValid_utiles)) {

            $chemin = "assets/img/utils/" . $_SESSION['id_util'] . "." . $extensionUploads;
            $deplacement = move_uploaded_file($_FILES['image_util']['tmp_name'], $chemin);

            if ($deplacement) {
                updateImage($extensionUploads, $getid_util);
            ?>
                <script>
                    window.location.replace("updateProfil.php?id_util=<?= $_GET['id_util'] ?>");
                </script>
<?php
            } else {
                $error = "<font color='red'>Votre photo n'a pas été importée !</font>";
            }
        } else {
            $error = "<font color='red'>Votre photo de profile  doit être au format jpg, jpeg, png ou gif !</font>";
        }
    } else {
        $error = "<font color='red'>Votre photo de profile ne doit pas depasser 2Mo !</font>";
    }
}


// Traitement du mot de passe de l'utilisateur
if (isset($_POST['updatePassword'])) {

    $currentpassword = htmlspecialchars(trim(sha1($_POST['currentpassword'])));
    $newpassword = htmlspecialchars(trim($_POST['newpassword']));
    $confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));


    if (!empty($currentpassword) && !empty($newpassword) && !empty($confirmpassword)) {

        if ($currentpassword == $util->motpass_util) {

            $passwordlenght = strlen($newpassword);
            if ($passwordlenght >= 8) {

                if ($newpassword == $confirmpassword) {

                    updatePassword($newpassword, $getid_util);
                    $error = "<font color='green'>Votre mot de passe a été modifié avec succès!</font>";
                } else {
                    $error = "<font color='red'>Les deux mots de passes ne sont pas identiques !</font>";
                }
            } else {
                $error = "<font color='red'>Mot de passe trop court !</font>";
            }
        } else {
            $error = "<font color='red'>Mot de passe invalide !</font>";
        }
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}






function updateUtil($nom, $prenom, $email, $grade, $matiere, $sexe, $etat_civil, $matricule_eleve,   $getid_util)
{

    global $db;
    $a = [

        'nom_util'          => $nom,
        'prenom_util'       => $prenom,
        'email_util'        => $email,
        'id_grade'          => $grade,
        'matiere_util'      => $matiere,
        'sexe_util'         => $sexe,
        'etat_civil_util'   => $etat_civil,
        'matricule_eleve'   => $matricule_eleve,
        'id_util'           => $getid_util
    ];
    $sql = "UPDATE utils SET nom_util =:nom_util, prenom_util =:prenom_util, email_util=:email_util, id_grade =:id_grade, matiere_util =:matiere_util, sexe_util=:sexe_util, etat_civil_util=:etat_civil_util, matricule_eleve=:matricule_eleve WHERE id_util = :id_util";
    $req = $db->prepare($sql);
    $req->execute($a);
}


function updatePassword($newpassword, $getid_util)
{

    global $db;
    $a = [

        'motpass_util'     => sha1($newpassword),
        'id_util'          => $getid_util
    ];
    $sql = "UPDATE utils SET motpass_util =:motpass_util WHERE id_util = :id_util";
    $req = $db->prepare($sql);
    $req->execute($a);
}

function updateImage($extensionUploads, $getid_util)
{

    global $db;
    $a = [

        'image_util'     => $_SESSION['id_util'] . "." . $extensionUploads,
        'id_util'        => $_SESSION['id_util']
    ];
    $sql = "UPDATE utils SET image_util =:image_util WHERE id_util = :id_util";
    $req = $db->prepare($sql);
    $req->execute($a);
}



// Recuperation de l'etat Civil pour le select du formulaire register
function get_etatCivil()
{
    global $db;

    $req = $db->query("SELECT * FROM etat_civil  ORDER BY id_etat_civil DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$etat_civils = get_etatCivil();

/// Recuperation des grades pour le select du formulaire register
function get_grades()
{
    global $db;

    $req = $db->query("SELECT * FROM grades  ORDER BY id_grade DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}
$grades = get_grades();

// Recuperation des matieres pour le select du formulaire register
function get_matieres()
{
    global $db;

    $req = $db->query("SELECT * FROM matieres  ORDER BY id_matiere DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$matieres = get_matieres();



// Recuperation du sexe pour le select du formulaire register
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

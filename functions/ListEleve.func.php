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
    $getid_eleve = htmlspecialchars(trim(intval($_POST['id_eleve'])));



    if (!empty($nom) && !empty($postnom)  && !empty($prenom) && !empty($dateNaissance) && !empty($lieuNaissance)) {


        updatEleve($nom, $postnom, $prenom, $dateNaissance, $lieuNaissance, $option, $classe, $sexe, $statut, $getid_eleve);
        $error = "<font color='green'>Mise à jour effectuée avec succèss !</font>";
?>
        <script>
            window.location.replace("ListEleve.php?page=ListEleve");
        </script>
        <?php
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}

// Traitement de l'avatar de l'eleve
if (isset($_FILES['image_eleve']) && !empty($_FILES['image_eleve']['name'])) {

    $tailleMax = 2097152;
    $extensionValid_elevees = array('jpg', 'jpeg', 'png', 'gif');

    if ($_FILES['image_eleve']['size'] <= $tailleMax) {

        $extensionUploads = strtolower(substr(strrchr($_FILES['image_eleve']['name'], '.'), 1));

        if (in_array($extensionUploads, $extensionValid_elevees)) {

            $chemin = "assets/img/eleves/" . $getid_eleve . "." . $extensionUploads;
            $deplacement = move_uploaded_file($_FILES['image_eleve']['tmp_name'], $chemin);

            if ($deplacement) {
                updateImage($extensionUploads, $getid_eleve);
        ?>
                <script>
                    window.location.replace("ListEleve.php?page=ListEleve");
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



function get_eleves()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM eleves 
    JOIN options 
    JOIN classes 
    JOIN sexes 
    ON eleves.id_option = options.id_option 
    AND eleves.id_classe = classes.id_classe   
    AND eleves.id_sexe = sexes.id_sexe  WHERE eleves.id_eleve != 1
    ORDER BY date_inscription_eleve DESC
    ");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$eleves = get_eleves();







// Recuperation des classes pour le select du formulaire ajouter un eleve
function get_classes()
{
    global $db;

    $req = $db->query("SELECT * FROM classes  ");

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

    $req = $db->query("SELECT * FROM options  ");

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

    $req = $db->query("SELECT * FROM sexes  ");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$sexes = get_sexes();


// Mise à jour de l'image de l'élève
function updateImage($extensionUploads, $getid_eleve)
{

    global $db;
    $a = [

        'image_eleve'     => $getid_eleve . "." . $extensionUploads,
        'id_eleve'        => $getid_eleve
    ];
    $sql = "UPDATE eleves SET image_eleve =:image_eleve WHERE id_eleve = :id_eleve";
    $req = $db->prepare($sql);
    $req->execute($a);
}


// Mise à jour des des informations de l'élève
function updatEleve($nom, $postnom, $prenom, $dateNaissance, $lieuNaissance,  $option, $classe, $sexe, $statut, $getid_eleve)
{

    global $db;

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
        'id_eleve'              => $getid_eleve
    ]);

    $sql = "UPDATE eleves SET nom_eleve =:nom_eleve, postnom_eleve =:postnom_eleve, prenom_eleve =:prenom_eleve, date_naissance_eleve =:date_naissance_eleve, lieu_naissance_eleve =:lieu_naissance_eleve, id_option =:id_option, id_classe =:id_classe, id_sexe =:id_sexe, statut_eleve =:statut_eleve WHERE id_eleve = :id_eleve";
    $req = $db->prepare($sql);


    $req->execute($c);
}




//Cette commande permet de supprimer touts les eleves dans la BDD
if (isset($_POST['truncate_eleves'])) {
    $sql = 'DELETE FROM eleves WHERE id_eleve != 1';
    $query = $db->prepare($sql);
    $query->execute();
    $error = "<font color='red'>Vous avez supprimez tous élèves de JoSchool de la base des données !</font>";
    ?>
    <script>
        window.location.replace("ListEleve.php?page=ListEleve");
    </script>
<?php

}

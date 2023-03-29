<?php
// ============================== Création ==============================
if (isset($_POST['creatAnnonce'])) {

    $title = htmlspecialchars(trim($_POST['titre_annonce']));
    $content = htmlspecialchars(trim($_POST['contenu_annonce']));
    $visibilite = isset($_POST['visibilite_annonce']) ? "1" : "0";

    $photo = $_FILES['image_annonce']['name'];
    $chemin = "assets/img/annonces/" . $photo;
    // $nom_image = ;

    if (!empty($title) && !empty($content)) {


        creatAnnonce($title, $content, $visibilite, $getid_util, $photo, $chemin);
        $error = "<font color='green'>Annonce créee  avec succès !</font>";
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}


// Cette fonction permet l'insertion d'un Eleve dans la BDD
function creatAnnonce($title, $content, $visibilite, $getid_util, $photo, $chemin)
{

    global $db;
    $sql = "INSERT INTO annonces(titre_annonce, contenu_annonce, visibilite_annonce, id_util, date_annonce,  image_annonce) VALUES(:titre_annonce, :contenu_annonce, :visibilite_annonce, :id_util, NOW(), :image_annonce)";
    $req = $db->prepare($sql);
    $c = ([

        'titre_annonce'             => $title,
        'contenu_annonce'           => $content,
        'visibilite_annonce'        => $visibilite,
        'id_util'                   => $getid_util,
        'image_annonce'             => $photo
    ]);
    move_uploaded_file($_FILES['image_annonce']['tmp_name'], $chemin);
    $req->execute($c);
}

// ========================== Mise à jour ==============================
if (isset($_POST['updatAnnonce'])) {

    $title = htmlspecialchars(trim($_POST['titre_annonce']));
    $content = htmlspecialchars(trim($_POST['contenu_annonce']));
    $visibilite = isset($_POST['visibilite_annonce']) ? "1" : "0";
    $getid_annonce = htmlspecialchars(trim(intval($_POST['id_annonce'])));



    if (!empty($title) && !empty($content)) {


        updatAnnonce($title, $content,  $visibilite, $getid_annonce, $getid_util);
        $error = "<font color='green'>Mise à jour effectuée avec succèss !</font>";
?>
        <!-- <script>
            window.location.replace("annonces.php?page=annonces");
        </script> -->
        <?php
    } else {
        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}


// Mise à jour des des informations de l'annonce
function updatAnnonce($title, $content,  $visibilite, $getid_annonce, $getid_util)
{

    global $db;

    $c = ([

        'titre_annonce'             => $title,
        'contenu_annonce'           => $content,
        'visibilite_annonce'        => $visibilite,
        'id_annonce'                => $getid_annonce,
        'id_util'                   => $getid_util

    ]);

    $sql = "UPDATE annonces SET titre_annonce =:titre_annonce, contenu_annonce =:contenu_annonce, visibilite_annonce =:visibilite_annonce, date_annonce =NOW(), id_util =:id_util WHERE id_annonce = :id_annonce";
    $req = $db->prepare($sql);


    $req->execute($c);
}

// Traitement de l'image de l'annonce
if (isset($_FILES['image_annonce']) && !empty($_FILES['image_annonce']['name'])) {

    $tailleMax = 2097152;
    $extensionValid_annoncees = array('jpg', 'jpeg', 'png', 'gif');

    if ($_FILES['image_annonce']['size'] <= $tailleMax) {

        $extensionUploads = strtolower(substr(strrchr($_FILES['image_annonce']['name'], '.'), 1));

        if (in_array($extensionUploads, $extensionValid_annoncees)) {

            $chemin = "assets/img/annonces/" . $getid_annonce . "." . $extensionUploads;
            $deplacement = move_uploaded_file($_FILES['image_annonce']['tmp_name'], $chemin);

            if ($deplacement) {
                updateImage($extensionUploads, $getid_annonce);
        ?>
                <script>
                    window.location.replace("annonces.php?page=annonces");
                </script>
    <?php
            } else {
                $error = "<font color='red'>L'image n'a pas été importée !</font>";
            }
        } else {
            $error = "<font color='red'>L'image de l'annonce  doit être au format jpg, jpeg, png ou gif !</font>";
        }
    } else {
        $error = "<font color='red'>L'image de l'annonce e ne doit pas depasser 2Mo !</font>";
    }
}

// Mise à jour de l'image de l'annonce
function updateImage($extensionUploads, $getid_annonce)
{

    global $db;
    $a = [

        'image_annonce'     => $getid_annonce . "." . $extensionUploads,
        'id_annonce'        => $getid_annonce
    ];
    $sql = "UPDATE annonces SET image_annonce =:image_annonce WHERE id_annonce = :id_annonce";
    $req = $db->prepare($sql);
    $req->execute($a);
}

function get_annonces()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM annonces 
    JOIN utils
    ON annonces.id_util = utils.id_util  
    ORDER BY annonces.date_annonce DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$annonces = get_annonces();








//Cette commande permet de supprimer touts les parents d'annonces dans la BDD
if (isset($_POST['truncate_annonce'])) {
    $sql = 'TRUNCATE TABLE annonces';
    $query = $db->prepare($sql);
    $query->execute();
    $error = "<font color='red'>Vous avez supprimez toutes les annonces de JoSchool de la base des données !</font>";
    ?>
    <script>
        window.location.replace("annonces.php?page=annonces");
    </script>
<?php

}

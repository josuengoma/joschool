<?php
if (isset($_POST['submit'])) {

    $newGrade = htmlspecialchars(trim(intval($_POST['id_grade'])));
    $newConfirmation = isset($_POST['confirmation_util']) ? "1" : "0";
    $personnelId = htmlspecialchars(trim(intval($_POST['id_util'])));



    if (($personel->id_grade != $newGrade) || ($personel->confirmation_uti !=  $newConfirmation)) {


        updatePersonel($newGrade, $newConfirmation, $personnelId);
        $error = "<font color='green'>Mise à jour effectuée avec succèss !</font>";
?>
        <script>
            window.location.replace("ListPersonel.php?page=ListPersonel");
        </script>
    <?php
    } else {
        $error = "<font color='red'>Aucun changement constaté !</font>";
    }
}

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


// Recuperation des grades pour le select du formulaire update
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


// Mise à jour du grade et confirmation du personnel
function updatePersonel($newGrade, $newConfirmation, $personnelId)
{

    global $db;

    $c = ([

        'id_grade'             => $newGrade,
        'confirmation_util'    =>  $newConfirmation,
        'id_util'              => $personnelId
    ]);

    $sql = "UPDATE utils SET id_grade =:id_grade, confirmation_util =:confirmation_util WHERE id_util = :id_util";
    $req = $db->prepare($sql);


    $req->execute($c);
}


//Cette commande permet de supprimer touts le personnel dans la BDD
# Duestion : Etant donné que la personne qui effectue cette tâche est aussi personnel de la BDD que va t-il se passer
# après la suppression ? Est-ce une bonne ou mauvaise chose ? Si bonne dite pourquoi ? 
# Si mauvaise gerer ce problème sur place
if (isset($_POST['truncate_personel'])) {
    $sql = 'DELETE FROM utils WHERE id_grade != 6';
    $query = $db->prepare($sql);
    $query->execute();
    $error = "<font color='red'>Vous avez supprimez tous le personnel de JoSchool de la base des données !</font>";
    ?>
    <script>
        window.location.replace("ListPersonel.php?page=ListPersonel");
    </script>
<?php

}

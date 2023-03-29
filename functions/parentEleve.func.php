<?php

function get_parents()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM utils 
    JOIN grades
    JOIN eleves 
    ON   utils.id_grade = grades.id_grade
    AND utils.matricule_eleve = eleves.id_eleve   
    WHERE utils.id_grade = 6
    ORDER BY utils.id_util DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$parents = get_parents();








//Cette commande permet de supprimer touts les parents d'eleves dans la BDD
if (isset($_POST['truncate_parent'])) {
    $sql = 'DELETE FROM utils WHERE id_grade = 6';
    $query = $db->prepare($sql);
    $query->execute();
    $error = "<font color='red'>Vous avez supprimez tous les parents d'élèves de JoSchool de la base des données !</font>";
?>
    <script>
        window.location.replace("parentEleve.php?page=parentEleve");
    </script>
<?php

}

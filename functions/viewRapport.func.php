<?php

function get_horaires()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM rapports 
    JOIN utils
    ON rapports.id_util = utils.id_util  
    ORDER BY rapports.date_rapport DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$horaires = get_horaires();








//Cette commande permet de supprimer touts les parents d'eleves dans la BDD
if (isset($_POST['truncate_rapport'])) {
    $sql = 'TRUNCATE TABLE rapports';
    $query = $db->prepare($sql);
    $query->execute();
    $error = "<font color='red'>Vous avez supprimez tous les rapports du personnel de JoSchool de la base des données !</font>";
?>
    <script>
        window.location.replace("viewRapport.php?page=viewRapport");
    </script>
<?php

}

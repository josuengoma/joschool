<?php
include('functions/db.php');


$id = $_GET['id_eleve'];
$sql = "DELETE FROM eleves WHERE id_eleve =:id_eleve AND id_eleve != 1";
$query = $db->prepare($sql);
$response = $query->execute(['id_eleve' => $id]);
if ($response) {

    header("Location: ListEleve.php?page=ListEleve");
}

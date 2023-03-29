<?php
include('functions/db.php');


$id = $_GET['id_annonce'];
$sql = "DELETE FROM annonces WHERE id_annonce =:id_annonce";
$query = $db->prepare($sql);
$response = $query->execute(['id_annonce' => $id]);
if ($response) {

    header("Location: annonces.php?page=annonces");
}

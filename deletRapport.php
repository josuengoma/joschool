<?php
include('functions/db.php');


$id = $_GET['id_rapport'];
$sql = "DELETE FROM rapports WHERE id_rapport =:id_rapport";
$query = $db->prepare($sql);
$response = $query->execute(['id_rapport' => $id]);
if ($response) {

    header("Location: viewRapport.php?page=viewRapport");
}

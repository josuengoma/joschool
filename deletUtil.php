<?php
include('functions/db.php');


$id = $_GET['id_util'];
$grade = $_GET['id_grade'];
$confirmation = $_GET['confirmation_util'];
$sql = "DELETE FROM utils WHERE id_util =:id_util";
$query = $db->prepare($sql);
$response = $query->execute(['id_util' => $id]);
if ($response) {

    if ($grade == 6) {
        header("Location: parentEleve.php?page=parentEleve");
    } elseif ($grade != 6 && $confirmation == 0) {
        header("Location: accountValidate.php?page=accountValidate");
    } else {
        header("Location: ListPersonel.php?page=ListPersonel");
    }
}

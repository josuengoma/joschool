<?php include('functions/db.php') ?>

<?php

if (isset($_GET['email_util'], $_GET['Cle']) && !empty($_GET['email_util']) && !empty($_GET['Cle'])) {



  // function utilInscrit(){

  $getEmail = htmlspecialchars(trim(urldecode($_GET['email_util'])));
  $Cle = htmlspecialchars(trim($_GET['Cle']));
  // global $db;
  $a = [
    'email_util' => $getEmail,
    'confirmCle_util' => $Cle
  ];
  $sql = "SELECT * FROM utils WHERE email_util = :email_util AND confirmCle_util = :confirmCle_util";
  $req = $db->prepare($sql);
  $req->execute($a);
  $exist = $req->rowCount($sql);

  if ($exist == 1) {

    $util = $req->fetchObject();
    if ($util->confirmation_util == 0) {

      $u = [
        'email_util' => $getEmail,
        'confirmCle_util' => $Cle
      ];
      $SQLupdateutil = "UPDATE utils SET confirmation_email = 1 WHERE email_util = :email_util AND confirmCle_util = :confirmCle_util ";
      $reqUpdate = $db->prepare($SQLupdateutil);
      $reqUpdate->execute($u);
      $error = "<font color='green'>Votre compte a été crée avec succès !</font>";
      // echo "Votre  a été crée avec succès !";
    } else {
      $error = "<font color='green'>Votre compte a déjà été crée !</font>";
      // echo "Votre compte a déjà été crée !";
    }
  } else {
    $error = "<font color='red'>Cet utilisateur n'existe pas !</font>";
    // echo "Cet utilisateur n'existe pas";
    header('Location: 404.php');
  }
  // return $result;
}



//   $utilInfo = utilInfo();
//   if ($utilInfo == false) {
//     header("Location: 404.php");
// }

function donneutil()
{

  global $db;
  $sql = "SELECT * FROM utils WHERE email_util='{$_GET['email_util']}' AND confirmCle_util='{$_GET['Cle']}'";

  $req = $db->query($sql);

  $result = $req->fetchObject();
  return $result;
}


$donnerutil = donneutil();
?>




















<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - JoSchool Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Theme Style -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <main>
    <div class="container">


      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-center">Salut <?= $donnerutil->prenom_util; ?> <?= $donnerutil->nom_util; ?> !</h2>
        <p>
          <b>
            <?php if (isset($error)) {
              echo $error;
            } ?>
          </b>
        </p>

        <h2>Ceci nous permet de verifier l'existence cette adresse email et qu'il s'agit réellement de vous.
          <br> Au cas contraire veuillez <b><a href="register.php">créer un compte </a></b> avec une vraie adresse email
        </h2>
        <a class="btn" href="login.php">Cliquez ici pour vous connecter</a>

        <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">

          Designed by <a href="https://joscenter.com/">JOScenter </a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Footer ======= -->




  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>
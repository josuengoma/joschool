<?php include('functions/db.php') ?>
<?php include('functions/register.func.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Créer un compte -|- JoSchool</title>
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

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">JoSchool</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Creez un compte</h5>
                    <p class="text-center small">Entrez vos coordonnées pour créer un compte</p>
                    <p class="text-center small">
                      <?php if (isset($error)) {
                        echo $error;
                      } ?>
                    </p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nom</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                        <input type="text" name="nom_util" class="form-control" id="yourUsername" value="<?php if (isset($nom)) {
                                                                                                            echo $nom;
                                                                                                          } ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Prenom</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                        <input type="text" name="prenom_util" class="form-control" id="yourUsername" value="<?php if (isset($prenom)) {
                                                                                                              echo $prenom;
                                                                                                            } ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                        <input type="text" name="email_util" class="form-control" id="yourUsername" value="<?php if (isset($email)) {
                                                                                                              echo $email;
                                                                                                            } ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Mot de passe</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-unlock"></i></span>
                        <input type="password" name="motpass_util" class="form-control" id="yourUsername">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Confirmation mot de passe</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                        <input type="password" name="motpass_repeat_util" class="form-control" id="yourUsername">
                      </div>
                    </div>


                    <div class="form-floating mb-3">
                      <select name="sexe_util" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <?php foreach ($sexes as $sexe) : ?>
                          <option value="<?= $sexe->nom_sexe ?>"><?= $sexe->nom_sexe ?></option>
                        <?php endforeach;  ?>
                      </select>
                      <label for="floatingSelect">Sexe</label>
                    </div>

                    <div class="form-floating mb-3">
                      <select name="id_grade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <?php foreach ($grades as $grade) : ?>
                          <option value="<?= $grade->id_grade ?>"><?= $grade->nom_grade ?></option>
                        <?php endforeach;  ?>
                      </select>
                      <label for="floatingSelect">Grade</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="number" name="matricule_eleve" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Matricule d'elve (si vous êtes parent)</label>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms">
                        <label class="form-check-label" for="acceptTerms">J'accèpte <a href="#">les
                            conditions</a></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">S'enregistrer</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous avez déjà un compte? <a href="login.php">Connectez-vous</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://joscenter.com/">JOScenter</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>
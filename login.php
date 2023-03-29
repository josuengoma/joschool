<?php include('functions/db.php') ?>
<?php include('functions/login.func.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Connexion -|- JoSchool </title>
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

  <body>

    <main>
      <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                  <a href="index.php" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">JoSchool</span>
                  </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Connexion</h5>
                      <p class="text-center small">Entrez votre email et mot de passe</p>
                      <p class="text-center small">
                        <?php if (isset($error)) {
                          echo $error;
                        } ?>
                      </p>
                    </div>

                    <form class="row g-3 needs-validation" method="POST">

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Adresse email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                          <input type="email" name="email_util" class="form-control" id="yourUsername" value="<?php if (isset($email_util)) {
                                                                                                                echo $email_util;
                                                                                                              } ?>">

                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Mot de passe</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                          <input type="password" name="motpass_util" class="form-control" id="yourUsername">

                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="submit">Se connecter</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Vous n'avez pas de compte? <a href="register.php">Creez un
                            compte</a>
                        </p>
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
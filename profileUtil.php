<?php include('layouts/header.php') ?>
<?php include('functions/profileUtil.func.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Mon profile</li>
                <li class="breadcrumb-item active"><?php echo ("$util->nom_util $util->prenom_util")  ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/utils/<?= $util->image_util ?>" alt="<?= $util->nom_util ?>" class="rounded-circle">
                        <h2><?php echo ("$util->nom_util $util->prenom_util")  ?></h2>
                        <h3><?= $util->nom_grade ?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Tous voir</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le profile</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer
                                    mot de passe</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Details du profile </h5>
                                <p><?php if (isset($error)) {
                                        echo $error;
                                    } ?></p>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->nom_util ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Prenom</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->prenom_util ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Grade</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->nom_grade ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Genre</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->sexe_util ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Etat civil</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->etat_civil_util ?></div>
                                </div>

                                <!-- Parent -->
                                <?php if ($util->id_grade == 6) {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Matricule élève</div>
                                        <div class="col-lg-9 col-md-8"><?= $util->matricule_eleve ?></div>
                                    </div>
                                <?php
                                } ?>

                                <!-- Enseignant -->
                                <?php if ($util->id_grade == 5) {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Matière</div>
                                        <div class="col-lg-9 col-md-8"><?= $util->matiere_util ?></div>
                                    </div>
                                <?php
                                } ?>



                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $util->email_util ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/utils/<?= $util->image_util ?>" alt="<?= $util->nom_util ?>">
                                            <div class="pt-2">
                                                <button type="submit" name="" class="btn btn-primary btn-sm" title="Telecharger une image image"><i class="bi bi-upload"></i></button>
                                                <input name="image_util" class="btn btn-primary btn-sm" type="file" title="Telecharger une image image">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form>
                                <form method="POST" enctype="multipart/form-data"> -->
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nom_util" type="text" class="form-control" id="fullName" value="<?= $util->nom_util ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="prenom_util" type="text" class="form-control" id="fullName" value="<?= $util->prenom_util ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email_util" type="email" class="form-control" id="company" value="<?= $util->email_util ?>">
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="etat_civil_util" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($etat_civils as $etat_civil) : ?>
                                                <option value="<?= $etat_civil->nom_etat ?>" <?php echo ($etat_civil->nom_etat == $util->etat_civil_util) ? "selected" : " " ?>><?= $etat_civil->nom_etat ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Etat civil</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="id_grade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($grades as $grade) : ?>
                                                <option value="<?= $grade->id_grade ?>" <?php echo ($grade->id_grade == $util->id_grade) ? "selected" : " " ?>><?= $grade->nom_grade ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Grade</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="matiere_util" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($matieres as $matiere) : ?>
                                                <option value="<?= $matiere->nom_matiere ?>" <?php echo ($matiere->nom_matiere == $util->matiere_util) ? "selected" : " " ?>><?= $matiere->nom_matiere ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Matière</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="sexe_util" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($sexes as $sexe) : ?>
                                                <option value="<?= $sexe->nom_sexe ?>" <?php echo ($sexe->nom_sexe == $util->sexe_util) ? "selected" : " " ?>><?= $sexe->nom_sexe ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Sexe</label>
                                    </div>



                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Matricule élève</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="matricule_eleve" type="number" class="form-control" id="company" value="<?= $util->matricule_eleve ?>">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" name="updateProfile" class="btn btn-primary">Modifiez le profile</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST">

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="currentpassword" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmez ce mot de passe</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirmpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="updatePassword" class="btn btn-primary">Changez mot de passe</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('layouts/footer.php') ?>
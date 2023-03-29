<?php include('layouts/header.php') ?>
<?php include('functions/inscription.func.php') ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Inscription d'élève</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion des élèves</li>
                <li class="breadcrumb-item active">Inscription</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if (isset($error)) {
                                echo $error;
                            } ?>
                        </h5>

                        <!-- Advanced Form Elements -->
                        <form method="POST" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nom_eleve" class="form-control" id="floatingInput" value="<?php if (isset($nom)) {
                                                                                                                                echo $nom;
                                                                                                                            } ?>">
                                        <label for="floatingInput">Nom</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="postnom_eleve" class="form-control" id="floatingPassword" value="<?php if (isset($postnom)) {
                                                                                                                                        echo $postnom;
                                                                                                                                    } ?>">
                                        <label for="floatingPassword">Post-nom</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="prenom_eleve" class="form-control" id="floatingPassword" value="<?php if (isset($prenom)) {
                                                                                                                                        echo $prenom;
                                                                                                                                    } ?>">
                                        <label for="floatingPassword">Prenom</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="date_naissance_eleve" class="form-control" id="floatingPassword" value="<?php if (isset($dateNaissance)) {
                                                                                                                                                echo $dateNaissance;
                                                                                                                                            } ?>">
                                        <label for="floatingPassword">Année de naissance</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="lieu_naissance_eleve" class="form-control" id="floatingPassword" value="<?php if (isset($lieuNaissance)) {
                                                                                                                                                echo $lieuNaissance;
                                                                                                                                            } ?>">
                                        <label for="floatingPassword">Lieu de naissance</label>
                                    </div>




                                    <div class="row mb-3">
                                        <label for="inputNumber">Photo</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile" name="image_eleve" value="<?php if (isset($photo)) {
                                                                                                                                echo $photo;
                                                                                                                            } ?>">
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="id_sexe" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($sexes as $sexe) : ?>
                                                <option value="<?= $sexe->id_sexe ?>"><?= $sexe->nom_sexe ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Sexe</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="id_option" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($options as $option) : ?>
                                                <option value="<?= $option->id_option ?>"><?= $option->nom_option ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Option</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="id_classe" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($classes as $classe) : ?>
                                                <option value="<?= $classe->id_classe ?>"><?= $classe->nom_classe ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Classe</label>
                                    </div>


                                    <div class="row mb-5">
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="statut_eleve">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Frais payé</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Confirmez l'inscription</button>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php include('layouts/footer.php') ?>
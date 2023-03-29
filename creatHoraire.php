<?php include('layouts/header.php') ?>
<?php include('functions/creatHoraire.func.php') ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Attribuer une charge horaire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion des élèves</li>
                <li class="breadcrumb-item active">Attribution charge horaire</li>
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
                                        <select name="id_util" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($personels as $personel) : ?>
                                                <option value="<?= $personel->id_util ?><?= $personel->prenom_util ?>"><?= $personel->nom_util ?> <?= $personel->prenom_util ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">personel</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="id_classe" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($classes as $classe) : ?>
                                                <option value="<?= $classe->nom_classe ?>"><?= $classe->nom_classe ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Classe</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="id_matiere" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($matieres as $matiere) : ?>
                                                <option value="<?= $matiere->id_matiere ?>"><?= $matiere->nom_matiere ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">matiere</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="id_option" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($options as $option) : ?>
                                                <option value="<?= $option->nom_option ?>"><?= $option->nom_option ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">Option</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="heure_debut_charge_horaire" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($heures as $heure) : ?>
                                                <option value="<?= $heure->nom_heure ?>"><?= $heure->nom_heure ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">heure début</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="heure_fin_charge_horaire" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($heures as $heure) : ?>
                                                <option value="<?= $heure->nom_heure ?>"><?= $heure->nom_heure ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">heure fin</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="id_jour" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($jours as $jour) : ?>
                                                <option value="<?= $jour->nom_jour ?>"><?= $jour->nom_jour ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">jour</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select name="id_vacation" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php foreach ($vacations as $vacation) : ?>
                                                <option value="<?= $vacation->nom_vacation ?>"><?= $vacation->nom_vacation ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                        <label for="floatingSelect">vacation</label>
                                    </div>






                                    <div class="row mb-3">

                                        <div class="col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Confirmez la charge horaire</button>
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
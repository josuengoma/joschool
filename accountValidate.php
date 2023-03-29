<?php include('layouts/header.php') ?>
<?php include('functions/accountValidate.func.php') ?>

<!-- Fichiers Plugins CSS  -->
<link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Valider le compte du personnel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion du personnel</li>
                <li class="breadcrumb-item active">Validation de compte</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <form method="post">
                                <button type="submit" name="truncate_personelNoValid" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer tous le personnel non validé de JoSchool ?') " title="Attention !"> <i class="bi bi-trash"></i> Supprimer tous le personnel non validé</button>
                            </form>
                            <h5 class="title_truncate">
                                <?php if (isset($error)) {
                                    echo $error;
                                } ?>
                            </h5>


                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Sexe</th>
                                        <th scope="col">Matière</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($personels)) {
                                        foreach ($personels as $personel) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $personel->id_util ?></th>
                                                <td><img src="assets/img/utils/<?= $personel->image_util ?>" alt="<?= $personel->id_utimage_util ?>" width="50" height="50" class="img-fluid img-thumbnail"></td>
                                                <td><?= $personel->nom_util ?></td>
                                                <td><?= $personel->prenom_util ?></td>
                                                <td><?= $personel->nom_grade ?></td>
                                                <td><?= $personel->sexe_util ?></td>
                                                <td><?= $personel->matiere_util ?></td>
                                                <td>
                                                    <!--  Modal view -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-<?= $personel->id_util ?>">
                                                        <i class="bi bi-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="modalView-<?= $personel->id_util ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="assets/img/utils/<?= $personel->image_util ?>" alt="<?= $personel->id_util ?>" style="height: 300px !important;" class="img-fluid img-thumbnail">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="details">
                                                                                <tr>
                                                                                    <td>Matricule </td>
                                                                                    <td>: <?= $personel->id_util ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Nom </td>
                                                                                    <td>: <?= $personel->nom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Prenom </td>
                                                                                    <td>: <?= $personel->prenom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sexe </td>
                                                                                    <td>: <?= $personel->sexe_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Email </td>
                                                                                    <td>: <?= $personel->email_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Etat civil </td>
                                                                                    <td>: <?= $personel->etat_civil_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Matière </td>
                                                                                    <td>: <?= $personel->matiere_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Grade </td>
                                                                                    <td>: <span class="badge bg-success"><?= $personel->nom_grade ?></span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Date inscription </td>
                                                                                    <td>: <?= $personel->date_inscription_util ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Modal view-->


                                                    <!-- Modal Dialog Scrollable -->
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit-<?= $personel->id_util ?>">
                                                        <i class="bi bi-pen"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalEdit-<?= $personel->id_util ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">.Modifier les grade d'un personnel</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
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

                                                                                            <input type="hidden" value="<?= $personel->id_util ?>" name="id_util">
                                                                                            <div class="row mb-3">
                                                                                                <div class="col-sm-10">

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <select name="id_grade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                                                            <?php foreach ($grades as $grade) : ?>
                                                                                                                <option value="<?= $grade->id_grade ?>" <?= ($grade->id_grade == $personel->id_grade) ? 'selected' : '' ?>><?= $grade->nom_grade ?></option>
                                                                                                            <?php endforeach;  ?>
                                                                                                        </select>
                                                                                                        <label for="floatingSelect">grade</label>
                                                                                                    </div>


                                                                                                    <div class="row mb-5">
                                                                                                        <div class="col-sm-10">
                                                                                                            <div class="form-check form-switch">
                                                                                                                <input class="form-check-input" name="confirmation_util" type="checkbox" id="flexSwitchCheckDefault" <?= ($personel->confirmation_util == 1) ? 'checked' : '' ?>>
                                                                                                                <label class="form-check-label" for="flexSwitchCheckDefault">Validation du compte</label>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="row mb-3">

                                                                                                        <button type="submit" name="submit" class="btn btn-primary">Validez les modifications</button>


                                                                                                    </div>
                                                                                                </div>

                                                                                        </form> <!-- End General Form Elements -->

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Modal Dialog Scrollable-->

                                                    <a href="deletUtil.php?id_util=<?= $personel->id_util ?>&id_grade=<?= $personel->id_grade ?>&confirmation_util=<?= $personel->confirmation_util ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer ce personnel ?') " data-toggle="tooltip" title="Attention !"><i class="bi bi-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h3 class="box-title text-center">Aucun personnel inscrit </h3>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<style>
    .details td {
        width: 400px !important;
    }

    .details td img {
        width: 100% !important;
        height: 300px !important;
    }
</style>
<!-- Fichiers Plugins JS  -->
<script src="assets/plugins/simple-datatables/simple-datatables.js"></script>
<script src="assets/plugins/tinymce/tinymce.min.js"></script>
<?php include('layouts/footer.php') ?>
<?php include('layouts/header.php') ?>
<?php include('functions/viewRapport.func.php') ?>

<!-- Fichiers Plugins CSS  -->
<link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste de tous les rapports du personnel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion des élèves</li>
                <li class="breadcrumb-item active">Voir rapports journaliers</li>
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
                                <button type="submit" name="truncate_rapport" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer tous les rapports du personnel de JoSchool ?') " title="Attention !"> <i class="bi bi-trash"></i> Supprimer tous les rapports du personnel</button>
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
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Sexe</th>
                                        <th scope="col">objet</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($horaires)) {
                                        foreach ($horaires as $horaire) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $horaire->id_util ?></th>
                                                <td><img src="assets/img/utils/<?= $horaire->image_util ?>" alt="<?= $horaire->id_util ?>" width="50" height="50" class="img-fluid img-thumbnail"></td>
                                                <td><?= $horaire->nom_util ?></td>
                                                <td><?= $horaire->prenom_util ?></td>
                                                <td><?= $horaire->sexe_util ?></td>
                                                <td><?= $horaire->objet_rapport ?></td>
                                                <td>
                                                    <!--  Modal view -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-<?= $horaire->id_rapport ?>">
                                                        <i class="bi bi-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="modalView-<?= $horaire->id_rapport ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="assets/img/utils/<?= $horaire->image_util ?>" alt="<?= $horaire->id_util ?>" class="img-fluid img-thumbnail">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="details">
                                                                                <tr>
                                                                                    <td>Matricule du personnel </td>
                                                                                    <td>: <?= $horaire->matricule_eleve ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Nom </td>
                                                                                    <td>: <?= $horaire->nom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Prenom </td>
                                                                                    <td>: <?= $horaire->prenom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sexe </td>
                                                                                    <td>: <?= $horaire->sexe_util ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Objet </td>
                                                                                    <td>: <?= $horaire->objet_rapport ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <b>Contenu :</b> <br> <?= $horaire->contenu_rapport ?>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Modal view-->




                                                    <a href="deletRapport.php?id_rapport=<?= $horaire->id_rapport ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer ce rapport ?') " data-toggle="tooltip" title="Attention !"><i class="bi bi-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h3 class="box-title text-center">Aucun rapport soumis </h3>

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


<!-- ======= Footer ======= -->
<?php include('layouts/footer.php') ?>
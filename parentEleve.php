<?php include('layouts/header.php') ?>
<?php include('functions/parentEleve.func.php') ?>



<!-- Fichiers Plugins CSS  -->
<link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste de tous les parents d'élèves</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion des élèves</li>
                <li class="breadcrumb-item active">Parents d'élèves</li>
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
                                <button type="submit" name="truncate_parent" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer tous les parents des élèves de JoSchool ?') " title="Attention !"> <i class="bi bi-trash"></i> Supprimer tous les parents d'élèves</button>
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
                                        <th scope="col">Matricule élève</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>

                                        <th scope="col">Sexe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($parents)) {
                                        foreach ($parents as $parent) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $parent->matricule_eleve ?></th>
                                                <td><img src="assets/img/utils/<?= $parent->image_util ?>" alt="<?= $parent->id_util ?>" width="50" height="50" class="img-fluid img-thumbnail"></td>
                                                <td><?= $parent->nom_util ?></td>
                                                <td><?= $parent->prenom_util ?></td>
                                                <td><?= $parent->sexe_util ?></td>
                                                <td>
                                                    <!--  Modal view -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-<?= $parent->id_util ?>">
                                                        <i class="bi bi-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="modalView-<?= $parent->id_util ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="assets/img/utils/<?= $parent->image_util ?>" alt="<?= $parent->id_util ?>" style="height: 300px !important;" class="img-fluid img-thumbnail">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="details">
                                                                                <tr>
                                                                                    <td>Matricule de l'élève </td>
                                                                                    <td>: <?= $parent->matricule_eleve ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Nom </td>
                                                                                    <td>: <?= $parent->nom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Prenom </td>
                                                                                    <td>: <?= $parent->prenom_util ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sexe </td>
                                                                                    <td>: <?= $parent->sexe_util ?></td>
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




                                                    <a href="deletUtil.php?id_util=<?= $parent->id_util ?>&id_grade=<?= $parent->id_grade ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer ce parent ?') " data-toggle="tooltip" title="Attention !"><i class="bi bi-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h3 class="box-title text-center">Aucun parent inscrit </h3>

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
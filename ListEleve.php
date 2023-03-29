<?php include('layouts/header.php') ?>
<?php include('functions/ListEleve.func.php') ?>

<!-- Fichiers Plugins CSS  -->
<link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste des élèves</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Gestion des élèves</li>
                <li class="breadcrumb-item active">Liste des tous les élèves</li>
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
                                <button type="submit" name="truncate_eleves" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer tous les élèves de JoSchool ?') " title="Attention !"> <i class="bi bi-trash"></i> Supprimer tous les élèves</button>
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
                                        <th scope="col">Age</th>
                                        <th scope="col">Sexe</th>
                                        <th scope="col">Option</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($eleves)) {
                                        foreach ($eleves as $eleve) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $eleve->id_eleve ?></th>
                                                <td><img src="assets/img/eleves/<?= $eleve->image_eleve ?>" alt="<?= $eleve->id_eleve ?>" width="50" height="50" class="img-fluid img-thumbnail"></td>
                                                <td><?= $eleve->nom_eleve ?></td>
                                                <td><?= date('Y') - $eleve->date_naissance_eleve; ?></td>
                                                <td><?= $eleve->nom_sexe ?></td>
                                                <td><?= $eleve->nom_option ?></td>
                                                <td><?= $eleve->nom_classe ?></td>
                                                <td>
                                                    <!--  Modal view -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-<?= $eleve->id_eleve ?>">
                                                        <i class="bi bi-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="modalView-<?= $eleve->id_eleve ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="assets/img/eleves/<?= $eleve->image_eleve ?>" alt="<?= $eleve->id_eleve ?>" style="height: 300px !important;" class="img-fluid img-thumbnail">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="details">
                                                                                <tr>
                                                                                    <td>Matricule </td>
                                                                                    <td>: <?= $eleve->id_eleve ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Nom </td>
                                                                                    <td>: <?= $eleve->nom_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Post-nom </td>
                                                                                    <td>: <?= $eleve->postnom_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Prenom </td>
                                                                                    <td>: <?= $eleve->prenom_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sexe </td>
                                                                                    <td>: <?= $eleve->nom_sexe ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Année de naissance </td>
                                                                                    <td>: <?= $eleve->date_naissance_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Lieu de naissance </td>
                                                                                    <td>: <?= $eleve->lieu_naissance_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Date d'inscription </td>
                                                                                    <td>: <?= $eleve->date_inscription_eleve ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Option </td>
                                                                                    <td>: <?= $eleve->nom_option ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Classe </td>
                                                                                    <td>: <?= $eleve->nom_classe ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Statut </td>
                                                                                    <td>: <?= $eleve->statut_eleve ?></td>
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
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit-<?= $eleve->id_eleve ?>">
                                                        <i class="bi bi-pen"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalEdit-<?= $eleve->id_eleve ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">.Editer/Modifier les details</h5>
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

                                                                                            <input type="hidden" value="<?= $eleve->id_eleve ?>" name="id_eleve">
                                                                                            <div class="row mb-3">
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="text" name="nom_eleve" class="form-control" id="floatingInput" value="<?= $eleve->nom_eleve ?>">
                                                                                                        <label for="floatingInput">Nom</label>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="text" name="postnom_eleve" class="form-control" id="floatingPassword" value="<?= $eleve->postnom_eleve ?>">
                                                                                                        <label for="floatingPassword">Post-nom</label>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="text" name="prenom_eleve" class="form-control" id="floatingPassword" value="<?= $eleve->prenom_eleve ?>">
                                                                                                        <label for="floatingPassword">Prenom</label>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="number" name="date_naissance_eleve" class="form-control" id="floatingPassword" value="<?= $eleve->date_naissance_eleve ?>">
                                                                                                        <label for="floatingPassword">Année de naissance</label>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="text" name="lieu_naissance_eleve" class="form-control" id="floatingPassword" value="<?= $eleve->lieu_naissance_eleve ?>">
                                                                                                        <label for="floatingPassword">Lieu de naissance</label>
                                                                                                    </div>




                                                                                                    <div class="row mb-3">
                                                                                                        <label for="inputNumber">Photo</label>
                                                                                                        <div class="col-sm-10">
                                                                                                            <input class="form-control" type="file" id="formFile" name="image_eleve">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <select name="id_sexe" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                                                            <?php foreach ($sexes as $sexe) : ?>
                                                                                                                <option value="<?= $sexe->id_sexe ?>" <?= ($sexe->id_sexe == $eleve->id_sexe) ? 'selected' : '' ?>><?= $sexe->nom_sexe ?></option>
                                                                                                            <?php endforeach;  ?>
                                                                                                        </select>
                                                                                                        <label for="floatingSelect">Sexe</label>
                                                                                                    </div>


                                                                                                    <div class="form-floating mb-3">
                                                                                                        <select name="id_option" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                                                            <?php foreach ($options as $option) : ?>
                                                                                                                <option value="<?= $option->id_option ?>" <?= ($option->id_option == $eleve->id_option) ? 'selected' : '' ?>><?= $option->nom_option ?></option>
                                                                                                            <?php endforeach;  ?>
                                                                                                        </select>
                                                                                                        <label for="floatingSelect">Option</label>
                                                                                                    </div>


                                                                                                    <div class="form-floating mb-3">
                                                                                                        <select name="id_classe" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                                                            <?php foreach ($classes as $classe) : ?>
                                                                                                                <option value="<?= $classe->id_classe ?>" <?= ($classe->id_classe == $eleve->id_classe) ? 'selected' : '' ?>><?= $classe->nom_classe ?></option>
                                                                                                            <?php endforeach;  ?>
                                                                                                        </select>
                                                                                                        <label for="floatingSelect">Classe</label>
                                                                                                    </div>


                                                                                                    <div class="row mb-5">
                                                                                                        <div class="col-sm-10">
                                                                                                            <div class="form-check form-switch">
                                                                                                                <input class="form-check-input" name="statut_eleve" type="checkbox" id="flexSwitchCheckDefault" <?= ($eleve->statut_eleve == 1) ? 'checked' : '' ?>>
                                                                                                                <label class="form-check-label" for="flexSwitchCheckDefault">Frais payé</label>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="row mb-3">

                                                                                                        <button type="submit" name="submit" class="btn btn-primary">Modifier les details</button>


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

                                                    <a href="deletEleve.php?id_eleve=<?= $eleve->id_eleve ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer cet élève ?') " data-toggle="tooltip" title="Attention !"><i class="bi bi-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h3 class="box-title text-center">Aucun élève inscrit </h3>

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
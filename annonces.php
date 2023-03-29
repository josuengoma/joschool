<?php include('layouts/header.php') ?>
<?php include('functions/annonces.func.php') ?>

<!-- Fichiers Plugins CSS  -->
<link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Annonces</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Tableau de bord</li>
                <li class="breadcrumb-item">Autres gestions</li>
                <li class="breadcrumb-item active">Annonces</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">

                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <button type="submit" name="truncate_annonce" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer toutes les annonces de JoSchool ?') " title="Attention !"> <i class="bi bi-trash"></i> Supprimer tous les annonces</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <!-- Large Modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                                        Créez une nouvelle annonce
                                    </button>
                                </div>
                                <div class="modal fade" id="largeModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajoutez une annonce</h5>
                                                <h5 class="modal-title">
                                                    <?php if (isset($error)) {
                                                        echo $error;
                                                    } ?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Advanced Form Elements -->
                                                <form method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" value="<?= $annonce->id_annonce ?>" name="id_annonce">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-10">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="titre_annonce" class="form-control" id="floatingInput" value="<?php if (isset($title)) {
                                                                                                                                                            echo $title;
                                                                                                                                                        } ?>">
                                                                <label for="floatingInput">Titre</label>
                                                            </div>

                                                            <div class="form-floating mb-3">
                                                                <textarea name="contenu_annonce" id="" cols="30" rows="10" class="form-control"><?php if (isset($content)) {
                                                                                                                                                    echo $content;
                                                                                                                                                } ?>"</textarea>
                                                                <label for="floatingPassword">Contenu</label>
                                                            </div>






                                                            <div class="row mb-3">
                                                                <label for="inputNumber">Image</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="file" id="formFile" name="image_annonce">
                                                                </div>
                                                            </div>




                                                            <div class="row mb-5">
                                                                <div class="col-sm-10">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" name="visibilite_annonce" type="checkbox" id="flexSwitchCheckDefault">
                                                                        <label class="form-check-label" for="flexSwitchCheckDefault">Visibilité</label>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">

                                                                <button type="submit" name="creatAnnonce" class="btn btn-primary">créez une annonce</button>

                                                            </div>
                                                        </div>

                                                </form> <!-- End General Form Elements -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Large Modal-->
                            </div>


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
                                        <th scope="col">Auteur</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Contenue</th>
                                        <th scope="col">Visibilité</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($annonces)) {
                                        foreach ($annonces as $annonce) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $annonce->id_util ?></th>
                                                <td><img src="assets/img/annonces/<?= $annonce->image_annonce ?>" alt="<?= $annonce->titre_annonce ?>" width="50" height="50" class="img-fluid img-thumbnail"></td>
                                                <td><?= $annonce->nom_util ?> - <?= $annonce->prenom_util ?></td>
                                                <td><?= $annonce->titre_annonce ?></td>
                                                <td><?= substr($annonce->contenu_annonce,  0, 10) ?></td>
                                                <td><span class="text-white badge bg-<?php echo ($annonce->visibilite_annonce == 1) ? 'success' : 'danger' ?>"><?php echo ($annonce->visibilite_annonce == 1) ? 'Visible' : 'Masquée' ?></span></td>
                                                <td>
                                                    <!--  Modal view -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-<?= $annonce->id_annonce ?>">
                                                        <i class="bi bi-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="modalView-<?= $annonce->id_annonce ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="assets/img/annonces/<?= $annonce->image_annonce ?>" alt="<?= $annonce->titre_annonce ?>" class="img-fluid img-thumbnail">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table class="details">
                                                                                <tr>
                                                                                    <td>Auteur </td>
                                                                                    <td>: <?= $annonce->nom_util ?> - <?= $annonce->prenom_util ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>Titre </td>
                                                                                    <td>: <?= $annonce->titre_annonce ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Date de publication </td>
                                                                                    <td>: <?= $annonce->date_annonce ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Visibilité </td>
                                                                                    <td>: <span class="badge bg-<?php echo ($annonce->visibilite_annonce == 1) ? 'success' : 'danger' ?>"><?php echo ($annonce->visibilite_annonce == 1) ? 'Visible' : 'Masquée' ?></span></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <b>Contenu :</b> <br> <?= $annonce->contenu_annonce ?>
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
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit-<?= $annonce->id_annonce ?>">
                                                        <i class="bi bi-pen"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalEdit-<?= $annonce->id_annonce ?>" tabindex="-1">
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

                                                                                            <input type="hidden" value="<?= $annonce->id_annonce ?>" name="id_annonce">
                                                                                            <div class="row mb-3">
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="form-floating mb-3">
                                                                                                        <input type="text" name="titre_annonce" class="form-control" id="floatingInput" value="<?= $annonce->titre_annonce ?>">
                                                                                                        <label for="floatingInput">Titre</label>
                                                                                                    </div>

                                                                                                    <div class="form-floating mb-3">
                                                                                                        <textarea name="contenu_annonce" id="" cols="30" rows="10" class="form-control"><?= $annonce->contenu_annonce ?></textarea>
                                                                                                        <label for="floatingPassword">Contenu</label>
                                                                                                    </div>






                                                                                                    <div class="row mb-3">
                                                                                                        <label for="inputNumber">Image</label>
                                                                                                        <div class="col-sm-10">
                                                                                                            <input class="form-control" type="file" id="formFile" name="image_annonce">
                                                                                                        </div>
                                                                                                    </div>




                                                                                                    <div class="row mb-5">
                                                                                                        <div class="col-sm-10">
                                                                                                            <div class="form-check form-switch">
                                                                                                                <input class="form-check-input" name="visibilite_annonce" type="checkbox" id="flexSwitchCheckDefault" <?= ($annonce->visibilite_annonce == 1) ? 'checked' : '' ?>>
                                                                                                                <label class="form-check-label" for="flexSwitchCheckDefault">Visibilité</label>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="row mb-3">

                                                                                                        <button type="submit" name="updatAnnonce" class="btn btn-primary">Modifier les details</button>


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


                                                    <a href="deletAnnonce.php?id_annonce=<?= $annonce->id_annonce ?>" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûre de supprimer cette annonce ?') " data-toggle="tooltip" title="Attention !"><i class="bi bi-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h3 class="box-title text-center">Aucune annonce publiée </h3>

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
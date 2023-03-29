<?php include('functions/db.php');
include('functions/header.func.php');


if ($util) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title> -|- JoSchool </title>
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

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">JoSchool</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Recherche" title="Entrez un mot à rechercher">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div><!-- End Search Bar -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                Vous avez 4 notifications
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tous</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. avant</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Atque rerum nesciunt</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>1 hr. avant</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Sit rerum fuga</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>2 hrs. avant</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Dicta reprehenderit</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>4 hrs. avant</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Voir toutes les notifications</a>
                            </li>

                        </ul><!-- End Notification Dropdown Items -->

                    </li><!-- End Notification Nav -->

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">3</span>
                        </a><!-- End Messages Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                Vous avez 3 messages
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tous</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                    <div>
                                        <h4>Maria Hudson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>4 hrs. avant</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                    <div>
                                        <h4>Anna Nelson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>6 hrs. avant</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                    <div>
                                        <h4>David Muldon</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>8 hrs. avant</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">Voir tous les messages</a>
                            </li>

                        </ul><!-- End Messages Dropdown Items -->

                    </li><!-- End Messages Nav -->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="assets/img/utils/<?= $util->image_util ?>" alt="<?= $util->nom_util ?>" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ("$util->nom_util $util->prenom_util")  ?></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6><?php echo ("$util->nom_util $util->prenom_util")  ?></h6>
                                <span><?= $util->nom_grade ?></span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="profileUtil.php?id_util=<?= $util->id_util ?>">
                                    <i class="bi bi-person"></i>
                                    <span>Mon profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="help.php?id_util=<?= $util->id_util ?>">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Aide</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Deconnexion</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'home') ? '' : 'collapsed' ?>" href="home.php?page=home">
                        <i class="bi bi-grid"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li><!-- End Dashboard Nav class="active"-->

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'inscription' || 'bulletin' || 'parentEleve' || 'payement' || 'ListEleve') ? '' : 'collapsed' ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Gestion des élèves</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="inscription.php?page=inscription" class="<?php echo ($_GET['page'] == 'inscription') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Inscription</span>
                            </a>
                        </li>
                        <li>
                            <a href="bulletin.php?page=bulletin" class="<?php echo ($_GET['page'] == 'bulletin') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Déliberation des bulletins</span>
                            </a>
                        </li>
                        <li>
                            <a href="parentEleve.php?page=parentEleve" class="<?php echo ($_GET['page'] == 'parentEleve') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Parents d'élèves <span class="badge bg-info"><?php echo $compteurListParent ?></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="payement.php?page=payement" class="<?php echo ($_GET['page'] == 'payement') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Paiement des frais</span>
                            </a>
                        </li>
                        <li>
                            <a href="ListEleve.php?page=ListEleve" class="<?php echo ($_GET['page'] == 'ListEleve') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Liste de tous élèves <span class="badge bg-warning"><?php echo $compteurListEleve ?></span></span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav -->

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'ListPersonel' || 'creatHoraire' || 'accountValidate' || 'viewRapport') ? '' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Gestion du personnel</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="ListPersonel.php?page=ListPersonel" class="<?php echo ($_GET['page'] == 'ListPersonel') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Liste du personnel <span class="badge bg-success"><?php echo $compteurListPersonel ?></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="creatHoraire.php?page=creatHoraire" class="<?php echo ($_GET['page'] == 'creatHoraire') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Attribution charge horaire</span>
                            </a>
                        </li>
                        <li>
                            <a href="accountValidate.php?page=accountValidate" class="<?php echo ($_GET['page'] == 'accountValidate') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Validation de compte <span class="badge bg-danger"><?php echo $compteurAccountNoValid ?></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="viewRapport.php?page=viewRapport" class="<?php echo ($_GET['page'] == 'viewRapport') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Voir rapports journaliers <span class="badge bg-warning"><?php echo $compteurRapport ?></span></span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'annonces') ? '' : 'collapsed' ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Autes gestions</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="annonces.php?page=annonces" class="<?php echo ($_GET['page'] == 'annonces') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Annonces <span class="badge bg-warning"><?php echo $compteurAnnonce ?></span></span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Tables Nav -->



                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link  <?php echo ($_GET['page'] == 'profileUtil') ? '' : 'collapsed' ?>" href="profileUtil.php?page=profileUtil">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link  <?php echo ($_GET['page'] == 'help') ? '' : 'collapsed' ?>" href="help.php?page=help">
                        <i class="bi bi-question-circle"></i>
                        <span>Aide</span>
                    </a>
                </li><!-- End F.A.Q Page Nav -->

                <li class="nav-item">
                    <a class="nav-link  <?php echo ($_GET['page'] == 'contact') ? '' : 'collapsed' ?>" href="contact.php?page=contact">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="register.php">
                        <i class="bi bi-card-list"></i>
                        <span>Ajouter un utilisateur</span>
                    </a>
                </li><!-- End Register Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="logout.php">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Deconnexion</span>
                    </a>
                </li><!-- End Login Page Nav -->



            </ul>

        </aside><!-- End Sidebar-->

    <?php
} else {
    header('Location: 404.php');
}
    ?>
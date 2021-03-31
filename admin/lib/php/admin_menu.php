<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'accueil.php';
}
?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Jeux vidéos   <i class="fas fa-gamepad"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='accueil.php') {print 'active';}?>" href="index_.php?page=accueil_admin.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='affichageJeux.php') {print 'active';}?>" href="index_.php?page=affichageJeux.php">Jeux encodés</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php if($page=='modification.php' || $page=='suppression.php') {print 'active';}?>" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=ajoutJeu.php">Ajout</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=modification.php">Modification</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index_.php?page=suppression.php">Suppression</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav r-3 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php if($page=='connexion.php' || $page=='deconnexion.php' || $page=='inscription.php') {print 'active';}?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Connexion
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=connexion.php">Connexion</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=deconnexion.php">Déconnexion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index_.php?page=inscription.php">Inscription</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<br><br><br>
<?php
$jeux = new jeuxBD($cnx);
$listeJeux = $jeux->getJeux();
?>
<div class="container">
    <center>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm w-75 h-md-250">
            <div class="col-auto d-none d-lg-block">
                <img src="./admin/images/<?php print $listeJeux[$_GET['idJeu']-1]->photo;?>" alt="Image non trouvée" height="400px" width="300px">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-5  underline"><?php print $listeJeux[$_GET['idJeu']-1]->nomJeu;?></h3>
                <strong class="mb-4"><?php print $listeJeux[$_GET['idJeu']-1]->plateforme;?></strong>
                <p class="mb-4"><?php print $listeJeux[$_GET['idJeu']-1]->editeur;?></p>
                <p class="mb-4"><?php print $listeJeux[$_GET['idJeu']-1]->anneeSortie;?></p>
                <p class="mb-4"><?php print $listeJeux[$_GET['idJeu']-1]->note;?>/5</p>
            </div>
        </div>
    </center>
</div>
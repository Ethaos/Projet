<br><br>
<?php
if(isset($_POST['submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $j = new JeuxBD($cnx);
    $jeu = $j->setJeu($nomJeu,$plateforme,$editeur,$anneesortie,$note);
    print $nomJeu." ".$plateforme." ".$editeur." ".$anneesortie." ".$note;
    var_dump($jeu);
}
?>
<p>
    <?php
    if(isset($message)){
        print $message;
    }
    ?>
</p>
<div class="container" style="width: 70%">
    <form class="row md-6">
        <h3 class="underline">Ajout d'un jeu</h3>
    </form>
    <form class="row md-6" action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
        <div class="col-md-3">
            <label for="nom" class="form-label">Nom du jeu</label>
            <input name="nomJeu" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="plateforme" class="form-label">Plateforme</label>
            <input name="plateforme" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="editeur" class="form-label">Editeur</label>
            <input name="editeur" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="anneeSortie" class="form-label">Année de sortie</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Choisissez une année</option>
                <?php
                for($i=1990 ; $i<=2021 ; $i++){?>
                    <option name="anneesortie" value="<?php print $i?>"><?php print $i?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="note" class="form-label">Note</label>
            <input name="note" type="text" class="form-control">
        </div>
    </form>
    <!--<form class="row md-6">
        <div class="col-md-3">
            <label for="formFileSm" class="form-label">Choisissez une image du jeu</label>
            <input class="form-control form-control" id="formFile" type="file">
        </div>
    </form>-->
    <br>
    <div class="col-12">
        <button type="submit" class="w-100 btn btn-lg btn-dark text-white" name="submit">Ajouter</button>
    </div>
</div>
<br><br><br>

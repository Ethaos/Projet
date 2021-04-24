<br><br>
<?php
if(isset($_POST['submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $j = new JeuxBD($cnx);
    $jeu = $j->ajoutJeu($nomJeu,$plateforme,$editeur,$anneesortie,$note);
    print $nomJeu." ".$plateforme." ".$editeur." ".$anneesortie." ".$note;
    var_dump($jeu);
}
?>
<div class="container" style="width: 60%">
    <h3 class="underline">Ajout d'un jeu</h3>
    <form class="row md-6" action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
        <div class="col-md-3">
            <label for="nomJeu" class="form-label">Nom du jeu</label>
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
        <div class="col-md-2">
            <label for="anneesrotei" class="form-label">Anée de sortie</label>
            <input name="anneesortie" type="text" class="form-control">
        </div>
        <div class="col-md-1">
            <label for="note" class="form-label">Note</label>
            <input name="note" type="text" class="form-control" placeholder="  /5">
        </div>
        <div class="col-2">
            <button id="submit" type="submit" class="w-100 btn btn-lg btn-dark text-white" name="submit">Ajouter</button>
        </div>
    </form>
</div>
<br><br><br>

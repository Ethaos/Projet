<br><br>
<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1){
    if(isset($_POST['submitJeuAdmin'])){
        extract($_POST,EXTR_OVERWRITE);
        $encodeur = $_SESSION['prenom'];
        $j = new JeuxBD($cnx);
        $jeu = $j->ajoutJeu($nomjeu,$plateforme,$editeur,$anneesortie,$note,$encodeur);
        if($jeu==1){
            ?>
            <center>
                <div class="alert alert-success" role="alert" style="width: 20%">
                    Jeu encodé !
                    <meta http-equiv="refresh": content="0; URl=./index_.php?page=afficheModif.php">
                </div>
            </center>
            <?php
        }
    }
?>
    <div class="container" style="width: 60%">
        <h3 class="underline">Ajout d'un jeu</h3>
        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="row md-6">
                <div class="col-md-3">
                    <label for="nomjeu" class="form-label">Nom du jeu</label>
                    <input name="nomjeu" id="nomjeu" type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="plateforme" class="form-label">Plateforme</label>
                    <input name="plateforme" id="plateforme" type="text" class="form-control">
                </div>
            </div>
            <div class="row md-6">
                <div class="col-md-3">
                    <label for="editeur" class="form-label">Editeur</label>
                    <input name="editeur" id="editeur" type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="anneesortie" class="form-label">Année de sortie</label>
                    <input name="anneesortie" id="anneesortie" type="text" class="form-control">
                </div>
            </div>
            <div class="row md-6">
                <div class="col-md-1">
                    <label for="note" class="form-label">Note</label>
                    <input name="note" id="note" type="text" class="form-control" placeholder="  /5">
                </div>
            </div>
            <div class="col-2">
                <br>
                <button type="submit" class="w-100 btn btn-md btn-custom text-white" id="submitJeuAdmin" name="submitJeuAdmin">Ajouter</button>
            </div>
        </form>
    </div>
<?php
    }
}
?>
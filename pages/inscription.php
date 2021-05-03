<br><br>
<?php
if(isset($_POST['inscription'])){
    print 'BONJOUR';
    extract($_POST,EXTR_OVERWRITE);
    $u = new UserBD($cnx);
    $user = $u->inscription($nom,$prenom,$mail,$pwd);
    if($user==1){
        ?>
        <center>
            <div class="alert alert-success" role="alert" style="width: 20%">
                Inscription réussie !
                <meta http-equiv="refresh": content="0; URl=./index_.php?page=connexion.php">
            </div>
        </center>
        <?php
    }
}
?>
<div class="container" style="width: 70%">
    <h3 class="underline">Inscription</h3>
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="row md-6">
            <div class="col-md-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="col-md-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
        </div>
        <div class="row md-6">
            <div class="col-md-3">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="col-md-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
        </div>
        <div class="row md-6">
            <div class="col-md-3">
                <br>
                <button class="btn btn-custom text-white" type="submit" id="inscription" name="inscription">S'enregistrer</button>
            </div>
        </div>
    </form>
</div>


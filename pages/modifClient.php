<br><br><br>
<?php include('./admin/lib/php/verifClient.php');
$user = new UserBD($cnx);
if(isset($_POST['modifier'])){
    extract($_GET,EXTR_OVERWRITE);
}
?>

<div class="container" style="width: 45%">
    <h2 class="underline">Modification</h2>
    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="col-md-5">
            <label for="mail" class="form-label">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail">
        </div>
        <div class="col-md-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="col-md-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="col-md-4">
            <label for="pwd" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="pwd" name="pwd">
        </div>
        <div class="col-md-4">
            <label for="pwd" class="form-label">Confirmation</label>
            <input type="password" class="form-control" id="confirmpwd" name="confirmpwd">
        </div>
        <div class="col-12">
            <input type="hidden" name="iduser" id="iduser">
            <button type="submit" class="btn btn-custom text-white" id="modifier">Mettre à jour</button>
            <a class="btn btn-custom text-white" href="index_.php?page=pageClient.php" role="button">
                Retour
            </a>
        </div>
    </form>
</div>
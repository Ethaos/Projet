<br><br><br>
<?php include('./admin/lib/php/verifClient.php');
$u = new UserBD($cnx);
if(isset($_POST['modifiermail'])){
    extract($_POST,EXTR_OVERWRITE);
    $user = $u->updateMail($iduser,$mailuser);
}
if(isset($_POST['modifierPWD'])){
    extract($_POST,EXTR_OVERWRITE);
    $user = $u->updatePWD($iduser,$pwd);
}
if($user==1){
    ?>
    <center>
        <div class="alert alert-success" role="alert" style="width: 20%">
            Modification effectuée !
            <meta http-equiv="refresh": content="0; URl=./index_.php?page=pageClient.php">
        </div>
    </center>
    <?php
}
?>

<center>
    <form class="row-md-6" action="<?php print $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="container" style="width: 45%">
        <h2 class="underline">Modification</h2>
            <input type="hidden" name="iduser" id="iduser" value="<?php print $_SESSION['iduser'] ?>">
            <table class="table">
                <tbody>
                <tr>
                    <td scope="row">
                        <div class="col-10">
                            <label for="mailuser" class="form-label">Mail</label>
                            <input type="text" class="form-control" id="mailuser" name="mailuser">
                        </div>
                    </td>
                    <td scope="row">
                        <div class="col-12">
                            <label for="modifiermail" class="form-label">Mettre à jour le mail</label>
                            <br>
                            <button type="submit" class="btn btn-custom text-white" name="modifiermail" id="modifiermail">Mettre à jour</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-8">
                            <label for="pwd" class="form-label">Mot de passe</label>
                            <br>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                            <label for="confirmpwd" class="form-label">Confirmation</label>
                            <input type="password" class="form-control" id="confirmpwd" name="confirmpwd">
                        </div>
                    </td>
                    <td>
                        <div class="col-12">
                            <label for="pwd" class="form-label">Mettre à jour le mot de passe</label>
                            <br><br>
                            <button type="submit" class="btn btn-custom text-white" name="modifierPWD" id="modifierPWD">Mettre à jour</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        <a class="btn btn-custom text-white center" href="index_.php?page=pageClient.php" role="button">
            Retour
        </a>
    </div>
    </form>
</center>

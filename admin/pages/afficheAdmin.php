<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
if($_SESSION['admin']==1){
    $user = new UserBD($cnx);
    $listeUser = $user->getClient();
    $nbr = count($listeUser);

    if(isset($_POST['submitDowngrade'])){
        extract($_POST,EXTR_OVERWRITE);
        $user = new UserBD($cnx);
        $u = $user->downgradeAdmin($iduser);
    }
    ?>
    <br>
    <h3 class="text-center underline">Liste des clients</h3>
    <br>
    <div class="container" style="width: 40%">
        <table class="table table-striped table-bordered">
            <thead>
            <tr class="bg-custom text-white text-center">
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Mail</th>
                <th scope="col">Devenir client</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0 ; $i<$nbr ; $i++){
                if($listeUser[$i]->status == true){
                    ?>
                    <tr>
                        <td scope="row"><?php print $listeUser[$i]->prenom;?></td>
                        <td scope="row"><?php print $listeUser[$i]->nom;?></td>
                        <td scope="row md-4"><?php print $listeUser[$i]->mail;?></td>
                        <td scope="row">
                            <form action="<?php print $_SERVER['PHP_SELF'];?>" method="POST">
                                <center>
                                    <input type="hidden" id="iduser" name="iduser" value="<?php print $listeUser[$i]->iduser;?>">
                                    <button class="w-60 btn btn-sm btn-custom text-white" id="submitDowngrade" type="submit" name="submitDowngrade">Downgrade</button>
                                </center>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
}
}
?>

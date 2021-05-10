<?php
include('./admin/lib/php/verifClient.php');
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==2){
            $user = new UserBD($cnx);
            $listeUser = $user->getClientById2($_SESSION['iduser']);
            $nbr = count($listeUser);
        ?>
        <br>
        <h3 class="text-center underline">Bonjour, <?php print $_SESSION['prenom']?></h3>
        <br>
        <div class="container" style="width: 30%">
            <table class="table table-striped table-bordered">
                <tbody>
                <?php
                for($i=0 ; $i<$nbr ; $i++){
                    ?>
                    <tr>
                        <td class="bold">
                            Prénom
                        </td>
                        <td scope="row">
                            <?php print $listeUser[$i]->prenom;?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">
                            Nom
                        </td>
                        <td>
                            <?php print $listeUser[$i]->nom;?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">
                           Mail
                        </td>
                        <td>
                            <?php print $listeUser[$i]->mail;?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <center>
                <a class="w-60 btn btn-orange border border-warning text-white" href="index_.php?page=modifClient.php" type="button">Modifier</a>
            </center>
            <?php
                }
                ?>
        </div>
<?php
    }
}
?>
<?php
include('./admin/lib/php/verifClient.php');
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==2){
            $user = new UserBD($cnx);
            $listeUser = $user->getClientByMail($_SESSION['mail']);
            $nbr = count($listeUser);
        ?>
        <br>
        <h3 class="text-center underline">Bonjour, <?php print $_SESSION['prenom']?></h3>
        <br>
        <div class="container" style="width: 45%">
            <table class="table table-striped table-bordered">
                <tbody>
                <?php
                for($i=0 ; $i<$nbr ; $i++){
                    ?>
                    <tr>
                        <td>
                            Prénom
                        </td>
                        <td scope="row">
                            <?php print $listeUser[$i]->prenom;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nom
                        </td>
                        <td>
                            <?php print $listeUser[$i]->nom;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Mail
                        </td>
                        <td>
                            <?php print $listeUser[$i]->mail;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mot de passe
                        </td>
                        <td>
                            <?php print $listeUser[$i]->password;?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
            <center>
                <a class="w-60 btn btn-orange border border-warning text-white" href="index_.php?page=modifClient.php" type="button">Modifier</a>
            </center>
        </div>
<?php
    }
}
?>

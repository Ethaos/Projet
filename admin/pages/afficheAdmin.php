<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
    $user = new UserBD($cnx);
    $listeUser = $user->getClient();
    $nbr = count($listeUser);
    ?>
    <br>
    <h3 class="text-center underline">Liste des clients</h3>
    <br>
    <div class="container" style="width: 40%">
        <table class="table table-striped table-bordered">
            <thead>
            <tr class="bg-custom text-white text-center">
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Mail</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0 ; $i<$nbr ; $i++){
                if($listeUser[$i]->status == true){
                    ?>
                    <tr>
                        <td scope="row"><?php print $listeUser[$i]->nom;?></td>
                        <td scope="row"><?php print $listeUser[$i]->prenom;?></td>
                        <td scope="row md-4"><?php print $listeUser[$i]->mail;?></td>
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
?>

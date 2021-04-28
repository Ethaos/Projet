<?php
    $jeux = new JeuxBD($cnx);
    $listeJeux = $jeux->getJeux();
    $nbr = count($listeJeux);
?>
<br>
<h3 class="text-center underline">Liste des jeux</h3>
<br>
<div class="container" style="width: 70%">
    <table class="table table-striped table-bordered">
        <thead>
        <tr class="bg-custom text-white text-center">
            <th scope="col">Nom</th>
            <th scope="col">Plateforme</th>
            <th scope="col">Editeur</th>
            <th scope="col">Année</th>
            <th scope="col">Note /5</th>
            <th scope="col">Page du jeu</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0 ; $i<$nbr ; $i++){
            ?>
            <tr>
                <td scope=""><?php print $listeJeux[$i]->nomjeu;?></td>
                <td scope="row"><?php print $listeJeux[$i]->plateforme;?></td>
                <td scope="row"><?php print $listeJeux[$i]->editeur;?></td>
                <td scope="row"><?php print $listeJeux[$i]->anneesortie;?></td>
                <td scope="row"><?php print $listeJeux[$i]->note;?></td>
                <td scope="row">
                    <center>
                        <a class="btn btn-sm btn-clair text-white" href="index_.php?page=pageJeu.php&idJeu=<?php print $listeJeux[$i]->idjeu?>" role="button">
                            Voir
                        </a>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
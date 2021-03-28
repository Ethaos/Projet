<?php
    $jeux = new JeuxBD($cnx);
    $listeJeux = $jeux->getJeux();
    $nbr = count($listeJeux);
?>
<br>
<h3 class="text-center underline">Liste des jeux</h3>
<br>
<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
        <tr class="bg-custom text-white text-center">
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Plateforme</th>
            <th scope="col">Editeur</th>
            <th scope="col">Année</th>
            <th scope="col">Note</th>
            <th scope="col">Page du jeu</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0 ; $i<$nbr ; $i++){
            ?>
            <tr>
                <td scope="row"><?php print $listeJeux[$i]->idJeu;?></td>
                <td scope="row"><?php print $listeJeux[$i]->nomJeu;?></td>
                <td scope="row"><?php print $listeJeux[$i]->plateforme;?></td>
                <td scope="row"><?php print $listeJeux[$i]->editeur;?></td>
                <td scope="row"><?php print $listeJeux[$i]->anneeSortie;?></td>
                <td scope="row"><?php print $listeJeux[$i]->note;?></td>
                <td scope="row">
                    <a class="btn btn-dark" href="index_.php?page=pageJeu.php&idJeu=<?php print $listeJeux[$i]->idJeu?>" role="button">
                        Voir
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
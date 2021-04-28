<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
$jeu = new JeuxBD($cnx);
$listeJeu = $jeu->getJeux();
//var_dump($listeJeu);
$nbr = count($listeJeu);
?>

<div class="container" style="width: 70%">
    <br>
    <table class="table">
        <thead>
        <tr class="center">
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Plateforme</th>
            <th scope="col">Editeur</th>
            <th scope="col">Année Sortie</th>
            <th scope="col">Note</th>
            <th scope="col">Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0 ; $i<$nbr ; $i++){
            ?>
            <tr>
                <th scope="row">
                    <?php print $listeJeu[$i]->idjeu;?>
                </th>
                <td>
                <span contenteditable="true" name="nomJeu" id="<?php print $listeJeu[$i]->idjeu;?>">
                    <?php print $listeJeu[$i]->nomjeu;?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="plateforme" id="<?php print $listeJeu[$i]->idjeu;?>">
                    <?php print $listeJeu[$i]->plateforme;?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="editeur" id="<?php print $listeJeu[$i]->idjeu;?>">
                    <?php print $listeJeu[$i]->editeur;?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="anneesortie" id="<?php print $listeJeu[$i]->idjeu;?>">
                    <?php print $listeJeu[$i]->anneesortie;?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="note" id="<?php print $listeJeu[$i]->idjeu;?>">
                    <?php print $listeJeu[$i]->note;?>
                </span>
                </td>
                <td>
                    <a id="<?php print $listeJeu[$i]->idjeu;?>" class="btn btn-sm btn-clair text-white" role="button">
                        <input type="hidden" name="id_produit" id="id_produit">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<?php
}
?>
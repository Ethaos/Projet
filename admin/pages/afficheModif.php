<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1){
        $jeu = new JeuxBD($cnx);
        $listeJeu = $jeu->getJeux();
        $ok=false;
        if($listeJeu != null){
            $ok=true;
            $nbr = count($listeJeu);
        }else{
            ?>
            <div class="center alert alert-danger text-center" role="alert" style="width: 20%">
                <p>Aucun jeu encodé !</p>
            </div>
                <?php
        }
        ?>

        <div class="container" style="width: 70%">
            <br>
            <h3 class="underline">Affichage, Modification et Suppression des jeux</h3>
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
                    <th scope="col">Encodeur</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Suppression</th>
                    <th scope="col">PDF</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($ok){
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
                                    <?php print round($listeJeu[$i]->note,2);?>
                                </span>
                            </td>
                            <td>
                                <span name="encodeur" id="<?php print $listeJeu[$i]->idjeu;?>">
                                    <?php print $listeJeu[$i]->encodeur;?>
                                </span>
                            </td>
                            <td>
                                <?php
                                if($listeJeu[$i]->photo==null){
                                    ?>
                                    <center>
                                        <div>
                                            <input type="hidden" name="idjeu" id="idjeu" value="<?php print $listeJeu[$i]->idjeu;?>">
                                            <input class="form-control form-control-sm" type="file" id="photo" name="photo" accept="image/*">
                                            <br>
                                            <button class="w-0 btn btn-sm btn-clair text-white" id="submitPhotoAdmin" type="submit" name="submitPhotoAdmin">Ajouter</button>
                                        </div>
                                    </center>
                                        <?php
                                }else{?>
                                    <span contenteditable="true" name="photo" id="<?php print $listeJeu[$i]->idjeu;?>">
                                        <?php print $listeJeu[$i]->photo;?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <center>
                                    <button class="w-60 btn btn-sm btn-red border border-danger text-white deletejeu" id="<?php print $listeJeu[$i]->idjeu;?>" type="submit" name="submitSuppr">Delete</button>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a class="w-60 btn btn-sm btn-orange border border-warning text-white" href="./index_.php?page=printPDF.php&idjeu=<?php print $listeJeu[$i]->idjeu; ?>">Print</a>
                                </center>
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
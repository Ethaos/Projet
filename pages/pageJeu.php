<br><br>
<?php
$jeux = new JeuxBD($cnx);
if(isset($_GET['idJeu'])){
    $listeJeux = $jeux->getJeuxById($_GET['idJeu']);
}else $listeJeux = $jeux->getJeux();
$nbr = count($listeJeux);
?>
<div class="container">
    <?php
    for($i=0;$i<$nbr;$i++) {
        ?>
            <center>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm w-75 h-md-250">
                    <div class="col-auto d-none d-lg-block">
                        <img src="./admin/images/<?php
                        if($listeJeux[$i]->photo==null){
                            print 'noImage.png';
                            $noimage = 1;
                        }else{
                            print $listeJeux[$i]->photo;
                            $noimage = 0;
                        }
                        ?>" alt="Image non trouvée" height="400px" width="300px">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-5  underline"><?php print $listeJeux[$i]->nomjeu;?></h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Plateforme</th>
                                <td>
                                    <span name="plateforme" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->plateforme;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Editeur</th>
                                <td>
                                    <span name="editeur" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->editeur;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Année</th>
                                <td>
                                    <span name="anneesortie" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->anneesortie;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Note</th>
                                <td>
                                    <span name="note" id="<?php print $listeJeux[$i]->idJeu;?>">
                                        <?php print round($listeJeux[$i]->note,2);?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Encodeur</th>
                                <td>
                                    <?php print $listeJeux[$i]->encodeur;?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        if(isset($_SESSION['admin'])==2){
                            ?>
                                <center>
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-sm" id="newNote" placeholder="Noter le jeu">
                                            <input type="hidden" name="idjeu" id="idjeu" value="<?php print $listeJeux[$i]->idjeu;?>">
                                            <input type="hidden" name="note" id="note" value="<?php print $listeJeux[$i]->note;?>">
                                            <input type="hidden" name="N" id="N">
                                            <button class="btn btn-sm btn-clair text-white" type="button" name="button" id="button">Ajouter</button>
                                        </div>
                                    </div>
                                </center>
                            <?php
                            if($noimage==1){
                                ?>
                                <center>
                                    <div class="col-sm-6">
                                        <label for="photo" class="form-label">Ajouter une image</label>
                                        <input type="hidden" name="idjeu" id="idjeu" value="<?php print $listeJeux[$i]->idjeu;?>">
                                        <input class="form-control form-control-sm" type="file" id="photo" name="photo" accept="image/*">
                                        <br>
                                        <button class="w-30 btn btn-sm btn-clair text-white" id="submitPhoto" type="submit" name="submitPhoto">Ajouter</button>
                                    </div>
                                </center>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </center>
        <?php
    }
    ?>
</div>
<center>
    <a class="btn btn-clair text-white" href="index_.php?page=affichageJeux.php" role="button">
        Retour
    </a>
</center>
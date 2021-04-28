<br><br>
<?php
$jeux = new JeuxBD($cnx);
if(isset($_GET['idJeu'])){
    $listeJeux = $jeux->getJeuxById($_GET['idJeu']);
}else $listeJeux = $jeux->getJeux();

$nbr = count($listeJeux);

if(isset($_POST['submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $j = new JeuxBD($cnx);
    $jeu = $j->ajoutPhoto($_GET['idJeu'],$photo);
    //var_dump($jeu);
}
?>


<div class="container">
    <?php
    for($i=0;$i<$nbr;$i++) {  //un tour pour un seul jeu et plusieurs tours si plus de jeux
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
                                    <span contenteditable="true" name="plateforme" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->plateforme;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Editeur</th>
                                <td>
                                    <span contenteditable="true" name="editeur" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->editeur;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Année</th>
                                <td>
                                    <span contenteditable="true" name="anneesortie" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->anneesortie;?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Note</th>
                                <td>
                                    <span contenteditable="true" name="note" id="<?php print $listeJeux[$i]->idJeu;?>">
                                    <?php print $listeJeux[$i]->note;?>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        if($noimage==1){
                            ?>
                                <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
                                    <center>
                                        <div class="col-sm-6">
                                            <label for="photo" class="form-label">Ajouter une image</label>
                                            <input class="form-control form-control-sm" name="photo" type="file">
                                            <br>
                                            <!--<button id="submit" type="submit" class="w-50 btn btn-sm btn-dark text-white" name="submit">Ajouter</button>-->
                                        </div>
                                    </center>
                                </form>
                        <?php
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
    <a class="btn btn-custom text-white" href="index_.php?page=affichageJeux.php" role="button">
        Retour
    </a>
</center>



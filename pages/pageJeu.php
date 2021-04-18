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
    for($i=0;$i<$nbr;$i++) {  //un tour pour un seul jeu et plusieurs tours si plus de jeux
        ?>
            <center>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm w-75 h-md-250">
                    <div class="col-auto d-none d-lg-block">
                        <img src="./admin/images/<?php
                        if($listeJeux[$i]->photo==null){
                            print 'noImage.png';
                        }else{
                            print $listeJeux[$i]->photo;
                        }
                        ?>" alt="Image non trouvée" height="400px" width="300px">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-5  underline"><?php print $listeJeux[$i]->nomjeu;?></h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Plateforme</th>
                                <td><?php print $listeJeux[$i]->plateforme;?>
                            </tr>
                            <tr>
                                <th scope="row">Editeur</th>
                                <td><?php print $listeJeux[$i]->editeur;?></td>
                            </tr>
                            <tr>
                                <th scope="row">Année</th>
                                <td><?php print $listeJeux[$i]->anneesortie;?></td>
                            </tr>
                            <tr>
                                <th scope="row">Note</th>
                                <td><?php print $listeJeux[$i]->note;?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </center>
        <?php
    }
    ?>
</div>
<center>
    <a class="btn btn-dark" href="index_.php?page=affichageJeux.php" role="button">
        Retour
    </a>
</center>



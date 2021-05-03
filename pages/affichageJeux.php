<?php
$jeux = new JeuxBD($cnx);
$listeJeux = $jeux->getJeux();
$nbr = count($listeJeux);
?>
<br>
<h3 class="text-center underline">Jeux encodés</h3>


<div class="album py-5">
    <?php
    for($i=0 ; $i<$nbr ; $i++){
    ?>
    <div class="container" style="width: 70%">
        <div class="row">
            <?php
            for($i=0 ; $i<$nbr ; $i++){
                ?>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <img src="./admin/images/<?php
                        if($listeJeux[$i]->photo==null){
                            print 'noImage.png';
                            $noimage = 1;
                        }else{
                            print $listeJeux[$i]->photo;
                            $noimage = 0;
                        }
                        ?>" class="bd-placeholder-img" width="200px" height="250px">
                    </div>
                    <div class="col p-5 d-flex flex-column position-static">
                        <td>
                            <center>
                                <strong class="underline"><?php print $listeJeux[$i]->nomjeu;?></strong>
                            </center>
                        </td>
                        <td><p></p></td>
                        <td>
                            <center>
                                <p>Encodeur : <?php print $listeJeux[$i]->encodeur;?></p>
                            </center>
                        </td>
                        <td><p></p></td>
                        <td>
                            <center>
                                <a class="w-30 btn btn-md btn-clair text-white" href="index_.php?page=pageJeu.php&idJeu=<?php print $listeJeux[$i]->idjeu?>" role="button">
                                    Voir la page du jeu
                                </a>
                            </center>
                        </td>
                    </div>
                </div>
            </div>
        <?php
            }
    }
    ?>
    </div>
    </div>
</div>
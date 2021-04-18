<?php
$client = new ClientBD($cnx);
$listeClient = $client->getClient();
$nbr = count($listeClient);
?>
<br>
<h3 class="text-center underline">Liste des clients</h3>
<br>
<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
        <tr class="bg-custom text-white text-center">
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Mail</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0 ; $i<$nbr ; $i++){
            ?>
            <tr>
                <td scope="row"><?php print $listeClient[$i]->nomuser;?></td>
                <td scope="row"><?php print $listeClient[$i]->prenomuser;?></td>
                <td scope="row"><?php print $listeClient[$i]->mailuser;?></td>
                <td scope="row"><?php print $listeClient[$i]->status;?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

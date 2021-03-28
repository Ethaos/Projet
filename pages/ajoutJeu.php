<br><br>
<div class="container" style="width: 70%">
    <form class="row md-6">
        <h3 class="underline">Ajout d'un jeu</h3>
    </form>
    <form class="row md-6">
        <div class="col-md-3">
            <label for="nom" class="form-label">Nom du jeu</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="plateforme" class="form-label">Plateforme</label>
            <input type="text" class="form-control">
        </div>
    </form>
    <form class="row md-6">
        <div class="col-md-3">
            <label for="editeur" class="form-label">Editeur</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="anneeSortie" class="form-label">Année de sortie</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Choisissez une année</option>
                <?php
                for($i=1990 ; $i<=2021 ; $i++){?>
                    <option value="<?php print $i?>"><?php print $i?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </form>
    <form class="row md-6">
        <div class="col-md-3">
            <label for="note" class="form-label">Note</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="formFileSm" class="form-label">Choisissez une image du jeu</label>
            <input class="form-control form-control" id="formFile" type="file">
        </div>
    </form>
</div>
<br><br><br>

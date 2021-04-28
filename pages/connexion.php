<br>
<div class="container">
    <?php
    if(isset($_POST['submit'])){
        extract($_POST,EXTR_OVERWRITE);
        $ad = new UserBD($cnx);
        $admin = $ad->getUser($login,$password);
        //var_dump($admin);
        $user = new UserBD($cnx);
        $listeUser = $user->getClientEntete($login);
        $nbr= count($listeUser);
        if($admin==1){
            $_SESSION['admin']=1;
            for($i=0 ; $i<$nbr ; $i++){
                $_SESSION['prenom']=$listeUser[$i]->prenom;
            }
            ?>
            <p class="center text-center">Admin vérifié<i class="fas fa-user-check"></i></p>
            <meta http-equiv="refresh": content="0; URl=./admin/index_.php">
            <?php
        }else if($admin==2){
            $_SESSION['admin']=2;
            for($i=0 ; $i<$nbr ; $i++){
                $_SESSION['prenom']=$listeUser[$i]->prenom;
            }
            ?>
            <p class="center text-center">Client vérifié<i class="fas fa-user-check"></i></p>
            <meta http-equiv="refresh": content="0; URl=./index_.php">
    <?php
        }elseif($admin==0){
            ?>
            <p class="center text-center red">
                Client non encodé <i class="fas fa-user-times"></i><br>
                Veuillez vous inscrire,
                pour avoir accès à plus de fonctionnalités.</p>
    <?php
        }
    }
    ?>
    <div class="container" style="width: 20%">
        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Connexion</h1>
            <label for="login" class="visually-hidden" >Login</label>
            <input type="login" name="login" id="login" class="form-control" placeholder="Login" required autofocus>
            <label for="password" class="visually-hidden">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
            <br>
            <button type="submit" class="w-100 btn btn-custom text-white" name="submit">Se Connecter</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
        </form>
    </div>
</div>
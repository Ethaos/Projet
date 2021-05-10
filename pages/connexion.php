<br>
<div class="container">
    <?php
    if(isset($_POST['submit'])){
        extract($_POST,EXTR_OVERWRITE);
        $ad = new UserBD($cnx);
        $admin = $ad->getUser($login,$password);
        //var_dump($admin);

        if($admin!=0){
            $user = new UserBD($cnx);
            $listeUser = $user->getClientEntete($login);
            $nbr= count($listeUser);
            if($admin==1){
                $_SESSION['admin']=1;
                for($i=0 ; $i<$nbr ; $i++){
                    $_SESSION['prenom']=$listeUser[$i]->prenom;
                    $_SESSION['iduser']=$listeUser[$i]->iduser;
                }
                ?>
                <div class="center alert alert-success text-center" role="alert" style="width: 20%">
                    <p>Connexion réussie <i class="fas fa-user-check"></i></p>
                </div>
                <meta http-equiv="refresh": content="0; URl=./admin/index_.php?page=accueil_admin.php">
                <?php
            }else if($admin==2){
                $_SESSION['admin']=2;
                for($i=0 ; $i<$nbr ; $i++){
                    $_SESSION['prenom']=$listeUser[$i]->prenom;
                    $_SESSION['iduser']=$listeUser[$i]->iduser;
                }
                ?>
                <div class="center alert alert-success text-center" role="alert" style="width: 20%">
                    <p>Connexion réussie <i class="fas fa-user-check"></i></p>
                </div>
                <meta http-equiv="refresh": content="0; URl=./index_.php?page=accueil.php">
                <?php
            }
        }elseif($admin==0){
            ?>
            <div class="center alert alert-danger text-center" role="alert" style="width: 20%">
                <p>Mail / Mot de passe incorrect <i class="fas fa-user-times"></i></p>
            </div>
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
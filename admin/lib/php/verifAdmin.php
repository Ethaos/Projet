<?php
    if(isset($_SESSION['admin']==0)){
        print "Accès réservé";
        session_destroy();
        ?>
        <meta http-equiv="refresh": content="0; URl=../index_.php">
        <?php
    }
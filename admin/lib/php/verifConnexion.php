<?php
    if(!isset($_SESSION['admin'])){
        print "Accès réservé";
        session_destroy();
        ?>
        <meta http-equiv="refresh": content="0; URl=../index_.php">
        <?php
    }
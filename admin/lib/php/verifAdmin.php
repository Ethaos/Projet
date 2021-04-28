<?php
    if(!isset($_SESSION['admin'])){
        ?>
            <br><br><br>
        <h3 class="center">Accès réservé</h3>
        <?php
        session_destroy();
        ?>
        <meta http-equiv="refresh": content="0; URl=../index_.php">
        <?php
    }
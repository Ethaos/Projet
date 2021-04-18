<?php
include('./lib/php/verifConnexion.php');

if(isset($_SESSION['admin'])){
    print "<br>Bienvenue dans la modification";
}
?>
<br><br>
<div class="container" style="width: 20%">
    Modification
</div>
<?php
include('./lib/php/verifAdmin.php');
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1){
    ?>
    <div class="container" >
        <br>
        <h1 class="center underline"> Accueil Admin </h1>
        <center>
            <img class="topImg" src="./images/admin.png" height="200px" width="180px">
        </center>
    </div>
<?php
    }
}
?>


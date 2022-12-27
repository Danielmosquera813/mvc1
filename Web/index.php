<?php
    include_once '../lib/helper.php';

    if(isset($_SESSION['acceso'])){
        include_once 'partials/header.php';
?>

<?php
        include_once 'partials/footer.php';
    }else{
        if(isset($_GET['modulo']) && $_GET['modulo']=="login"){
            resolve();
        }
        redirect("login.php");
    }
?>
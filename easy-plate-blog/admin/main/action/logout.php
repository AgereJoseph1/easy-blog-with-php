<?php
    include '../class/class.user.php';
    $user = new USER();
    
    $user->logout("../../../frontend/front-end/login.php");
    exit();

?>
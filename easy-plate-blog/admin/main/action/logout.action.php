<?php 
session_start();

session_unset();
session_destroy();

header("Location: ../../../frontend/front-end/login.php");
?>
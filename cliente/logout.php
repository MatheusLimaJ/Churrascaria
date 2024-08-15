<?php 
    session_name('chuletaaa');
    session_start();
    session_destroy();
    header('location:../index.php');
    exit;



?>
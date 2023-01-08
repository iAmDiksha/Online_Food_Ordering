<?php
    include '../connect.php';
    session_start();

    if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] != true){
        header("location: adminlogin.php");
        exit;
    }

    else{
        unset($_SESSION['adminlogin']);
        // session_destroy();
        
        header("location: adminlogin.php");
    }

?>
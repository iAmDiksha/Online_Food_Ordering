<?php
    include 'connect.php';
    session_start();
    
    // if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    //     header("location: login.php");
    //     exit;
    // }
    if(!isset($_SESSION['registered']) || $_SESSION['registered'] != true){
        header("location: login.php");
        exit;
    }

    else{
        unset($_SESSION['registered']);
        unset($_SESSION['loggedin']);
        unset($_SESSION['cart']);
        unset($_SESSION['email']);
        unset($_SESSION['full_name']);
        unset($_SESSION['mobile_number']);
        // session_destroy();
        header("location: login.php");
    }

?>
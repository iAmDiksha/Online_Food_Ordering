
<?php
    $con = new mysqli('localhost','root','','online_db');

    if(!$con){
        die(mysqli_error($con));
    }
?>
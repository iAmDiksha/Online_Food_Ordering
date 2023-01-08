<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update_profile.css">
    <title>Update Address</title>
</head>

<body>
    <?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $sno = $_POST['sno'];
    // }
    ?>
    <main class="main">
        <form class="form" action="manage_profile.php" method="post">
            <h1>Update Address</h1>
            <div class="container">
                <!-- <input type="hidden" name="sno" value="<?php echo $sno; ?>"> -->
                <p><i class="fas fa-map-marker-alt"></i> Address</p>
                <?php 
                   $address =  $_SESSION['address'];
                ?>
                <input type="text" required name="delivery_address" placeholder="Enter your delivery address" value="<?php echo $address?>"></input>
                <br>
                <button type="submit" name="address_update" class="btn">Update</button>
            </div>
        </form>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
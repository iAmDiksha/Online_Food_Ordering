<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>

<body>
    <?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    $email = $_SESSION['email'];
    $sql = "select `sno` from user where `email` = '$email'";
    $result = mysqli_query($con, $sql) or die("query unsuccessful!");
    $row = mysqli_fetch_assoc($result);
    ?>
    <main class="main">
        <div class="profile_container">
         <h1>Profile</h1>
            <form action="manage_profile.php" method="post">
            <div class="image">
                <img src="images/user-icon.png">
            </div>
                <div class="user-info">
                    <!-- <h3>your info</h3> -->
                    <input type="hidden" name="sno" value="<?php echo $row['sno']?>">
                    <p><i class="fas fa-user"></i><span><?php echo $_SESSION['full_name'] ?></span></p>
                    <p><i class="fas fa-phone"></i><span><?= $_SESSION['mobile_number'] ?></span></p>
                    <p><i class="fas fa-envelope"></i><span><?= $_SESSION['email'] ?></span></p>
                    <button type="submit" name="update_profile" class="btn btn1">update info</button>
                    
                    <p><i class="fas fa-map-marker-alt"></i><span><?php if ($_SESSION['address'] == '') {
                                                                        echo 'please enter your address';
                                                                    } else {
                                                                        echo $_SESSION['address'];
                                                                    } ?></span></p>
                    <a href="update_address.php" class="btn">update address</a>
                    <!-- <button type="submit" name="update_address" class="btn btn1">update address</button> -->
                    <a href="logout.php" class="btn" style="width:100%; background:var(--danger); color:var(--white);" onclick="return confirm('You will be logged out!');">Logout</a>
                </div>

            </form>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
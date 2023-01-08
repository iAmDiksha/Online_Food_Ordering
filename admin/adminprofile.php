<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminprofile.css">
    <title>Admin Profile</title>
</head>

<body>
    <?php
    include 'navbar.php';
    if (!isset($_SESSION['adminlogin'])) {
        header('location: adminlogin.php');
    }
    $email = $_SESSION['adminemail'];
    $sql = "select `id` from admin where `email` = '$email'";
    $result = mysqli_query($con, $sql) or die("query unsuccessful!");
    $row = mysqli_fetch_assoc($result);
    ?>
    <main class="main">
        <div class="profile_container">
            <h1>Admin Profile</h1>
            <form action="manage_admin_profile.php" method="post">
            <div class="image">
                <img src="../images/user-icon.png">
            </div>
                <div class="user-info">
                    <!-- <h3>your info</h3> -->
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <p><i class="fas fa-user"></i><span><?php echo $_SESSION['name'] ?></span></p>
                    <p><i class="fas fa-envelope"></i><span><?= $_SESSION['adminemail'] ?></span></p>
                    <!-- <a href="admin_update_profile.php" class="btn btn1">update info</a> -->
                    <button type="submit" name="admin_update_profile" class="btn btn1">update info</button>
                    
                    <a href="adminlogout.php" class="btn" style="width:100%; background:var(--danger); color:var(--white);" onclick="return confirm('You will be logged out!');">Logout</a>
                </div>

            </form>
        </div>
    </main>
</body>

</html>
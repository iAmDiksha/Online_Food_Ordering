<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_update_profile.css">
    <title>Admin Profile</title>
</head>

<body>
    <?php
    include 'navbar.php';
    if (!isset($_SESSION['adminlogin'])) {
        header('location: adminlogin.php');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
    }
    ?>
    <main class="main">
        <form class="form" action="manage_admin_profile.php" method="post">
            <h1>Update Profile</h1>
            <div class="container">
            <input type="hidden" name="id" value="<?php echo $id;?>">
                <p>update name</p>
                <input type="text" required name="name" placeholder="Enter your name" value="<?php echo $_SESSION['name'] ?>">
                <br>
                <p>update email</p>
                <input type="email" name="email" required placeholder="Enter your email" value="<?= $_SESSION['adminemail'] ?>">
                <br>
                <button type="submit" name="updation" class="btn">Update</button>
            </div>
        </form>
    </main>
</body>

</html>
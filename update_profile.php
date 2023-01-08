<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update_profile.css">
    <title>Update Profile</title>
</head>

<body>
    <?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sno = $_POST['sno'];
    }
    ?>
    <main class="main">
        <form class="form" action="manage_profile.php" method="post">
            <h1>Update Profile</h1>
            <div class="container">
            <input type="hidden" name="sno" value="<?php echo $sno;?>">
                <p>update name</p>
                <input type="text" required name="full_name" placeholder="Enter your name" value="<?php echo $_SESSION['full_name'] ?>">
                <br>
                <p>update email</p>
                <input type="email" name="email" required placeholder="Enter your email" value="<?= $_SESSION['email'] ?>">
                <br>
                <p>update mobile number</p>
                <input type="number" name="mobile_number" required placeholder="Enter your mobile number" value="<?= $_SESSION['mobile_number'] ?>">
                <br>
                <button type="submit" name="updation" class="btn">Update</button>
            </div>
        </form>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
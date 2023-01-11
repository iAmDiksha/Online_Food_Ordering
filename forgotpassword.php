<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgotpassword.css">
    <title>Reset Password</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main class="main">
        <div class="container">
            <h1>Forgot your password?</h1>
            <p>Enter the email address associated with your account and we will send you a link to reset your password</p>

            <form action="" method="post">
                <p>Email</p>
                <input type="email" name="" required placeholder="Enter your email">
                <button type="submit" class="btn">Send a link</button>
            </form>
        </div>
    </main>

    <?php
    include 'footer.php';
    ?>
</body>

</html>
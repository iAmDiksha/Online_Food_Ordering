<?php
include 'connect.php';

$showError = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "select * from user where email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $rowData = mysqli_fetch_array($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
       
        $_SESSION['full_name'] = $rowData["full_name"];
        $_SESSION['mobile_number'] = $rowData["mobile_number"];
        $_SESSION['address'] = '';
    } 
    else {
        $showError = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
<?php
    if ($login) {
        echo '
            <script>alert("Success! you are logged in.");
                window.location.href = "menu.php";
            </script>
            ';
    }
    if ($showError) {
        echo '
            <script>alert("Error! ' . $showError . '")</script>
            ';
    }
    ?>
    <div class="back_to_home">
        <a href="home.php"><i class="fas fa-home"></i> Back to Home</a>
    </div>
    <form action="login.php" method="post" class="login_form">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <a href="#">Forgot Password?</a>
        <button type="submit">Login</button>
        <div>
            <p>Dont't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </form>
</body>

</html>
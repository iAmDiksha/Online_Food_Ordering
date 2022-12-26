<?php
include '../connect.php';

$showError = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = "select * from admin where name = '$name' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $rowData = mysqli_fetch_array($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['adminlogin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $rowData["email"];
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
<?php
    if ($login) {
        echo '
            <script>alert("Success! you are logged in.");
                window.location.href = "dashboard.php";
            </script>
            ';
    }
    if ($showError) {
        echo '
            <script>alert("Error! ' . $showError . '")</script>
            ';
    }
    ?>
    <form action="adminlogin.php" method="post" class="login_form">
        <h1>Login</h1>
        <!-- username = admin
        password = 1q2w3e -->
        <input type="text" name="name" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>

</html>
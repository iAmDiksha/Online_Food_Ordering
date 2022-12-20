<!--
    //! mobile number validation (only digits up to 10 are allowed.)
    //! email OTP / Code
 -->

<?php
include 'connect.php';

$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // $exists; //email already exists or not;
    // ALTER TABLE `user` ADD UNIQUE(`email`);
    $existSql = "SELECT * FROM `user` WHERE email='$email'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        // $exists = true;
        $showError = "Email Already Exists.";
    } 
    
    else {
        // $exists = false;
        if (($password == $cpassword)) {
            $sql = "INSERT INTO `user` (`full_name`, `email`, `mobile_number`, `password`, `cpassword`, `date`) VALUES ( '$full_name', '$email', '$mobile_number', '$password', '$cpassword', current_timestamp());
            ";

            $result = mysqli_query($con, $sql);

            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords do not match.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/signup.css?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Sign up</title>
</head>

<body>
<?php
    if ($showAlert) {
        echo '
        <script>alert(" Success! Your account is now created and you can login.");
            window.location.href = "login.php";
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
    <form action="signup.php" method="post" class="signup_form">
        <h1>Sign up</h1>
        <input type="text" maxlength="30" name="full_name" placeholder="Full Name" required>
        <input type="email" maxlength="35" name="email" placeholder="Email" required>
        <!-- <input type="number" maxlength="10" name="mobile_number" placeholder="Mobile Number" required> -->
        <input type="text" pattern="[1-9]{1}[0-9]{9}" title="Number should be of 10 digits!" name="mobile_number" placeholder="Mobile Number" required>
        <input type="password" maxlength="25" name="password" placeholder="Password" required>
        <input type="password" maxlength="25" name="cpassword" placeholder="Confirm Password" required>
        <button type="submit">Sign Up</button>
        <div>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
   </body>

</html>
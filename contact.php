<?php
include 'connect.php';
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $sql = "INSERT INTO `messages` (`name`, `email`, `phone`, `message`) VALUES ( '$name', '$email', '$phone', '$message');";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $showAlert = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <?php
        if ($showAlert) {
            echo '
            <script>alert("Sent Message successfully!");
            </script>
                ';
        }
    ?>

    <main class="main">
        <div class="contactForm_container">
            <div>
                <img src="images/contact-img.svg" width="450px">
            </div>
            <form action="contact.php" method="POST" class="contactForm">
                <h1 class="title">Get in touch with us</h1>
                <div class="contactForm_input">
                    Full name
                    <input type="text" name="name" required>
                </div>
                <div class="contactForm_input">
                    Email Address
                    <input type="email" name="email" required>
                </div>
                <div class="contactForm_input">
                    Phone
                    <input type="text" pattern="[1-9]{1}[0-9]{9}" title="Number should be of 10 digits!" name="phone" required>
                </div>
                <div class="contactForm_input">
                    Message
                    <textarea name="message" rows="3" required></textarea>
                </div>
                <div class="contactForm_input">
                    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Send Message</button>
                </div>
            </form>
        </div>

    </main>

    <?php
    include 'footer.php';
    ?>
</body>

</html>
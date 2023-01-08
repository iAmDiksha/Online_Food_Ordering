<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/onlinepayment.css">
    <title>Online Payment</title>
    <style>
        .main {
            min-height: 90vh;
            padding: 30px;
            background-color: var(--body);
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    ?>
    <main class="main">
        <div class="container">
            <p>Your Grand Total: 200 Rs.</p>
            <br>
            <div class="barcode">
                <img src="images/barcode.png" alt="" class="image">
            </div>
            <br>
            <h2>Scan me</h2>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
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
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $grand_total = $_POST['grand_total'];
    }
    ?>
    <main class="main">
        <div class="container">
            <div class="left">
            <p>Your Grand Total: <?php echo $grand_total ?>Rs.</p>
            <br>
            <div class="barcode">
                <img src="images/barcode.png" alt="" class="image">
            </div>
            <br>
            <h2>Scan this to make payment</h2>
            </div>
            <div class="right">
                <form action="receipt.php" class="form" method="POST" enctype="multipart/form-data">
                <p><b>Please upload the screenshot of the receipt of your payment here...</b></p>
                <input type="file" required name="img" class="receipt">
                <input type="hidden" name="grand_total" value=".'$grand_total'.">
                <button type="submit" name="receipt" class="btn">Submit</button>
                </form>
            </div>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
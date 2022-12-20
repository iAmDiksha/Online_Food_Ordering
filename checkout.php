
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css">
    <title>Checkout</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <main class="main">
        <section class="checkout">

            <form action="" method="post">

                <!-- <div class="grand-total">
                    <h3>cart items</h3>
                    <a href="cart.php" class="btn">veiw cart</a>
                </div> -->

                <!-- <input type="hidden" name="total_products" value="<?= $total_products; ?>"> -->
                <!-- <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
                <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?>">
                <input type="hidden" name="mob_number" value="<?= $fetch_profile['number'] ?>">
                <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">
                <input type="hidden" name="address" value="<?= $fetch_profile['address'] ?>"> -->

                <div class="user-info">
                    <h3>your info</h3>
                    <p><i class="fas fa-user"></i><span><?php echo $_SESSION['full_name'] ?></span></p>
                    <p><i class="fas fa-phone"></i><span><?= $_SESSION['mobile_number'] ?></span></p>
                    <p><i class="fas fa-envelope"></i><span><?= $_SESSION['email'] ?></span></p>
                    <a href="update_profile.php" class="btn">update info</a>
                    <h3>delivery address</h3>
                    <p><i class="fas fa-map-marker-alt"></i><span><?php if ($_SESSION['address'] == '') {
                                                                        echo 'please enter your address';
                                                                    } else {
                                                                        echo $_SESSION['address'];
                                                                    } ?></span></p>
                    <a href="update_address.php" class="btn">update address</a>
                    <select name="method" class="box" required>
                        <option value="" disabled selected>select payment method --</option>
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="online payment">online payment</option>
                        <!-- <option value="paytm">paytm</option>
                        <option value="paypal">paypal</option> -->
                    </select>
                    <input type="submit" value="place order" class="btn <?php if ($_SESSION['address'] == '') {
                                                                            echo 'disabled';
                                                                        } ?>" style="width:100%; background:var(--danger); color:var(--white);" name="submit">
                </div>

            </form>
        </section>
    </main>

    <?php
    include 'footer.php';
    ?>
</body>

</html>
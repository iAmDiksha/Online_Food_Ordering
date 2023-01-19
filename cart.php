<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart.css">
    <title>Home</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
<?php 
if (isset($_SESSION['registered']) && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
?>
    <div class="cart_container">
        <div class="heading">
            <h1>MY CART</h1>
        </div>
        <div class="grid">
            <div>
                <table class="table">
                    <thead class="table_head">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        <?php
                        foreach ($_SESSION['cart'] as $key => $value) {
                            echo '
                                    <tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value['Item_name'] . '</td>

                                        <td> <i class="fas fa-rupee-sign rupee"></i>' . $value['Price'] . '<input type="hidden" class="iprice" value="' . $value['Price'] . '"></td>
                                        <td>
                                            <form action="manage_cart.php" method="POST">
                                                <input class="iquantity" onchange="this.form.submit();" name="Mod_Quantity" type="number" value="' . $value['Quantity'] . '" min="1" max="20">
                                                <input type="hidden" name="Item_name" value="' . $value['Item_name'] . '">
                                            </form>
                                        </td>

                                        <td><i class="fas fa-rupee-sign rupee"></i><span class="itotal"></span></td>
                                        
                                        <td>
                                            <form action="manage_cart.php" method="post">
                                            <button name="Remove_Item" class="remove">REMOVE</button>
                                            <input type="hidden" name="Item_name" value="' . $value['Item_name'] . '">
                                            </form>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="gt_box">
                <h3 class="gt_price">Grand Total: <i class="fas fa-rupee-sign rupee"></i><span id="gtotal"></span></h3>
                <br>
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                ?>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="grand_total" id="grand_total" value="0">
                        <button class="place_order" name="place_order">Place Order</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
<?php
}
//if cart is empty
else {
?>
    <div class="cart_container">
        <div class="emptyCart">
            <img src="images/emptyCart.png" alt="" class="cartImage">
            <div>
                <h3>Your cart is waiting to be filled</h3>
                <p class="lightText">CHOOSE AN ITEM FROM THE MENU TO GET STARTED.</p>
            </div>
            <a href="menu.php"><button>Start Shopping</button></a>
        </div>
    </div>
<?php
}
?>

<script>
    let iprice = document.getElementsByClassName('iprice');
    let iquantity = document.getElementsByClassName('iquantity');
    let itotal = document.getElementsByClassName('itotal');
    let gtotal = document.getElementById('gtotal');
    let grand_total = document.getElementById('grand_total');

    function subtotal() {
        let gt = 0;
        for (i = 0; i < iprice.length; i++) {
            let sum = iprice[i].value * iquantity[i].value;
            itotal[i].innerText = sum;
            gt = gt + sum;
        }
        gtotal.innerText = gt;
        grand_total.value = gt;
    }

    subtotal();
</script>

    <?php
    include 'footer.php';
    ?>
</body>

</html>
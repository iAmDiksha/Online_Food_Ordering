<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orders.css">
    <title>Orders</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main class="main">
    <?php
        if(isset($_SESSION['registered']) && $_SESSION['registered'] == true){
            $email = $_SESSION['email'];
            $sql = "select `sno` from user where email = '$email'";
            $result = mysqli_query($con, $sql);
            $rowData = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $rowData["sno"];

            $uid = $_SESSION['user_id'];
            $sql = "SELECT * FROM `orders` WHERE `user_id` = $uid";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            
            if($num > 0){
                echo ' <div class="container">';
                while($row = mysqli_fetch_assoc($result)){ 
                    $id = $row['id'];
                    echo '<div class="box">
                    <div class="time">'. $row['date'].' | '. $row['time'] .'</div>
                    <div class="details">
                    <p>Order ID: <span>'.$id.'</span></p>
                    <p>Payment method: <span> '. $row['method'] .'</span></p>
                        <p>Address: <span>'. $row['address'] .'</span> </p>
                    <p>Orders:</p>
                    <div class="orders">';
                    $date = $row['date'];
                    $time = $row['time'];
                    $sql = "select * from `ordered_items` where `user_id` = $uid and date = '$date' and time = '$time'";
                    $res = mysqli_query($con, $sql);
                    while($rowData = mysqli_fetch_assoc($res)){
                        echo '<p>'. $rowData['quantity'] .' '. $rowData['name'] .' -> '. $rowData['quantity'] .' X ' . $rowData['price'] .' = '. $rowData['quantity']*$rowData['price'] .' </p> ';
                    }
                    echo '
                    </div>
                    <p>Total Price: <span>'. $row['total_price'].' Rs.</span></p>
                    <p>Payement Status: <span style="color:red;">'. $row['payment_status'].'</span></p>
                    ';
                    if($row['payment_status'] == 'Pending'){
                    ?>
                        <br>
                        <form action="cancel_order.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button type="submit" id="cancel-order-button" name="cancel_order" class="btn">Cancel Order</button>
                        </form>
                    <?php   
                    }
                    echo '
                    </div>
                    </div>';
                }  
                echo '</div>';
            }

            else{
                echo "
                <div class='no_orders'>
                <img src='images/no_orders1.webp'>
                <h2>No Orders Yet</h2>
                <p>Looks like you haven't made your choice yet...</p>
                </div>
                ";
            }
        }
        else{
           echo "<div class='no_orders'>
           <img src='images/no_orders1.webp'>
           <h2>No Orders Yet</h2>
           <p>Looks like you haven't made your choice yet...</p>
           </div>";
        }
    ?>

    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
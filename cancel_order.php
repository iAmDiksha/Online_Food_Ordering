<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orders.css">
    <title>Home</title>
</head>

<body>
    <?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['cancel_order'])){
            $order_id = $_POST['id'];
        }
        if(isset($_POST['confirm_cancel'])){
            $order_id = $_POST['id'];
            $reason = $_POST['reason'];
            if(!empty($reason)){
                $reason = mysqli_real_escape_string($con, $_POST['reason']);
                $user_id = $_SESSION['user_id'];
                $name = $_SESSION['full_name'];
                $email = $_SESSION['email'];
    

                $sql = "SELECT * FROM `orders` WHERE `id` = $order_id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $date = $row['date'];
                $time = $row['time'];

                $sql = "DELETE FROM `ordered_items` where `user_id` = $user_id and date = '$date' and time = '$time'";
                $res1 = mysqli_query($con, $sql);
                $sql = "DELETE FROM `orders` WHERE `id` = $order_id";
                $res2 = mysqli_query($con, $sql);

                $sql = "insert into `cancel_order` (`user_id`, `name`, `email`, `reason`) VALUES ($user_id, '$name', '$email', '$reason')";
                $res3 = mysqli_query($con, $sql);

                if($res1 && $res2 && $res3){
                    echo '
                    <script>
                        alert("Your Order has been Cancelled.");
                        window.location.href = "orders.php";
                    </script>
                    ';
                }
                else{
                    echo 'An error has been occured, while cancelling your orders!';
                }
            }
            else{
                echo '<p class="error">Reason for cancellation cannot be empty.</p>';
            }
        }
    }
    ?>
    <main class="main">
        <form action="cancel_order.php" method="POST" class="reason-form">
            <input type="hidden" name="id" value="<?php echo $order_id ?>">
            <h3>Reason for cancellation</h3>
            <br>
            <textarea name="reason" class="reason" placeholder="Write the reason for cancellation here..."></textarea>
            <br>
            <button type="submit" name="confirm_cancel" class="btn">Submit</button>
        </form>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
<?php
     include 'connect.php';
     session_start();
     if(isset($_SESSION['registered']) && $_SESSION['registered'] == true){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['order_placed'])){
                $_SESSION['address'] = $_POST['address'];
                $user_id = $_SESSION['user_id'];
                $name = $_SESSION['full_name'];
                $mobile_number = $_SESSION['mobile_number'];
                $email = $_SESSION['email'];
                //!!!
                $method = "Pay on delivery";
                $payment_status = "Pending";
                $address = $_SESSION['address'];
                $total_price = $_POST['grand_total'];


                $sql = "insert into `orders` (`user_id`, `name`, `mobile_number`, `email`, `method`, `address`, `total_price`, `payment_status`) VALUES ($user_id, '$name', '$mobile_number', '$email', '$method', '$address', '$total_price', '$payment_status') ";

                $result = mysqli_query($con, $sql);

                foreach ($_SESSION['cart'] as $key => $value) {
                            $name =  $value['Item_name'];
                            $price = $value['Price'];
                            $quantity = $value['Quantity']; 
                            $sql = "insert into `ordered_items` (`user_id`, `name`, `quantity`, `price`) VALUES ($user_id, '$name', '$quantity', '$price') ";

                            $result = mysqli_query($con, $sql);
                }

                unset($_SESSION['cart']);

                if($result){
                    echo '
                    <script>
                    alert("Your Order has been successfully placed.");
                    window.location.href = "orders.php";
                    </script>
                    ';
                }
            }
        }
    }
?>
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

                if($result){
                    echo '
                    <script>
                    alert("Your Order has been successfully placed.");
                    window.location.href = "home.php";
                    </script>
                    ';
                }
            }
        }
    }
?>
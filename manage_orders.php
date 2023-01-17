<?php
     include 'connect.php';
     session_start();
     if(isset($_SESSION['registered']) && $_SESSION['registered'] == true){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['order_placed'])){
                $_SESSION['address'] = $_POST['address'];
                $name = $_SESSION['full_name'];
                $mobile_number = $_SESSION['mobile_number'];
                $email = $_SESSION['email'];

                //!!!!
                $sql = "select `sno` from user where email = '$email'";
                $result = mysqli_query($con, $sql);
                $rowData = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $rowData["sno"];
                $user_id = $_SESSION['user_id'];
                //!!!!
                
                $method = $_POST['radio'];
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


                if($result){
                    if($method == 'Cash on delivery')
                    {
                        echo '
                            <script>
                                alert("Your Order has been successfully placed.");
                                window.location.href = "orders.php";
                            </script>
                            ';
                        unset($_SESSION['cart']);
                    }
                    else{
                    // $currdate = date("Y-m-d");
                    // $currtime = 
                    // $sql = "select * from orders where date = $currdate and time = $currtime and user_id = $user_id";
                    // $result = mysqli_query($con, $sql);
                    // $rowData = mysqli_fetch_array($result);
                    // $_SESSION['order_id'] = $rowData["id"];

                        echo '
                             <form method="post" id="form" action="onlinepayment.php">
                                <input type="hidden" name="grand_total" value="'.$total_price.'">
                             </form>
                             <script>
                                document.getElementById("form").submit();
                             </script>
                            ';
                    }
                }
            }
        }
    }
?>

<script>
window.addEventListener('popstate', function (event)
{
    
    // // const leavePage = confirm("");
    // if (leavePage) {
    //     history.back(); 
    // } else {
    //     history.pushState(null, document.title, location.href);
    // }  
});

</script>

<?php
    include 'header.php';
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['receipt']))
        {
            $grand_total = $_POST['grand_total'];
            $img = $_FILES["img"]["name"];
            $name = $_SESSION['full_name'];
            $email = $_SESSION['email'];
            $sql = "select `sno` from user where email = '$email'";
            $result = mysqli_query($con, $sql);
            $rowData = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $rowData["sno"];
            $uid = $_SESSION['user_id'];

            $sql = "INSERT INTO `receipt` (`user_id`, `name`, `email`, `img`, `total`) VALUES ($uid, '$name' , '$email', '$img',  $grand_total);";
            $result = mysqli_query($con, $sql);
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
?>
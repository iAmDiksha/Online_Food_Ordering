<?php
    include 'connect.php';
    session_start();
    if (!isset($_SESSION['registered'])) {
        header('location: login.php');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //! update profile ...........

        if (isset($_POST['update_profile'])) {
            $sno = $_POST['sno'];
    
            echo ' <form action="update_profile.php" method="POST" id="form">
                         <input type="hidden" name="sno" value="' . $sno . '">
                      </form>
                      
                      <script>
                             document.getElementById("form").submit();
                      </script>
                      ';
        }

        if (isset($_POST['updation'])) {
            $sno = $_POST['sno'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $mobile_number = $_POST['mobile_number'];

            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['mobile_number'] = $mobile_number;

            $sql = "update user set `full_name` = '$full_name', `email` = '$email', `mobile_number`= '$mobile_number'
        WHERE `user`.`sno` = $sno ";
            $result = mysqli_query($con, $sql);
            echo "<script>
                alert('Profile is successfully updated.');
                window.location.href = 'profile.php';
            </script>";
        }

        //! update address ............
        if(isset($_POST['address_update'])){
            $_SESSION['address'] = $_POST['delivery_address'];
            echo "<script>
            alert('Address is successfully updated.');
            window.location.href = 'profile.php';
            </script>";
        }
    }
    ?>
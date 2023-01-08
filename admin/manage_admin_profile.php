<?php
    include '../connect.php';
    session_start();

    if(!isset($_SESSION['adminlogin'])){
        header('location: adminlogin.php');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //! update admin profile ...........

        if (isset($_POST['admin_update_profile'])) {
            $id = $_POST['id'];
    
            echo ' <form action="admin_update_profile.php" method="POST" id="form">
                         <input type="hidden" name="id" value="' . $id . '">
                      </form>
                      
                      <script>
                             document.getElementById("form").submit();
                      </script>
                      ';
        }

        if (isset($_POST['updation'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            $_SESSION['name'] = $name;
            $_SESSION['adminemail'] = $email;

            $sql = "update admin set `name` = '$name', `email` = '$email'
        WHERE `admin`.`id` = $id ";
            $result = mysqli_query($con, $sql);
            echo "<script>
                alert('Profile is successfully updated.');
                window.location.href = 'adminprofile.php';
            </script>";
        }
    }
    ?>
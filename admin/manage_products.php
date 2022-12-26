<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['adminlogin'])) {
    header('location: adminlogin.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_product'])) {
        $fid = $_POST['fid'];
        $sql = "DELETE FROM `menu` WHERE `menu`.`fid` = $fid";
        $result = mysqli_query($con, $sql);
        echo "<script>
                window.location.href = 'product.php';
            </script>";
    }

    if (isset($_POST['update_product'])) {
        $fid = $_POST['fid'];

        echo ' <form action="update_product.php" method="POST" id="form">
                     <input type="hidden" name="fid" value="' . $fid . '">
                  </form>
                  
                  <script>
                         document.getElementById("form").submit();
                  </script>
                  ';
    }

    if (isset($_POST['add_product'])) {
        // Stores the file name
        $fname = $_POST['fname'];
        $fcategory = $_POST['fcategory'];
        $fprice = $_POST['fprice'];
        $foodimg = $_FILES["fimg"]["name"];

        // Store the file extension or type
        // $type = $_FILES["fimg"]["type"];
        // Store the file size
        // $size = $_FILES["fimg"]["size"];

        $sql = "INSERT INTO `menu` (`fname`, `fprice`, `fimg`, `fcategory`) VALUES ('$fname', $fprice , '$foodimg', '$fcategory');";
        $result = mysqli_query($con, $sql);

        echo "<script>
                alert('product is successfully added.');
                window.location.href = 'product.php';
            </script>";
    }

    if (isset($_POST['updation'])) {
        $fid = $_POST['fid'];
        $name = $_POST['fname'];
        $price = $_POST['fprice'];
        $image = $_FILES["fimg"]["name"];
        $category = $_POST['fcategory'];

        if($image != ""){
            $sql = "update menu set `fname` = '$name', `fprice` = '$price', `fimg` = '$image', `fcategory`= '$category'
            WHERE `menu`.`fid` = $fid
            ";
        }
        else{
            $sql = "update menu set `fname` = '$name', `fprice` = '$price', `fcategory`= '$category'
            WHERE `menu`.`fid` = $fid
            ";
        }
        $result = mysqli_query($con, $sql);
        echo "<script>
                alert('product is successfully updated.');
                window.location.href = 'product.php';
            </script>";
    }
}

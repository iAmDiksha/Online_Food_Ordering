<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Update Products</title>
    <style>
        .food_img{
            text-align: center;
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fid = $_POST['fid'];
        $sql = "SELECT * FROM `menu` WHERE `menu`.`fid` = $fid";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        $rowData = mysqli_fetch_array($result);
        if ($num == 1) {
            $name = $rowData['fname'];
            $price = $rowData['fprice'];
            $image = $rowData['fimg'];
            $category = $rowData['fcategory'];
        }
    }
    ?>

    <main class="main">
        <form action="manage_products.php" class="form" method="POST" enctype="multipart/form-data">
            <h1>Update Product</h1>
            <div class="container">
                <input type="hidden" name="fid" value="<?php echo $fid; ?>">
                <div class="food_img">
                <img src="../images/<?php echo $image?>" width="260px" height="200px">
                </div>

                <p>update name</p>
                <input type="text" required name="fname" placeholder="Enter Product Name" value="<?php echo $name; ?>">
                <br>

                <p>update price</p>
                <input type="number" required name="fprice" placeholder="Enter Product Price" value="<?php echo $price; ?>">
                <br>

                <p>update category</p>
                <select name="fcategory">
                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                    <?php
                    $sql = "select * from category";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($category != $row['cname']){
                    ?>
                            
                                <option value="<?php echo $row['cname']; ?>"><?php echo $row['cname']; ?></option>
                            
                    <?php
                            }
                        }
                    }
                    ?>
                </select>
                <br>
                <!-- sql  -->

                <p>update image</p>
                <input type="file" name="fimg">

                <button type="submit" name="updation" class="btn">Update Product</button>
            </div>
        </form>
    </main>
</body>

</html>
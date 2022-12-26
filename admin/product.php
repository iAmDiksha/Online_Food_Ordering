<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Products</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <main class="main">
        <form action="manage_products.php" class="form" method="POST" enctype="multipart/form-data">
            <h1>Add New Product</h1>
            <div class="container">
                <input type="text" required name="fname" placeholder="Enter Product Name">
                <br>
                <input type="number" required name="fprice" placeholder="Enter Product Price">
                <br>
                <select name="fcategory" required>
                    <option value="" disabled selected>Select Category</option>
                    <?php
                    $sql = "select * from category";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $row['cname']; ?>"><?php echo $row['cname']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <br>
                <!-- sql  -->

                <small>.png, .jpg or .jpeg files only.</small>
                <input type="file" required name="fimg" accept=".png, .jpg, .jpeg">
                <button type="submit" name="add_product" class="btn">Add Product</button>
            </div>
        </form>

        <div class="products">
            <h1>All Products</h1>
            <br>
            <?php
            $sql = "select * from menu";
            $result = mysqli_query($con, $sql) or die("query unsuccessful!");
            if (mysqli_num_rows($result) > 0) {

            ?>
                <div class="foodItems">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <form action="manage_products.php" method="post">
                            <div class="foodCard">
                                <input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
                                <img src="../images/<?php echo $row['fimg'] ?>" alt="image" class="foodItem">
                                <div class="foodItemDescription">
                                    <h4><?php echo $row['fname'] ?></h4>
                                    <h3><?php echo $row['fprice'] ?> Rs.</h3>

                                    <div class="btns">
                                        <button type="submit" name="update_product" class="updatebtn">Update</button>
                                        <button type="submit" name="delete_product" class="deletebtn" onclick="return confirm('delete this message?');">Delete</button>
                                    </div>

                                    <input type="hidden" name="Item_name" value="<?php echo $row['fname'] ?>">
                                    <input type="hidden" name="Price" value="<?php echo $row['fprice'] ?>">
                                </div>
                            </div>
                        </form>

                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
                echo "No result to show";
            }
            ?>
        </div>
    </main>
</body>

</html>
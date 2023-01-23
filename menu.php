<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>Menu</title>
</head>
<body>
    <?php 
        include 'header.php';
    ?>
    <main class="main">
        <h1>Our Menu</h1>
    <?php 
        $sql = "select * from `category`";
        $result = mysqli_query($con, $sql) or die("query unsuccessful!");
        if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="menuCards">
            <?php
            $ct = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="menucard">
                    <form action="food.php" method="post" id="form<?php echo $ct;?>">
                        <a href="#" onclick="document.forms['form<?php echo $ct;?>'].submit();"> <img src="images/<?php echo $row['cimg'];?>"  class="menuItem"> </a>
                        <input type="hidden" name="category" value="<?php echo $row['cname'];?>">
                    </form>
                    <p><?php echo $row['cname'];?></p>
                </div>
            <?php
                $ct++;
            }
            ?>
        </div>
    <?php
        }
    ?>
    <?php
    $sql = "select * from menu";
    $result = mysqli_query($con, $sql) or die("query unsuccessful!");
    if (mysqli_num_rows($result) > 0) {

    ?>
        <div class="foodItems">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <form action="manage_cart.php" method="post">
                    <div class="foodCard">
                        <img src="images/<?php echo $row['fimg'] ?>" alt="image" class="foodItem">
                        <div class="foodItemDescription">
                            <h4><?php echo $row['fname'] ?></h4>
                            <h3><?php echo $row['fprice'] ?> Rs.</h3>
                            <button type="submit" name="Add_To_Cart" class="addbtn">Add To Cart</button>

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

    </main>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
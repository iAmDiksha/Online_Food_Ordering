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
        
<!--
    <div class="searchBar">
        <input type="search" placeholder="Search food">
        <a href="#"><i class="fas fa-search"></i></a>
    </div> -->

    <div class="menuCards">
        <div class="menucard">
            <a href="paratha.php"> <img src="images/paratha.png" alt="paratha" class="menuItem"> </a>
            <p>Paratha</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/pizza.png" alt="pizza" class="menuItem"></a>
            <p>Pizza</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/sandwich.png" alt="sandwich" class="menuItem"></a>
            <p>Sandwich</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/noodles.png" alt="noodles" class="menuItem"></a>
            <p>Noodles</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/pasta.png" alt="pasta" class="menuItem"></a>
            <p>Pasta</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/pavbhaji.png" alt="pav bhaji" class="menuItem"></a>
            <p>Pav Bhaji</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/drinks.jpg" alt="drinks" class="menuItem"></a>
            <p>Drinks</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/chaat.png" alt="chaat" class="menuItem"></a>
            <p>Chaat</p>
        </div>
        <div class="menucard">
            <a href=""><img src="images/burger.png" alt="burger" class="menuItem"></a>
            <p>Burger</p>
        </div>
    </div>
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
                        <img src="images/<?php echo $row['fimg'] ?>.jpg" alt="image" class="foodItem">
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
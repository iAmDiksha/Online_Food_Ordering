<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <title>Search</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main class="main">
        <section class="search-form">
            <form method="post" action="food.php">
                <input type="text" name="search_box" placeholder="search here..." class="box">
                <button type="submit" name="search_btn" class="fas fa-search"></button>
            </form>
        </section>
        <div class="small-title">
            <p>Search from the menu</p>
        </div>
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
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
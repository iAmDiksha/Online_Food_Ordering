<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>Foodiie</title>
</head>

<body>
    <?php
    include 'header.php';
    $search = false;
    $find = false;
    $category = '';
    $search_term = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['search_btn'])){
            $search_term = $_POST['search_box'];
            $search = true;
        }
        else{
            //from menu page
            $category = $_POST['category'];
            $search_term = $category;
            $find = true;
        }
    }
    ?>
    <main class="main">
        <?php 
            if($find== true || $search == true){
                if($find == true){
                    $sql = "select * from menu where fcategory = '$category'";
                }
                else if($search == true){
                    $sql = "select * from menu where fcategory LIKE '%{$search_term}%' OR fname LIKE '%{$search_term}%'";
                }
    $result = mysqli_query($con, $sql) or die("query unsuccessful!");
    if (mysqli_num_rows($result) > 0) {

    ?>
        <p><?php echo 'Search results for '. $search_term; ?></p>
        <br><br>
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
            }
        ?>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
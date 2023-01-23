<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/category.css">
    <title>Food Categories</title>
</head>

<body>
    <?php
    include 'navbar.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['add_category'])){
            $cname = $_POST['cname'];
            $image = $_FILES["cimg"]["name"];
            $sql = "INSERT INTO `category` (`cname`, `cimg`) VALUES ('$cname', '$image');";
            $result = mysqli_query($con, $sql);

            if($result){
                echo "<script>
                 alert('Category is successfully added.');
                </script>";
            }
        } 

        if (isset($_POST['delete_category'])){
            $cid = $_POST['cid'];
            $cname = $_POST['cname'];
            $sql = "Delete from menu where fcategory = '$cname'";
            $res = mysqli_query($con, $sql);
            $sql = "Delete from `category` where `cid` = '$cid'";
            $result = mysqli_query($con, $sql);

            if($res && $result){
                echo "<script>
                    alert('Category is successfully deleted.');
                </script>";
            }
        } 
    }
    ?>
    <main class="main">
        <h1>Food Categories</h1>
        <br>
        <div class="add">
        <h3>Add New Category</h3>
        <form class="add_form" action="category.php" method="post" enctype="multipart/form-data">
            <div class="input">
            <input type="text" id="cname" name="cname" placeholder="Enter category name" required>
            </div>
            <small>Upload category image (jpg or png preferred)</small>
            <br>
            <div class="input">
            <input type="file" name="cimg" required>
            </div>
            <button type="submit" name="add_category" class="btn btn1"><i class="fas fa-plus"></i> Add Category</button>
        </form>
        </div>
        <div class="container">
            <table class="category_table">
                <thead>
                    <th>Serial No.</th>
                    <th>Category Image</th>
                    <th>Category Name</th>
                    <th>Number of products</th>
                    <th></th>
                </thead>
                <?php
                $sql = "SELECT c.cid, c.cname, c.cimg, COUNT(m.fcategory) as count FROM menu m Right JOIN category c on m.fcategory = c.cname GROUP BY cname order by c.cid";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $ct = 0;
                if ($num > 0) {
                ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ct++;
                        ?>
                            <form action="category.php" method="post">
                                <tr>
                                    <td><?php echo $ct; ?></td>
                                    <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                                    <td><img class="img" src="../images/<?php echo $row['cimg'] ?>" alt=""></td>
                                    <input type="hidden" name="cname" value="<?php echo $row['cname']; ?>">
                                    <td><?php echo $row['cname'] ?></td>
                                    <td><?php echo $row['count'] ?></td>
                                    <td><button type="submit" name="delete_category" class="btn" onclick="return confirm('Are you sure you want to delete this category? (All the food items under this category will also be deleted.)');">Delete</button></td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
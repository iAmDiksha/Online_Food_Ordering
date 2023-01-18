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
            $sql = "INSERT INTO `category` (`cname`) VALUES ('$cname');";
            $result = mysqli_query($con, $sql);

        echo "<script>
                alert('Category is successfully added.');
            </script>";
        } 
    }
    ?>
    <main class="main">
        <div class="container">
            //! need to work (deletion, all the products of that category should also be deleted.)
            <h1>Food Categories</h1>
            <table class="category_table">
                <thead>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Number of products</th>
                    <th></th>
                </thead>
                <?php
                // create view countcategory
                // as
                // SELECT c.cid, c.cname, COUNT(m.fcategory) as count FROM menu m INNER JOIN category c on m.fcategory = c.cname GROUP BY fcategory order by c.cid;
                $sql = "SELECT * FROM countcategory;";
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
                                    <!-- <input type="hidden" name="id" value="<?php echo $row['cid']; ?>"> -->
                                    <td><?php echo $row['cname'] ?></td>
                                    <?php
                                        $sql = "select";
                                    ?>
                                    <td><?php echo $row['count'] ?></td>
                                    <td><button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button></td>
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

        <form action="category.php" method="post">
            //!! need to work (Category with 0 products don't occur!)
            <input type="hidden" id="cname" name="cname" value="">
            <button type="submit" name="add_category" class="btn" onclick="return addCategory();">Add New Category</button>
        </form>
    </main>

    <script>
        function addCategory(){
           let add = prompt('Enter the category name: ');
           if(add != null){
              document.getElementById("cname").value = add;
              return true;
           }
           return false;
        }
    </script>
</body>
</html>
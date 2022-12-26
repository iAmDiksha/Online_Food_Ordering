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
    ?>
    <main class="main">
        <div class="container">
            <h1>Food Categories</h1>
            <table class="category_table">
                <thead>
                    <th>Id</th>
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
                if ($num > 0) {
                ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form action="category.php" method="post">
                                <tr>
                                    <td><?php echo $row['cid'] ?></td>
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

        <form action="">
            //!! need to work
            <button type="submit" class="btn" onclick="return prompt('Enter the category name: ');">Add New Category</button>
        </form>
    </main>
</body>
</html>
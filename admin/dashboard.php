<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <main class="main">
        <h1>Hello Admin</h1>
        <p>Welcome Back</p>
        <div class="container">
            <?php
                $sql = "select * from user";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['users'] = $num; 
            ?>
            <a href="users.php">
                <div class="box">
                    <i class="fas fa-user"></i>
                    <h3>Total Users</h3>
                    <h2><?php echo $_SESSION['users'];?></h2>
                </div>
            </a>
            <?php
                $sql = "select * from menu";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['products'] = $num; 
            ?>
            <a href="product.php">
                <div class="box">
                    <i class="fas fa-pizza-slice"></i>
                    <h3>Total Products</h3>
                    <h2><?php echo $_SESSION['products']; ?></h2>
                </div>
            </a>
            <a href="orders.php">
                <div class="box">
                    <i class="fas fa-store"></i>
                    <h3>Total Orders</h3>
                    <h2>20</h2>
                </div>
            </a>
            <?php
                $sql = "SELECT * FROM messages";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                $_SESSION['count'] = $num;
            ?>
            <a href="messages.php">
                <div class="box">
                    <i class="fas fa-envelope"></i>
                    <h3>Messages</h3>
                    <h2><?php echo $_SESSION['count']; ?></h2>
                </div>
            </a>
            <?php
            $sql = "select * from category";
            $result = mysqli_query($con, $sql) or die("query unsuccessful!");
            $num = mysqli_num_rows($result);
            $_SESSION['category'] = $num;
            ?>
            <a href="category.php">
                <div class="box">
                    <h3>Food Categories</h3>
                    <h2><?php echo $_SESSION['category']?></h2>
                </div>
            </a>
            <a href="#">
                <div class="box">
                    <h2>Cancelled orders</h2>
                    <h2>2</h2>
                </div>
            </a>
            <a href="#">
                <div class="box">
                    <h2>Total Pendings</h2>
                    <h2>4</h2>
                </div>
            </a>
            <a href="#">
                <div class="box">
                    <h2>Total Completes</h2>
                    <h2>10</h2>
                </div>
            </a>
        </div>
    </main>

</body>

</html>
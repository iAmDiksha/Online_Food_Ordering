<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <title>Dashboard</title>
  </head>

  <body>
    <?php
    include 'navbar.php';
    ?>

    <main class="main">

      <div class="heading">
      <h2>Dashboard</h2>
      <p>Welcome Back, <?php echo $_SESSION['name'] ?> 👋</p>
      </div>

      <div class="container">
        <?php
                $sql = "select * from user";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['users'] = $num; 
            ?>

        <div class="box">
          <h1><?php echo $_SESSION['users'];?></h1>
          <h2>Users</h2>
          <i class="fas fa-users"></i>
        </div>

        <?php
                $sql = "select * from menu";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['products'] = $num; 
            ?>

        <div class="box">
        <h1><?php echo $_SESSION['products']; ?></h1>
          <h2>Products</h2>
          <i class="fas fa-shopping-cart"></i>
          
        </div>
        <?php
                $sql = "select * from orders";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['orders'] = $num; 
            ?>

        <div class="box">
          <h1><?php echo $_SESSION['orders']?></h1>
          <h2>Orders</h2>
          <i class="fas fa-truck"></i>
        </div>

        <?php
                $sql = "SELECT * FROM messages";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                $_SESSION['count'] = $num;
            ?>
        <div class="box">
          <h1><?php echo $_SESSION['count']; ?></h1>
          <h2>Messages</h2>
          <i class="fas fa-envelope"></i>
        </div>

        <?php
            $sql = "select * from category";
            $result = mysqli_query($con, $sql) or die("query unsuccessful!");
            $num = mysqli_num_rows($result);
            $_SESSION['category'] = $num;
            ?>
        <div class="box">
          <h1><?php echo $_SESSION['category']?></h1>
          <h2>Categories</h2>
          <i class="fas fa-list"></i>
        </div>

        <?php
                $sql = "select * from cancel_order";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['cancel_orders'] = $num; 
            ?>

        <div class="box">
        <h1><?php echo $_SESSION['cancel_orders']?></h1>
          <h2>Cancelled orders</h2>
          <i class="fas fa-times"></i>
        </div>

      </div>

    </main>
    
  </body>
</html>

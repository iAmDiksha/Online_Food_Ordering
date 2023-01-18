<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orders.css">
    <title>canceled orders</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $sql = "DELETE FROM `cancel_order` WHERE `id` = $id";
        $result = mysqli_query($con, $sql);
    }
    ?>
    <main class="main">
    <h1>Canceled Orders</h1>
            <table class="order_table">
                <thead>
                    <th>S. No.</th>
                    <th>User_id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th></th>
                </thead>
                <?php 
                  $ct = 0;
                  $sql = "select * from cancel_order";
                  $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                  $num = mysqli_num_rows($result);
                  $_SESSION['cancel_orders'] = $num;
                  if ($num > 0) {
                ?>
                <tbody>
                     <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ct++;
                        ?>
                    <form action="canceled.php" method="post">
                        <tr>
                        <td><?php echo $ct; ?></td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['reason'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="submit" class="btn" onclick="return confirm('delete this message?');">Delete</button></td>
                        </td>
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
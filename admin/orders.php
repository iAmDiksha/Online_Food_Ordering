<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orders.css">
    <title>Orders</title>
</head>

<body>
    <?php
    include 'navbar.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['update_status'])){
            $status = $_POST['payment_status'];
            $id = $_POST['id'];
            $sql = "update orders set `payment_status` = '$status' where `id` = $id";
            $result = mysqli_query($con,$sql);
            // if($result){
            //     echo '<script>
            //         alert("Payment status is updated");
            //     </script>';
            // }
        }
    }
    ?>

    <main class="main">
    <h1>Orders</h1>
            <table class="order_table">
                <thead>
                    <th>Order Id</th>
                    <th>Username</th>
                    <th>Contact Number</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment Status</th>
                    <th></th>
                </thead>
                <?php 
                  $sql = "select * from orders";
                  $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                  $num = mysqli_num_rows($result);
                  $_SESSION['orders'] = $num;
                  if ($num > 0) {
                ?>
                <tbody>
                     <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <form action="orders.php" method="post">
                        <tr>
                        <td><?php echo $row['id'] ?></td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['mobile_number'] ?></td>
                        <?php 
                          $date = $row['date'];
                          $time = $row['time'];
                          $uid = $row['user_id'];
                          $sql = "select * from `ordered_items` where `user_id` = $uid and date = '$date' and time = '$time'";
                          $res = mysqli_query($con, $sql);
                          while($rowData = mysqli_fetch_assoc($res)){
                              echo '<td>'. $rowData['quantity'] .' '. $rowData['name'] .' -> '. $rowData['quantity'] .' X ' . $rowData['price'] .' = '. $rowData['quantity']*$rowData['price'] .' </td><br> ';
                          }
                        ?>
                        <td><?php echo $row['total_price'].' Rs.' ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $time ?></td>
                        <?php 
                            $status = $row['payment_status'];
                        ?>
                        <td>
                            <select name="payment_status" class="status">
                                <option value="<?php echo $status?>" selected disabled><?php echo $status; ?></option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </td>
                        <td><button class="btn" name="update_status" type="submit">Update</button>
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
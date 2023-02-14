<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/users.css">
    <title>Registered Users</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $sql = "DELETE FROM `user` WHERE `sno` = $id";
        $result = mysqli_query($con, $sql);
    }
    ?>
    <main class="main">
        <div class="container">
            <h1>Registered Users</h1>
            <table class="user_table">
                <thead>
                    <th>User id</th>
                    <th>Username</th>
                    <th>Email address</th>
                    <th>Phone number</th>
                    <th>Registration date/time</th>
                    <th></th>
                </thead>
                <?php
                $sql = "select * from user";
                $result = mysqli_query($con, $sql) or die("query unsuccessful!");
                $num = mysqli_num_rows($result);
                $_SESSION['users'] = $num;
                if ($num > 0) {
                ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form action="users.php" method="post">
                                <tr>
                                    <td><?php echo $row['sno'] ?></td>
                                    <input type="hidden" name="id" value="<?php echo $row['sno']; ?>">
                                    <td><?php echo $row['full_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['mobile_number'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><button type="submit" class="btn" onclick="return confirm('delete this user?');">Delete</button></td>
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
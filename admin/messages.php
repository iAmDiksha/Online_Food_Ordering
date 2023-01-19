<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/messages.css">
    <title>Messages</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $sql = "DELETE FROM `messages` WHERE `messages`.`id` = $id";
        $result = mysqli_query($con, $sql);
    }
    ?>
    <main class="main">
        <?php
        $sql = "SELECT * FROM messages";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        $_SESSION['count'] = $num;
        if ($num > 0) {
        ?>
            <div class="container">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <form action="messages.php" method="post">
                        <div class="message_box">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <p>Name: <?php echo $row['name']; ?></p>
                            <p>Email: <?php echo $row['email']; ?></p>
                            <p>Mobile Number: <?php echo $row['phone']; ?></p>
                            <p>Message: <?php echo $row['message']; ?></p>
                            <button type="submit" id="delete_btn" class="btn" onclick="return confirm('delete this message?');">Delete</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo '<h2>You Have No Messages</h2>';
        }
        ?>
    </main>

    <script>
        // let btn = document.getElementById('delete_btn');

        // btn.addEventListener('click()', ()=>{
        //     let sure = confirm("delete this message?");
        //     if(sure == true){
        //         <?php $delete = true; ?>
        //     }
        //     else{
        //         <?php $delete = false; ?>
        //     }
        // })
    </script>
</body>

</html>
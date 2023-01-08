<?php
    include '../connect.php';
    session_start();

    if(!isset($_SESSION['adminlogin'])){
        header('location: adminlogin.php');
    }
?>

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<style>
    :root{
        --admin : #192b3f;
        --color : #31c9c9;
        --special : #007f9a;
    }
    .header{
        background-color: var(--admin);
    }
    .menu a{
        color: var(--color);
    }
    .flex a{
        color: var(--color);
    }

    .profile p{
        color: var(--admin);
        padding: 5px 10px;
        margin-bottom: 5px;
    }
    .profile .flex-btns a{
        text-transform: none;
        color: var(--special);
        display: inline-block;
        width: 100%;
        padding: 8px 10px;
    }
    .profile .flex-btns a:hover{
        background-color: var(--body);
    }
</style>
<header class="header">

    <section class="flex">

        <a href="dashboard.php" class="logo"><h2>AdminPanel</h2></a>

        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="users.php">Users</a>
            <a href="product.php">Products</a>
            <a href="category.php">Category</a>
            <a href="orders.php">Orders</a>
            <a href="admins.php">Admins</a>
            <a href="messages.php">Messages</a>
        </nav>

        <div class="icons">
            <a href="#">
                <div id="user-btn" class="fas fa-user"></div>
            </a>
            <a href="#">
                <div id="hamburger" class="fas fa-bars"></div>
            </a>
            <!-- <a href="#" class="hamburger close-btn"><i class="fas fa-times"></i></a> -->
        </div>


        <!-- <a href="profile.php" class="btn">profile</a>
             <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a> -->

    </section>

    <nav class="menu">
    <a href="dashboard.php">Dashboard</a>
            <a href="users.php">Users</a>
            <a href="product.php">Products</a>
            <a href="orders.php">Orders</a>
            <a href="admins.php">Admins</a>
            <a href="messages.php">Messages</a>
    </nav>

    <div class="profile">
        <?php
            // if($login){
                echo "<p>Hello, ". $_SESSION['name'] ."</p>";
            // }
        ?>
        <div class="flex-btns">
            <a href="adminprofile.php">Profile</a><br>
            <a href="adminlogin.php">Login</a><br>
            <a href="adminlogout.php" onclick="return confirm('Are you sure you want to logged out?');">Logout</a>
            <a href="adminregister.php">Register a new admin</a><br>
        </div>
        <!-- <a href="login.php"><button class="login-btn">Login</button></a> -->
    </div>

</header>

<script>
    let hamburger = document.querySelector("#hamburger");
    let menu = document.querySelector(".menu");

    let user_btn = document.getElementById("user-btn");
    let profile = document.querySelector(".profile");

    hamburger.addEventListener("click", () => {
        menu.classList.toggle("active");
    });
    
    user_btn.addEventListener("click", () => {
        profile.classList.toggle("active");
    });

</script>
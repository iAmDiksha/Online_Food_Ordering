<?php
    include '../connect.php';
    session_start();

    if(!isset($_SESSION['adminlogin'])){
        header('location: adminlogin.php');
    }
?>
<link href="../css/css/fontawesome.css" rel="stylesheet">
<link href="../css/css/brands.css" rel="stylesheet">
<link href="../css/css/solid.css" rel="stylesheet">
<link rel="stylesheet" href="css/navbar.css">

<header class="header">

    <section class="flex">

        <a href="dashboard.php" class="logo"><h2>AdminPanel</h2></a>

        <nav class="navbar">
            <a href="dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="users.php"><i class="fas fa-users"></i> Users</a>
            <a href="product.php"><i class="fas fa-shopping-cart"></i> Products</a>
            <a href="category.php"><i class="fas fa-list"></i> Category</a>
            <a href="orders.php"><i class="fas fa-truck"></i> Orders</a>
            <a href="canceled.php"><i class="fas fa-times"></i> Cancelled Orders</a>
            <!-- <a href="admins.php">Admins</a> -->
            <a href="messages.php"><i class="fas fa-comments"></i> Messages</a>
            <a href="adminprofile.php"><i class="fas fa-user"></i> Admin Profile</a>
        </nav>

        <!-- <div class="profile"> -->
        <div class="flex-btns">
           
            <!-- <a href="adminlogin.php">Login</a><br> -->
            <a href="adminlogout.php" onclick="return confirm('Are you sure you want to logged out?');">Logout <i class="fas fa-sign-out-alt"></i></a>
            <!-- <a href="adminregister.php">Register a new admin</a><br> -->
        </div>
        <!-- <a href="login.php"><button class="login-btn">Login</button></a> -->
    <!-- </div> -->

        <!-- <div class="icons">
            <a href="#">
                <div id="user-btn" class="fas fa-user"></div>
            </a> -->
            <!-- <a href="#">
                <div id="hamburger" class="fas fa-bars"></div>
            </a> -->
            <!-- <a href="#" class="hamburger close-btn"><i class="fas fa-times"></i></a> -->
        <!-- </div> -->


        <!-- <a href="profile.php" class="btn">profile</a>
             <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a> -->

    </section>
<!-- 
    //!
    <nav class="menu">
    <a href="dashboard.php">Dashboard</a>
            <a href="users.php">Users</a>
            <a href="product.php">Products</a>
            <a href="orders.php">Orders</a>
        <a href="admins.php">Admins</a> 
             <a href="messages.php">Messages</a> 
     </nav> -->

    

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
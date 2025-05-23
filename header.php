<?php
include 'connect.php';
session_start();
$login = false;
$registered = false;
if (isset($_SESSION['registered'])) {
    if ($_SESSION['registered'] == true) {
        $registered = true;
    }
}
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == true) {
        $login = true;
    }
}
$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>

<link rel="stylesheet" href="css/header.css">

<link href="css/css/fontawesome.css" rel="stylesheet">
<link href="css/css/brands.css" rel="stylesheet">
<link href="css/css/solid.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->

<header class="header">

    <section class="flex">

        <a href="home.php" class="logo">Foodie 😋</a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="menu.php">menu</a>
            <a href="orders.php">orders</a>
            <a href="about.php">about</a>
            <a href="contact.php">contact</a>
        </nav>

        <div class="icons">
            <a href="search.php"><i class="fas fa-search"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $count ?>)</span></a>
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
        <a href="home.php">home</a>
        <a href="menu.php">menu</a>
        <a href="orders.php">orders</a>
        <a href="about.php">about</a>
        <a href="contact.php">contact</a>
    </nav>

    <div class="profile">
        <?php
        if ($registered) {
            echo "<p>Hello, " . $_SESSION['full_name'] . "</p>";
        }
        echo '<div class="flex-btns">';
        if ($registered) {
            echo '
                <a href="profile.php">Profile</a><br>
                ';
        }
        if ($login == false) {
            echo '<a href="login.php">Login</a><br>';
        }
        if ($registered) {
        ?>
               <a href="logout.php" onclick="return confirm('Are you sure you want to logged out?');">Logout</a>
        <?php
        }
        echo '</div>';
        ?>

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <title>Search</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main class="main">
        <section class="search-form">
            <form method="post" action="food.php">
                <input type="text" name="search_box" placeholder="search here..." class="box">
                <button type="submit" name="search_btn" class="fas fa-search"></button>
            </form>
        </section>
        <div class="small-title">
            <p>Search from the menu</p>
        </div>
        <div class="menuCards">
            <div class="menucard">
                <a href="paratha.php"> <img src="images/paratha.png" alt="paratha" class="menuItem"> </a>
                <p>Paratha</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/pizza.png" alt="pizza" class="menuItem"></a>
                <p>Pizza</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/sandwich.png" alt="sandwich" class="menuItem"></a>
                <p>Sandwich</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/noodles.png" alt="noodles" class="menuItem"></a>
                <p>Noodles</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/pasta.png" alt="pasta" class="menuItem"></a>
                <p>Pasta</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/pavbhaji.png" alt="pav bhaji" class="menuItem"></a>
                <p>Pav Bhaji</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/drinks.jpg" alt="drinks" class="menuItem"></a>
                <p>Drinks</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/chaat.png" alt="chaat" class="menuItem"></a>
                <p>Chaat</p>
            </div>
            <div class="menucard">
                <a href=""><img src="images/burger.png" alt="burger" class="menuItem"></a>
                <p>Burger</p>
            </div>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
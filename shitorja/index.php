<?php
session_start();

$eshte_login = !empty($_SESSION['ID']);
// Kontrolloni nëse është kyqur një përdorues
if ($eshte_login) {
    // Merrni emrin e përdoruesit nga sesioni
    $emri_perdoruesit = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div class="container">
        <h1>Online shop</h1>
        <nav>
            <ul>
                <li><a href=index.php>Home</a></li>
                <?php
                if ($eshte_login) {
                    if ($emri_perdoruesit != "admin") {
                    echo '<li><a href="shporta.php">Shporta</a></li>';
                    }
                    echo '<li><span>Mirësevini, ' . $emri_perdoruesit . '</span></li>';               
                    if ($emri_perdoruesit == "admin") {
                        echo '<li><a href="blerjet.php">Blerjet</a></li>';   
                    }
                }
                ?>
                <?php
                if ($eshte_login) {
                ?>
                <li><a href=logout.php>Logout</a></li>
                <?php
                } else {
                ?>
                    <li><a href=register.html>Regjistrohu</a></li>
                    <li><a href=login.html>Login</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</header>


    <section class="banner">
        <div class="container">
            <h2>Mirësevini në Dyqanin tonë Online</h2><br>
            <p>Zbuloni produktet dhe ofertat tona më të fundit.</p>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <h2>Produktet Tona</h2>
            <div class="product">
            <img src="laptop.jpg" alt="Product 1" width="50">
                <h3>Laptop Lenovo IdeaPad 3 15ALC6, 15.6", AMD Ryzen 5, 8GB RAM, 512GB SSD, AMD  </h3>
                <p>600 €</p>
                <?php
                if ($eshte_login) {
                ?>
                <button type="button" onclick="shtoArtikull('Laptop Lenovo IdeaPad 3', this)">Shto në shportë</button>
                <?php
                }
                ?>
                </div>
            <div class="product">
            <img src="PC.jpg" alt="Product 2" width="50">
                <h3>Kompjuter Gjirafa50 FenixSeries 23, Intel Core i5-14400F, 16GB RAM, 500GB SSD</h3>
                <p>890 €</p>
                <?php
                if ($eshte_login) {
                ?>
                <button type="button" onclick="shtoArtikull('Kompjuter FenixSeries 23', this)">Shto në shportë</button>
                <?php
                }
                ?>
                </div>
            <div class="product">
            <img src="iphone.jpg" alt="Product 3" width="50">
                <h3>Apple iPhone 15 Pro Max, 256GB, Natural Titanium <br> <br> <br></h3>
                <p>1,579 € <br><br></p>
                <?php
                if ($eshte_login) {
                ?>
                <button type="button" onclick="shtoArtikull('Apple iPhone 15 Pro Max', this)">Shto në shportë</button>
                <?php
                }
                ?>
                </div>
            <div class="product">
            <img src="TV.jpg" alt="Product 4" width="50">
                <h3>Televizor Samsung UE58CU7172UXXH, 58", 4K UHD, i zi</h3>
                <p>500 €</p>
                <?php
                if ($eshte_login) {
                ?>
                <button type="button" onclick="shtoArtikull('Televizor Samsung', this)">Shto në shportë</button>
                <?php
                }
                ?>
                </div>
            <div class="product">
            <img src="MAC.jpg" alt="Product 5" width="50">
                <h3>Apple MacBook Air 13.6", M2 8-core, 8GB, 256GB, 8-core GPU, Midnight  </h3>
                <p>1200 €</p>
                <?php
                if ($eshte_login) {
                ?>
                <button type="button" onclick="shtoArtikull('Apple MacBook Air', this)">Shto në shportë</button>
                <?php
                }
                ?>
                </div>
            
            <!-- Add more products as needed -->
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Online Shop. All rights reserved.</p>
        </div>
    </footer>
    "<script src='script.js'></script>";
    

        <script src='//fw-cdn.com/11488271/4152513.js'chat='true'> </script>
        
        <script src="//code.tidio.co/6y6vwlbkvzrzsroeq7nwu9yu8esjo1zy.js" async></script>

</body>
</html>

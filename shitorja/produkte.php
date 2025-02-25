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
                <li><a href="#">About</a></li>
                <?php
                if ($eshte_login) {
                    echo '<li><a href="shporta.php">Shporta</a></li>';
                    echo '<li><span>Mirësevini, ' . $emri_perdoruesit . '</span></li>';
                    
                    
                    
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

    <div class="container">
        <h2>Lista e Artikujve për Blerje</h2>
        <?php
      
      // Lidhja me databazën
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "shitorja";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_shporta = "SELECT artikulli.id, artikulli.emri, artikulli.çmimi
                        FROM artikulli 
                        INNER JOIN klienti_artikulli
                        ON artikulli.id = klienti_artikulli.id_artikulli 
                        WHERE klienti_artikulli.id_klienti = " . $_SESSION['ID'] . " 
                        AND klienti_artikulli.statusi = 'shtuar në shportë'";

        $result_shporta = $conn->query($sql_shporta);

        if ($result_shporta->num_rows > 0) {
            echo "<form action='procesi_blerjes.php' method='post'>";
            echo "<table border='1'>";
            echo "<tr><th>Emri i Artikullit</th><th>Çmimi</th></tr>";
            while ($row = $result_shporta->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["emri"]."</td><td>".$row["çmimi"]."</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Forma për të pranuar emrin, emailin, dhe adresën e blerësit
            echo "<h2>Informacioni i Blerësit</h2>";
            echo "<label for='emri'>Emri:</label><br>";
            echo "<input type='text' id='emri' name='emri'><br>";
            echo "<label for='email'>Email:</label><br>";
            echo "<input type='text' id='email' name='email'><br>";
            echo "<label for='adresa'>Adresa:</label><br>";
            echo "<textarea id='adresa' name='adresa'></textarea><br><br>";
            echo "<input type='submit' value='Blerje'>";
            echo "</form>";
        } else {
            echo "Nuk ka artikuj në shportë.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

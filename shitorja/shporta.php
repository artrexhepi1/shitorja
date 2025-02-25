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
    
    <form action="delete.php" method="post"> <!-- Forma e dhënies së veprimit për fshirjen -->
        
            <?php
            // Lidhja me databazën
            $servername = "localhost";
$username = "root";
$password = "";
$dbname = "shitorja";
                  
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kontrolloni lidhjen
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Shfaqni artikujt e shtuar në shportë
            $sql_shporta = "SELECT artikulli.id, artikulli.emri, artikulli.çmimi, klienti_artikulli.id AS id
            FROM artikulli 
            INNER JOIN klienti_artikulli
            ON artikulli.id = klienti_artikulli.id_artikulli 
            WHERE klienti_artikulli.id_klienti = " . $_SESSION['ID'] . " 
            AND klienti_artikulli.statusi = 'shtuar në shportë'";

            $result_shporta = $conn->query($sql_shporta);

            if ($result_shporta->num_rows > 0) {
                $total_cmimi = 0; // Variabël për të mbajtur totalin e çmimit

                echo "<h1>Shporta</h1>";
                echo "<table border='1'>";
                echo "<tr><th>Selekto</th><th>emri i artikullit</th><th>Çmimi</th></tr>";
                while ($row = $result_shporta->fetch_assoc()) {
                    echo "<tr>";
                    
                    echo "<td><input type='checkbox' name='artikull_id[]' value='".$row['id']."'></td>";
                    echo "<td>".$row["emri"]."</td><td>".$row["çmimi"]."</td>";
                    echo "</tr>";
                    $total_cmimi += $row["çmimi"]; // Shtoni çmimin e artikullit në total
                }

                // Shtoni një rresht për totalin e çmimit dhe butonin e fshirjes
                echo "<tr>
                        <td colspan='3' align='right'><strong>Totali</strong>: $total_cmimi <input type='submit' name='fshi_artikujt' value='Fshi Artikujt e Zgjedhur'></td>
                        </tr>";              
                echo "</table>";
            } else {
                echo "Shporta është e zbrazët.";
            }

            $conn->close();
            ?>
    </form>
    <a href="produkte.php"><button>Blej</button></a>
</body>
</html>
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
        </nav>
    </div>
</header>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shitorja";

// Lidhja me bazën e të dhënave
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrolloni lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Përmbledhje e informacionit për blerjet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_blerja = $_POST['id_blerja'];

    // Merrni informacionin e blerjes
    $sql_blerja = "SELECT * FROM blerja WHERE id = $id_blerja";
    $result_blerja = $conn->query($sql_blerja);

    if ($result_blerja->num_rows > 0) {
        $row_blerja = $result_blerja->fetch_assoc();
        echo "<h2>Informacioni për Blerjen (ID: $id_blerja)</h2>";
        echo "<p>Emri i Blerësit: " . $row_blerja['emri'] . "</p>";
        echo "<p>Emaili i Blerësit: " . $row_blerja['email'] . "</p>";
        echo "<p>Adresa e Blerësit: " . $row_blerja['adresa'] . "</p>";

        // Merrni artikujt e lidhur me blerjen
        $sql_artikujt = "SELECT a.emri AS emri_artikulli, a.çmimi AS çmimi_artikulli
                         FROM blerja_artikulli ba
                         INNER JOIN artikulli a ON ba.id_artikulli = a.id
                         WHERE ba.id_blerja = $id_blerja";
        $result_artikujt = $conn->query($sql_artikujt);

        if ($result_artikujt->num_rows > 0) {
            $total_cmimi = 0; // Variabël për të mbajtur totalin e çmimeve

            echo "<h3>Artikujt e Blerë:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Emri i Artikullit</th><th>Çmimi</th></tr>";
            while ($row_artikull = $result_artikujt->fetch_assoc()) {
                echo "<tr><td>" . $row_artikull['emri_artikulli'] . "</td><td>" . $row_artikull['çmimi_artikulli'] . "</td></tr>";
                $total_cmimi += $row_artikull['çmimi_artikulli']; // Shtoni çmimin e artikullit në total
            }
            echo "<tr><td><strong>Totali</strong></td><td>$total_cmimi</td></tr>";
            echo "</table>";
        } else {
            echo "Nuk ka artikuj për këtë blerje.";
        }
    } else {
        echo "Blerja nuk u gjet.";
    }
}

// Merrni listën e blerjeve nga baza e të dhënave
$sql_lista_blerjeve = "SELECT id, emri FROM blerja";
$result_lista_blerjeve = $conn->query($sql_lista_blerjeve);
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="id_blerja">Zgjedh Blerësin:</label>
    <select name="id_blerja" id="id_blerja">
        <?php
        if ($result_lista_blerjeve->num_rows > 0) {
            while ($row_lista_blerjeve = $result_lista_blerjeve->fetch_assoc()) {
                echo "<option value='" . $row_lista_blerjeve['id'] . "'>" . $row_lista_blerjeve['emri'] . "</option>";
            }
        } else {
            echo "<option value=''>Nuk ka blerje të disponueshme</option>";
        }
        ?>
    </select>
    <input type="submit" value="Shiko Informacionin">
</form>

<?php
// Mbyll lidhjen me bazën e të dhënave
$conn->close();
?>
</body>

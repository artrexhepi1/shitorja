<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shitorja";


// Lidhja me databazën
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrolloni lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Merrni të dhënat nga forma e blerjes
$emri = $_POST['emri'];
$email = $_POST['email'];
$adresa = $_POST['adresa'];

// Shto të dhënat në tabelën e blerjeve
$sql_blerja = "INSERT INTO `blerja` (`emri`, `email`, `adresa`) VALUES ('$emri', '$email', '$adresa')";

if ($conn->query($sql_blerja) === TRUE) {
    $last_blerja_id = $conn->insert_id; // Merrni ID e blerjes së fundit

    // Merrni artikujt nga tabela e shportës dhe shtoni ata në tabelën e blerjeve
    $sql_artikujt = "SELECT id_artikulli FROM klienti_artikulli WHERE id_klienti = " . $_SESSION['ID'] . " AND statusi = 'shtuar në shportë'";
    $result_artikujt = $conn->query($sql_artikujt);

    if ($result_artikujt->num_rows > 0) {
        while ($row = $result_artikujt->fetch_assoc()) {
            $id_artikulli = $row['id_artikulli'];
            // Shto artikullin në tabelën e blerjeve
            $sql_insert_artikull = "INSERT INTO `blerja_artikulli` (`id_blerja`, `id_artikulli`) VALUES ('$last_blerja_id', '$id_artikulli')";
            $conn->query($sql_insert_artikull);
        }
        // Shfaq mesazhin në një popup dhe drejto përdoruesin në faqen "produkte.php"
        echo "<p>Blerja u krye me sukses!</p>";
        echo "<script>
                setTimeout(function(){
                    window.location.href = 'shporta.php';
                }, 3000); // 3 sekonda
              </script>";
    } else {
        echo "<script>alert('Gabim gjatë blerjes: Nuk ka artikuj në shportë.');</script>";
    }
} else {
    echo "<script>alert('Gabim gjatë blerjes: " . $conn->error . "');</script>";
}

// Mbyll lidhjen me bazën e të dhënave
$conn->close();
?>

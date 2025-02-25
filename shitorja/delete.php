<?php
session_start();
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

// Përpunimi i fshirjes së artikujve të zgjedhur
if(isset($_POST['fshi_artikujt'])) {
    if(!empty($_POST['artikull_id'])) {
        foreach($_POST['artikull_id'] as $selected) {
            $sql_delete = "DELETE FROM klienti_artikulli WHERE id_klienti = " . $_SESSION['ID'] . " AND id = $selected";
            if ($conn->query($sql_delete) === TRUE) {
                } else {
                echo "Gabim: " . $sql_delete . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();

// Përsëritja e faqes në shportë pas fshirjes
header('Location: shporta.php');
exit();
?>

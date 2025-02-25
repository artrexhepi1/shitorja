<?php
session_start();
// Lidhja me bazën e të dhënave
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shitorja";

// Krijimi i lidhjes
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrolli i lidhjes
if ($conn->connect_error) {
    die("Lidhja me databazën dështoi: " . $conn->connect_error);
}

// Kontrolli për kërkesën POST dhe ekzistencën e artikullit të dërguar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artikull'])) {
    // Merr emrin e artikullit nga kërkesa
    $emri_artikullit = $_POST['artikull'];

    // Përgatisni deklaratën SQL për të gjetur ID e artikullit duke u bazuar në emrin e artikullit
    $sql = "SELECT id FROM artikulli WHERE emri = ?";
    
    // Përgatisni deklaratën e përgatitur
    $stmt = $conn->prepare($sql);
    
    // Bind parametrat
    $stmt->bind_param("s", $emri_artikullit);
    
    // Ekzekutoni deklaratën përgatitore
    $stmt->execute();
    
    // Marrni rezultatin
    $result = $stmt->get_result();
    
    // Kontrolloni nëse ka rezultat
    if ($result->num_rows > 0) {
        // Merrni rreshtin e parë nga rezultati
        $row = $result->fetch_assoc();
        
        // Merrni ID e artikullit
        $id_artikulli = $row["id"];
        
        // Vendosni klientin për të cilin po shtohet artikulli (këtu e presupozojmë ID-në e klientit)
        $id_klienti = $_SESSION["ID"]; // Përdoruesi me ID 1
        
        // Përgatisni deklaratën SQL për të shtuar artikullin në tabelën klienti_artikulli
        $sql_shto = "INSERT INTO klienti_artikulli (id_klienti, id_artikulli, statusi) VALUES (?, ?, 'shtuar në shportë')";
        
        // Përgatisni deklaratën përgatitore
        $stmt_shto = $conn->prepare($sql_shto);
        
        // Bind parametrat
        $stmt_shto->bind_param("ii", $id_klienti, $id_artikulli);
        
        // Ekzekutoni deklaratën përgatitore për të shtuar artikullin
        if ($stmt_shto->execute()) {
            echo "Artikulli u shtua në shportë me sukses.";
        } else {
            echo "Gabim gjatë shtimit të artikullit në shportë: " . $stmt_shto->error;
        }
    } else {
        echo "Artikulli nuk u gjet në bazën e të dhënave.";
    }
    
    // Mbyllni deklaratën përgatitore
    $stmt->close();
    $stmt_shto->close();
}

// Mbyllni lidhjen me bazën e të dhënave
$conn->close();
?>

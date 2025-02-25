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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Marrja e të dhënave të postuara
$username = $_POST['username'];
$password = md5($_POST['password']);

// Query për të kontrolluar nëse ekziston një përdorues me këto kredenciale
$sql = "SELECT * FROM klienti WHERE emri='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Kontrolli i rezultatit
if (mysqli_num_rows($result) > 0) {
    $user = $result->fetch_assoc();
    // Përdoruesi është gjetur, ruaj sesionin dhe ridrejto në faqen kryesore
    $_SESSION['ID'] = $user['id'];
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    // Përdoruesi nuk u gjet, kthehu në faqen e login
    header("Location: login.html");
}

mysqli_close($conn);
?>

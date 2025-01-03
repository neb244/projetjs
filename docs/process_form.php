<?php
$servername = "localhost"; // Changez si nécessaire
$username = "root"; // Changez si nécessaire
$password = "root"; // Changez si nécessaire
$dbname = "contact_form";
$port = 3306; // Port MySQL utilisé par MAMP


// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $company = $conn->real_escape_string($_POST['company']);
    $website = $conn->real_escape_string($_POST['website']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insertion des données dans la base de données
    $sql = "INSERT INTO contacts (name, email, phone, company, website, message)
            VALUES ('$name', '$email', '$phone', '$company', '$website', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

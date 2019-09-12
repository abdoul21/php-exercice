<?php
$servername = "localhost";
$username = "abdou";
$password = "Simplon.974";
$dbname= "utilisateur1";

$mot_de_passe=$_GET["pass"];
$remot_de_passe=$_GET["repass"];
$pseudo = $_GET["pseudo"];
$email = $_GET["email"];
  
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($mot_de_passe == $remot_de_passe) {
    echo('mot de passe correcte');
// Hachage du mot de passe
$pass_hache = password_hash($_GET['pass'], PASSWORD_DEFAULT);

$sql = "INSERT INTO membres (id, pseudo, pass, email, date_inscription )
VALUES (null, '$pseudo', '$pass_hache', '$email',CURDATE());";
} else {
     echo('mot de passe incorecte');
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
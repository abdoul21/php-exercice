//
<?php
$servername = "localhost";
$username = "abdou";
$password = "Simplon.974";
$dbname = "utilisateur1";

$pseudo=$_POST["pseudo"];
$pass=$_POST["pass"];


try {//pour ce connecter a mysql
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// en vas selectioner le id et le pass pour la connection    
    $stmt = $conn->prepare("SELECT id, pass FROM membres WHERE pseudo = '$pseudo'"); 
    $stmt->execute();
//dure a trouver a garder
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($bonne_ligne);
// Comparaison du pass envoyé via le formulaire avec la base
$ver = password_verify($pass, $result['pass']);

if (!$result)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($ver) {
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo($pseudo);

        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
header('Location: nou_commande.php');
?>
<?php
$servername = "localhost";
$username = "abdou";
$password = "Simplon.974";
$dbname = "utilisateur1";

session_start();
$id =$_SESSION["id"];
$pseudo = $_SESSION["pseudo"];
$choix = $_POST["choix"];
$prix = $_POST["prix"];
echo $pseudo;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT ID FROM commande ORDER BY ID DESC LIMIT 1;");
    $stmt->execute();
    $resultat = $stmt->fetch();
    $num=$resultat['ID'];

    if (empty($num)) {
        $num=0;
}
        $num++;
        $sql = "INSERT INTO commande(ID, NC, Nomclient, Article, Date, Prix)
    VALUES (null, '$num', '$pseudo', '$choix', CURDATE(),'$prix')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "commende accepter";
    

    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    

$conn = null;
?>
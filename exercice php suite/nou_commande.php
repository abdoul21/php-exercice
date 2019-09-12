
<!DOCTYPE html>
<html lang="en">

<head>
    <title>inscription</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
</head>

<body>

    <div class="row">

        <div class="col-4"></div>
        <div class="col-4">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <?php
                     session_start();
                     $id =$_SESSION["id"];
                     $pseudo = $_SESSION["pseudo"];
                     $choix = $_POST["choix"];
                     $prix = $_POST["prix"];

                     echo "$pseudo est connecter"
                    ?>
                    <a class="nav-link active" href="conection.html">deconection</a>
                    <a class="nav-link active" href=""></a>

                </li>
            </ul>
            <br>
            <div style="text-align: center" class="input-group mb-3">
                <form class="col-12 contact1-form validate-form" action="nou_commande.php" method="post">
                    <h2>choisie un article</h2>
                    <select class="custom-select" id="mySelect" onchange="myFunction()" name="choix">
                        <option selected value="vide">...</option>
                        <option value="souris">souris</option>
                        <option value="clavier">clavier</option>
                        <option value="webcam">webcam</option>
                    </select>
                    <br>
                    <input type="text" name="prix" value="" id="prix" style="display: none" >
                    <h1 id="prix1"></h1>
                    <br>
                    

                    <input type="submit" class="btn btn-info" value="commender">
                </form>


                
            </div>
        </div>
        <div class="col-4"></div>
    </div>



<div class="row">
<div class="col-2"></div>
<table class="table col-8">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NC</th>
      <th scope="col">Nomclient</th>
      <th scope="col">Article</th>
      <th scope="col">Date</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
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
$vide = $_POST["vide"];
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
    
    

    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    



    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8', $username, $password");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $bdd->set_charset("utf8");
echo $pseudo;
// On récupère tout le contenu de la table utilisateur
$stm = $bdd->prepare("SELECT Nomclient FROM commande ORDER BY ID DESC LIMIT 1;");
$stm->execute();
$reponse = $stm->fetch();

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <tr>
      <th scope="row"><?php echo $donnees['ID']; ?></th>
      <td><?php echo $donnees['NC']; ?></td>
      <td><?php echo $donnees['Nomclient'];?></td>
      <td><?php echo $donnees['Article'];?></td>
      <td><?php echo $donnees['Date'];?></td>
      <td><?php echo $donnees['Prix'];?></td>
      
      
    </tr>

<?php 
}
$reponse = null;

?>
<caption>liste de commande</caption>
</tbody>
</table>
<div class="col-2"></div>
</div>
</body>
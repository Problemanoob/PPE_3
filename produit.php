<?php
$hostname = "192.168.1.80";
$user = "admin";
$pwd = "btssio32";
$database = "sponsoroy";
$connexion = mysqli_connect($hostname, $user, $pwd, $database);
mysqli_set_charset($connexion, "utf8");

if (!$connexion) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GarageRoy - Produits</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
</head>
<header>
    <center><a href="index.html"><img src="img/Logo.png"></a></center>
</header>

<body>
    <span class="produit">Voici nos produits:</span>
    <a href="sponsors.php" class="bouton-sponsors">Sponsors</a>

    <?php
    $sqlQuery = "SELECT nom_produit,prix,type_produit FROM produit;";
    $result = $connexion->query($sqlQuery);
    echo "<table border='1'>";

            while ($row = $result->fetch_row()) {
                printf("<div class='tableau_evenement'>$row[0] <br> Prix du produit $row[1]€ <br> $row[2]</div>");
            }

            echo "</table>";

            $connexion->close();
    ?>
</body>
</html>
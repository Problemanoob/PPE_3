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
    <span class="produit">Voici nos Evenement:</span>
    <a href="sponsors.php" class="bouton-sponsors">Sponsors</a>


    <?php
    echo "<table border='1'>";
    $query = "SELECT nom_evenement, date_debut, date_fin, lieu, description, type_evenement  FROM evenement";
    $result = $connexion->query($query);
    while ($row = $result->fetch_row()) {
        echo "<tr>";
        echo "<td><div class='tableau_evenement'>
                    $row[0] Débute du $row[1] au $row[2] dans le $row[3]
                    <br>
                     $row[4] <br> $row[5]";
        echo "<td><input type='checkbox' name='selected_products[]'</td>";
        echo "</tr>";

    }
    echo "</table>";


    $connexion->close();
    ?>


    </ul>
</body>

</html>
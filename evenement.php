<?php

$hostname = "192.168.1.80";
$user = "admin";
$pwd = "btssio32";
$database = "sponsoroy";
$connexion = mysqli_connect($hostname, $user, $pwd, $database);


if (!$connexion) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT nom_evenement FROM evenement";
$result = $connexion-> query($query);
while ($row = $result->fetch_row()) {
    printf($row[0]);
}
  
$connexion->close();


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
        

        <table border="1">
            <thead>
                <tr>
                    <th>Nom de l'événement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nom_evenement'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

      
        </ul>
    </body>
</html>
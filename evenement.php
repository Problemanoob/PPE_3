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
            $query = "SELECT nom_evenement, date_debut, date_fin, lieu, description, type_evenement  FROM evenement";
            $result = $connexion-> query($query);
            while ($row = $result->fetch_row()) {
                printf("<div class='tableau_evenement'>
                    s $row[0] Débute du $row[1] aux $row[2] 
                    <br> 
                    Lieu : $row[3] <br> $row[4] <br> $row[5] 
                    
                </div>");

            }


            $connexion->close();
        ?>

      
        </ul>
    </body>
</html>
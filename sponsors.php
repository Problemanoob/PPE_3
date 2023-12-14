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
echo var_dump($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>GarageRoy - Sponsors</title>
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    </head>
    <header>
        <center><a href="index.html"><img src="img/Logo.png"></a></center>
    </header>

    <body>
        <span class="produit">Voici nos sponsors:</span>
        <a href="evenement.php" class="bouton-sponsors">Evenement</a>
        <?php
            $query = "SELECT prenom,nom,nationalite,categorie,voiture FROM sponsor";
            $result = $connexion-> query($query);
            while ($row = $result->fetch_row()) {
                printf("<div class='tableau_evenement'>
                    $row[0] $row[1] $row[2] 
                    <br> 
                    $row[3] <br> $row[4] <br>
                    
                </div>");

            }


            $connexion->close();
        ?>

      
        </ul>
</body>
</html>
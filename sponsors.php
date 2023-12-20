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

session_start(); // Démarrez la session au début de votre fichier

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
    <form method="post" action="sponsors.php">
        <span class="produit">Voici nos sponsors:</span>
        <a href="index.html" class="bouton-sponsors">Terminé</a>

        <?php
        $query = "SELECT prenom, nom, nationalite, categorie, voiture FROM sponsor";
        $result = $connexion->query($query);

        echo "<table border='1'>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td><div class='tableau_evenement'>
                    $row[0] $row[1] $row[2] 
                    <br> 
                    $row[3] <br> $row[4] <br></div></td>";

            // Utilisez $_SESSION['selected_products'] au lieu de $_POST['selected_products']
            if (isset($_SESSION['selected_products'])) {
                foreach ($_SESSION['selected_products'] as $selectedProduct) {
                    echo "<td><input type='checkbox' name='selected_products[]' value='$selectedProduct' checked></td>";
                }
            } else {
                echo "<td><input type='checkbox' name='selected_products[]' value=''></td>";
            }

            echo "</tr>";
        }

        echo "</table>";
        ?>
    </form>

    <?php
    $connexion->close();
    ?>
</body>

</html>
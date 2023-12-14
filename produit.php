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

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Vérifier si des produits ont été sélectionnés
    if (isset($_POST['selected_products']) && is_array($_POST['selected_products'])) {
        // Stocker les produits sélectionnés dans une variable de session
        session_start();
        $_SESSION['selected_products'] = $_POST['selected_products'];

        // Rediriger vers la page sponsors.php
        header("Location: sponsors.php");
        exit();
    }
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class="produit">Voici nos produits:</span>
        <a href="sponsors.php" class="bouton-sponsors">Sponsors</a>

        <?php
        $sqlQuery = "SELECT id_produit, nom_produit, prix, type_produit FROM produit;";
        $result = $connexion->query($sqlQuery);

        echo "<table border='1'>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><div class='tableau_evenement'>$row[nom_produit] <br> Prix du produit : $row[prix]€ <br> Catégorie : $row[type_produit]</div></td>";
            echo "<td><input type='checkbox' name='selected_products[]' value='$row[id_produit]'></td>";
            echo "</tr>";
        }

        echo "</table>";

        $connexion->close();
        ?>

        <input type="submit" name="submit" value="Sélectionner">
    </form>
</body>
</html>
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

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

    // filtrer les produits 
    $sqlQuery = "SELECT id_produit, nom_produit, prix, type_produit FROM produit WHERE nom_produit LIKE '%$searchTerm%';";
} else {
    
    $sqlQuery = "SELECT id_produit, nom_produit, prix, type_produit FROM produit;";
}


// Filtre par destination
if (isset($_POST['search_name_Produit'])) {
    $destination = $_POST['search_name_Produit'];
    $query .= " AND nom_produit like '%$destination%'";
}

// Filtre par date de départ
if (!empty($_POST['PrixMin'])) {
    $date_depart = $_POST['PrixMin'];
    $query .= " AND PrixMin >= '$date_depart'";
}

// Filtre par date de fin
if (!empty($_POST['PrixMax'])) {
    $date_fin = $_POST['PrixMax'];
    $query .= " AND PrixMax <= '$date_fin'";
}

// Filtre par prix
if (!empty($_POST['TypeProduit'])) {
    $prix = $_POST['TypeProduit'];
    $query .= " AND TypeProduit <= $prix";
}

//Préparation de la requête par PDO
$statment = $mysqlConnection->prepare($query);
//Execution de la requête
if ($statment->execute()) {
  //le resultat est retourné sous forme de tableau
  $voyages = $statment->fetchAll();
  // Affichage des résultats
if (true) {
    while ($row = $statment->fetchAll()) {
        echo "Nom Produit: " . $row["search_name_Produit"] . "<br>";
        echo "Date Minimal: " . $row["PrixMin"] . "<br>";
        echo "Date Maximal: " . $row["PrixMax"] . "<br>";
        echo "Type: " . $row["TypeProduit"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

}

$result = $connexion->query($sqlQuery);

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

    <!-- Barre de recherche -->
    <form action="Accueil.php" method="POST">
        <div class="rechercherProduits">

                <h1>Chercher les Produits</h1>

                <div class="search_name_Produit">
                    <input name="search_name_Produit" type="text" placeholder="Nom Produit" style="height:30px;" value="" required>
                </div>

                <div class="PrixMin">
                    <input type="text" placeholder="Prix Minimal" style="height:30px;" value="" >
                </div>

                <div class="PrixMax">
                    <input type="text" placeholder="Prix Maximal" style="height:30px;" value="" >
                </div>

                <div class="TypeProduit">
                    <input type="text" placeholder="Produit" style="height:30px;" value="" >
                </div>

                <div class="Search">
                    <button class="buton_search" type="submit" style="height:30px;">Recherche<i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
        </div>
    </form>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
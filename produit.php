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
        <?
        $hostname = "192.168.1.80";
        $user = "admin";
        $pwd = "btssio32";
        $database = "sponsoroy";
        $return = null;

        $connexion = mysqli_connect($hostname, $user, $pwd, $database);
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $mysqlConnection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $user, $pwd);
            $sqlQuery = "SELECT nom_produit AS Nom,prix AS Prix,type_produit AS Catégorie FROM produit;";
            $stmt = $mysqlConnection->prepare($sqlQuery);
} catch (PDOException $error) {
    echo 'Échec de la connexion : ' . $error->getMessage();
}
echo $sqlQuery;
$return = $stmt->execute([]);
$return = $stmt->fetch();
        ?>
        <ul>
            <? foreach($return as $produit){ ?>
            <li>
                <h3>
                    <?= ""?>
                </h3>
            </li>
            <? } ?>
        </ul>
    </body>
</html>
<?php
$hostname = "192.168.1.80";
$user = "admin";
$pwd = "btssio32";
$database = "sponsoroy";
$connexion = mysqli_connect($hostname, $user, $pwd, $database);


if (!$connexion) {
	die("Connection failed: " . mysqli_connect_error());
}

session_start();

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : null;
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : null;

// Vérifier si l'email et le mot de passe sont corrects
$query  = "SELECT * FROM utilisateur WHERE email=?,";

// Exécuter la requête et stocker le jeu de résultats 
$result = mysqli_query($connexion, $query);


if ($result) 
{
    // il renvoie le nombre de lignes dans le tableau. 
    $row = mysqli_num_rows($result);

    if ($row)
    {
        printf("Number " . $row);
    }
    // fermer le résultat. 
    mysqli_free_result($result);
}


mysqli_close($connexion);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <title>GarageRoy - Produits</title>
    </head>


    <header>
        <center><a href="index.html"><img src="img/Logo.png"></a></center>
    </header>
    
    <body>

        <span class="produit">Voici nos produits:</span>
        <a href="sponsors.php" class="bouton-sponsors">Sponsors</a>
    
        <h1 class="ProfilT">Votre Profil :</h1>
        <h1 class="ProfilTXT">Nom : <?php echo $nom; ?> </h1>
        <h1 class="ProfilTXT">Prénom : <?php echo $prenom; ?></h1>
        <h1 class="ProfilTXT">Pseudonyme : <?php echo $pseudo; ?></h1>
        <h1 class="ProfilTXT">Mail : <?php echo $email; ?></h1>
        <h1 class="ProfilTXT">MDP : </h1>

    </body>

</html>
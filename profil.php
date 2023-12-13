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

var_dump($_SESSION);

$email = $_SESSION['email'];
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : null;
$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : null;

// Vérifier si l'email et le mot de passe sont corrects
$sql = "SELECT * FROM utilisateur WHERE email=?";
$stmt = mysqli_prepare($connexion, $sql);

$stmt->execute();


if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $pseudo = $row['pseudo'];
    $email = $row['email'];


	header('Location:Client.php');
	// Démarrez une session ou créez un cookie pour identifier l'utilisateur connecté
} else {
	echo "Email ou mot de passe incorrect !";
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
        <center><a href="index.html"><img src="img/Logo.png" alt="Logo"></a></center>
    </header>

    <body>

        <h1 class="ProfilT">Votre Profil :</h1>
        <h1 class="ProfilTXT">Nom : <?php echo $nom; ?> </h1>
        <h1 class="ProfilTXT">Prénom : <?php echo $prenom; ?></h1>
        <h1 class="ProfilTXT">Pseudonyme : <?php echo $pseudo; ?></h1>
        <h1 class="ProfilTXT">Mail : <?php echo $email; ?></h1>
        <h1 class="ProfilTXT">MDP : </h1>
        <p>LebronJames XD</p>

    </body>

</html>
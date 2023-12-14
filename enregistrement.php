<?php
$hostname = "192.168.1.80";
$user = "admin";
$pwd = "btssio32";
$database = "sponsoroy";
$connexion = mysqli_connect($hostname, $user, $pwd, $database);

try {
    $mysqlConnection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $user, $pwd);
    $sqlQuery = "INSERT INTO utilisateurs (nom,prenom,pseudo,email,mdp) VALUES (:nom,:prenom,:pseudo,:email,:mdp);";
    $stmt = $mysqlConnection->prepare($sqlQuery);



} catch (PDOException $error) {
    echo 'Échec de la connexion : ' . $error->getMessage();
}

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["pseudo"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $mdp = password_hash($_POST["password"], PASSWORD_DEFAULT);


    $return = $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pseudo' => $pseudo,
        ':email' => $email,
        ':mdp' => $mdp

    ]);

    if ($return) {

        session_start();
        $_SESSION['email'] = $email;
        

        header('Location: profil.php');
    } else {
        echo "Erreur lors de l'insertion : " . implode(" ", $stmt->errorInfo());
    }
} else {
    echo "Tous les champs du formulaire ne sont pas définis.";
}
?>
<?
$hostname = "192.168.1.80";
$user = "admin";
$pwd = "btssio32";
$database = "sponsoroy";

$connexion = mysqli_connect($hostname, $user, $pwd, $database);

try {
    $mysqlConnection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $user, $pwd);
    $sqlQuery = "SELECT pseudo,mdp FROM utilisateurs WHERE pseudo = '".$_POST["pseudo"]."';";
    $stmt = $mysqlConnection->prepare($sqlQuery);
} catch (PDOException $error) {
    echo 'Échec de la connexion : ' . $error->getMessage();
}
if (
	isset($_POST["pseudo"]) &&
	isset($_POST["password"])
){
	$pseudo = $_POST["pseudo"];
	$mdp = $_POST["password"];
	$return = $stmt->execute([
		'pseudo' => $pseudo
	]);
	$return = $stmt -> fetch();
	if ($pseudo == $return['pseudo'] && password_verify($mdp,$return['mdp'])){
		header('Location: profil.php');
	}
	else{
		echo("Erreur de connexion. Veuillez réessayez s'il-vous-plaît.");
	}
}
else {
    echo "Tous les champs du formulaire ne sont pas définis.";
}
?>
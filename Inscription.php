<!Doctype html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Inscription.css">
        <title>Inscription</title>
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    </head>

    <body>
        
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="enregistrement.php" method="POST">
                        <h2>S'inscrire</h2>

                        <div class="inputbox">
                            <ion-icon name="pricetag-outline"></ion-icon>
                            <input type="text" name="nom" required>
                            <label for="">Nom</label>
                        </div>

                        <div class="inputbox">
                            <ion-icon name="pricetags-outline"></ion-icon>
                            <input type="text" name="prenom" required>
                            <label for="">Prénom</label>
                        </div>

                        <div class="inputbox">
                            <ion-icon name="pricetags-outline"></ion-icon>
                            <input type="text" name="pseudo" required>
                            <label for="">Pseudonyme</label>
                        </div>
                
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name="email" required>
                            <label for="">Email</label>
                        </div>

                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="password" required>
                            <label for="">Mot de Passe</label>
                        </div>

                        <div>
                            <input class="bouton_Inscription_Connection" type="submit" value="S'inscrire">
                        </div>

                        <div class="register">
                            <p><a href="page_cacher.html">S</a>i vous avez déja un compte <a href="Connection.php"> Se connecter</a></p>
                            <br>
                            <p>Revenir a la page<a href="index.html"> Acceuil</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>

</html>
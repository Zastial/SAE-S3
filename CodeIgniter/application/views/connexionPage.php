
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="logo">
        <h2> logo</h2>
    </div>

    <div class="form-container">
        <div class="form-head">
            <h1>Connexion</h1>
        </div>

        <div class="form-input">
            <div class="email">
                <label for="email" name="email" pattern=".+@globex\.com" size="30" required>Email</label>
                <input class="input" type="email" require>
            </div>
            <div class="password">
                <label for="password">Mot de passe</label>
                <input class="input" type="password" name="password" require>
            </div>
        </div>


        <div class="form-btn">
            <button class=".btn"> Se connecter</button>
        </div>

        <div class="form-inscription-link">
            <h4>Vous n'êtes pas inscrit ?</h4>

            <a href="inscriptionPage.php"> S'inscrire</a>
        </div>
    </div>

    <div class="bars">
        <div class="bar-black"></div>
        <div class="bar-gey"></div>
        <div class="bar-orange"></div>
    </div>
</body>
</html>
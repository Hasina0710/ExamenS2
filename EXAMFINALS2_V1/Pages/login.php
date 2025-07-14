<?php
    require('../Inc/Functions.php');
    login();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="../asset/Bootsrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../asset/Bootsrap/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="get" action="">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required><br><br>
        <button type="submit">Se connecter</button><button><a href="inscription.php">inscription</a></button>
    </form>
</body>
</html>
<?php
    require('../Inc/Functions.php');
    inscription();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="Bootsrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="Bootsrap/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="get" action="">
        Nom : <input type="text" name="nom" required><br><br>
        Date de naissance : <input type="date" name="date_naissance" required><br><br>
        Genre : 
        <select name="genre" required>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
            <option value="A">Autre</option>
        </select><br><br>
        Email : <input type="email" name="email" required><br><br>
        Ville : <input type="text" name="Ville" required><br><br>
        Mot de passe : <input type="password" name="mdp" required><br><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
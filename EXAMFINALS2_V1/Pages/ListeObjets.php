<?php
    require('../Inc/Functions.php');

    if (isset($_GET['categorie'])) {
        $id_categorie = $_GET['categorie'];
    } else {
        $id_categorie = 0;
    }
    $objets = getObjet($id_categorie);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="asset/Bootsrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="asset/Bootsrap/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Objets</title>
</head>
<body>
    <h1>Liste des Objets</h1>
    <form method="get" action="">
        <select name="categorie" required>
            <option value="0" <?php if($id_categorie==0) echo 'selected'; ?>>tout</option>
            <option value="1" <?php if($id_categorie==1) echo 'selected'; ?>>Esthetique</option>
            <option value="2" <?php if($id_categorie==2) echo 'selected'; ?>>Bricolage</option>
            <option value="3" <?php if($id_categorie==3) echo 'selected'; ?>>Mecanique</option>
            <option value="4" <?php if($id_categorie==4) echo 'selected'; ?>>Cuisine</option>
        </select>
        <button type="submit">Filtrer</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Nom Objet</th>
            <th>Categorie</th>
            <th>Statut</th>
        </tr>
        <?php foreach ($objets as $objet): ?>
        <tr>
            <td><?php echo htmlspecialchars($objet['nom_objet']); ?></td>
            <td><?php echo htmlspecialchars($objet['nom_categorie']); ?></td>
            <td>
                <?php
                if (!empty($objet['date_retour'])) {
                    echo "Emprunté, retour le " . htmlspecialchars($objet['date_retour']);
                } else {
                    echo "Disponible";
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
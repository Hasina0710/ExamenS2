<?php
require('Connex.php');

function login() {
    $bdd = connex();
    if (isset($_GET['email']) && isset($_GET['mdp'])) {
        $email = $_GET['email'];
        $mdp = $_GET['mdp'];

        $query = "SELECT * FROM Projet_F_Membres WHERE email='$email' AND mdp='$mdp'";
        $result = mysqli_query($bdd, $query);

        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            header('Location: ListeObjets.php');
            exit();
        } else {
            echo "Identifiants incorrects.";
        }
    }
}

function inscription() {
    $bdd = connex();
    if (
        isset($_GET['nom']) &&
        isset($_GET['date_naissance']) &&
        isset($_GET['genre']) &&
        isset($_GET['email']) &&
        isset($_GET['Ville']) &&
        isset($_GET['mdp'])
    ) {
        $nom = $_GET['nom'];
        $date_naissance = $_GET['date_naissance'];
        $genre = $_GET['genre'];
        $email = $_GET['email'];
        $Ville = $_GET['Ville'];
        $mdp = $_GET['mdp'];

        $query = "INSERT INTO Projet_F_Membres (nom, date_naissance, genre, email, Ville, mdp) 
                  VALUES ('$nom', '$date_naissance', '$genre', '$email', '$Ville', '$mdp')";
        if (mysqli_query($bdd, $query)) {
            echo "Inscription réussie.";
        } else {
            echo "Erreur lors de l'inscription : " . mysqli_error($bdd);
        }
    }
}

function getObjet($id_categorie = 0) {
    $bdd = connex();
    if ($id_categorie == 0) {
        $query = "SELECT Projet_F_Objets.nom_objet, Projet_F_Categorie_Objets.nom_categorie, 
                         Projet_F_Categorie_Objets.id_categorie, Projet_F_Emprunts.date_retour
                  FROM Projet_F_Objets
                  JOIN Projet_F_Categorie_Objets 
                      ON Projet_F_Objets.id_categorie = Projet_F_Categorie_Objets.id_categorie
                  LEFT JOIN Projet_F_Emprunts 
                      ON Projet_F_Objets.id_objet = Projet_F_Emprunts.id_objet 
                      AND Projet_F_Emprunts.date_retour IS NOT NULL";
    } else {
        $query = "SELECT Projet_F_Objets.nom_objet, Projet_F_Categorie_Objets.nom_categorie, 
                         Projet_F_Categorie_Objets.id_categorie, Projet_F_Emprunts.date_retour
                  FROM Projet_F_Objets
                  JOIN Projet_F_Categorie_Objets 
                      ON Projet_F_Objets.id_categorie = Projet_F_Categorie_Objets.id_categorie
                  LEFT JOIN Projet_F_Emprunts 
                      ON Projet_F_Objets.id_objet = Projet_F_Emprunts.id_objet 
                      AND Projet_F_Emprunts.date_retour IS NOT NULL
                  WHERE Projet_F_Categorie_Objets.id_categorie = $id_categorie";
    }

    $result = mysqli_query($bdd, $query);
    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row;
    }
    return $objets;
}
?>

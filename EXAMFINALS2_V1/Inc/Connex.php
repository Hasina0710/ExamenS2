<?php
function connex()
{
    static $connex = null;

    if ($connex === null) {
        $connex = mysqli_connect('localhost', 'root', '', 'PROJET');

        if (!$connex) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connex, 'utf8mb4');
    }

    return $connex;
}

?>
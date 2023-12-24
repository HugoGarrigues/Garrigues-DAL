<?php

namespace Config;

use PDO;

class BddAccess {

    // Fonction qui instancie la classe PDO //
    public static function createPDO($fileName): ?PDO
    {
        // Recupération des données dans le fichier credentials.json pour se connecter a la BDd //
        $credentials = self::getCredentials($fileName);

        // Connexion à la BDD avec les infos dans le fichier json ! //
        try {
            return new PDO("mysql:host={$credentials->db_host};dbname={$credentials->db_name}", $credentials->db_user, $credentials->db_password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        } catch (\PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }

    // Fonction qui permet de récupérer les données dans le fichier credentials.json //
    private static function getCredentials($fileName) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/../credentials/' . $fileName;
        return json_decode(file_get_contents($path));
    }
}
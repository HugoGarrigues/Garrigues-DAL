<?php

namespace Services;

use PDO;

class DataManager {
    private PDO $pdo;

    // Fonction qui instancie la classe PDO //
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function selectRecord($table, $filter) {

            // Construction de la requête //
            $query = "SELECT * FROM $table" . (!empty($filter['id']) ? " WHERE id = :id" : '');

            // Préparation de la requête //
            $sql = $this->pdo->prepare($query);

            // Ajout de l'ID si renseigné par l'utilisateur //
            foreach ($filter as $key => $value) {
                $sql->bindValue(":$key", $value);
            }

            // Exécution de la requête //
            $sql->execute();

            // Affichage d'un message d'erreur si aucun livre n'est trouvé //
            if ($sql->rowCount() === 0) {
                echo "Aucun livre trouvé ! Veuillez saisir un ID valide. ";
            }

            // Affiche le livre demandé par l'utilisateur //
            return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteRecord($table, $filter) {

        // Construction de la requête //
        $query = "DELETE FROM $table WHERE id = :id";

        // Préparation de la requête //
        $sql = $this->pdo->prepare($query);

        // Ajout de l'ID si renseigné par l'utilisateur //
        $sql->bindValue(':id', $filter['id']);

        // Exécution de la requête //
        $sql->execute();

        // Affichage d'un message de confirmation ou d'erreur //
        if ($sql->rowCount() > 0) {
            echo "Le livre a bien été supprimé";
        } else {
            echo "Veuillez saisir un ID valide";
        }
    }

    public function createRecord($table, $filter) {
        $columns = implode(', ', array_keys($filter));
        $values = ':' . implode(', :', array_keys($filter));

        // Construire la requête INSERT complète
        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        // Préparation d la requête //
        $sql = $this->pdo->prepare($query);

        // Ajout des valeurs pour l'insertion //
        foreach ($filter as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        // Exécuter la requête
        $sql->execute();

        // Affichage d'un message de confirmation ou d'erreur //
        if ($sql->rowCount() > 0) {
            echo "Le livre a bien été crée";
        } else {
            echo "Veuillez saisir des données valides";
        }
    }

    public function updateRecord($table, $id, $filter) {
        // Construction de SET //
        $setClause = '';
        foreach ($filter as $key => $value) {
            $setClause .= ($setClause === '') ? "$key = :$key" : ", $key = :$key";
        }

        // Construction de la requête //
        $query = "UPDATE $table SET $setClause WHERE id = :id";

        // Préparation la requête //
        $sql = $this->pdo->prepare($query);

        // Ajout de l'ID si renseigné par l'utilisateur //
        $sql->bindValue(':id', $id);

        // Ajout des valeurs pour l'insertion //
        foreach ($filter as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        // Exécution de la requête //
        $sql->execute();

        // Affichage d'un message de confirmation ou d'erreur //
        if ($sql->rowCount() > 0) {
            echo "Le livre a bien été modifié";
        } else {
            echo "Le livre n'a pas pu être modifié";
        }
    }
}
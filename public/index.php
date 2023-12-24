<?php

// Récupération des classes nécessaires pour le Code //
require_once $_SERVER['DOCUMENT_ROOT'] . '/Garrigues-DAL/src/Config/BddAccess.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Garrigues-DAL/src/Services/DataManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Garrigues-DAL/src/Utils/UrlParser.php';

// Instance de PDO créee à partir de la classe BddAccess //
$pdo = \Config\BddAccess::createPDO('pwd.json');

// Si la connexion à la BDD est établie, on peut utiliser les fonctions de DataManager //
if ($pdo) {
    $dataManager = new \Services\DataManager($pdo);

    // Récupération des paramètres de l'URL
    $params = \Utils\UrlParser::getParams();

    // Table à utiliser
    $table = 'livres';

    // SwitchCase permettant a l'utilisateur de choisir l'action qu'il souhaite réaliser //
    switch ($params['action'])  {

        case 'select':
            // Utilisation de la fonction selectRecord qui affiche un enregistrement en fonction de l'ID demandé par l'utilisateur //
            $selectedRecords = $dataManager->selectRecord($table, ['id' => $params['id']]);
            echo json_encode($selectedRecords, JSON_PRETTY_PRINT);
            break;

        case 'selectAll':
            // Utilisation de la fonction selectRecords pour tous les enregistrements c'est a dire Select * //
            $allRecords = $dataManager->selectRecord($table, []);
            echo json_encode($allRecords, JSON_PRETTY_PRINT);
            break;

        case 'delete':
            // Utilisation de la fonction deleteRecord qui supprime un enregistrement //
            $dataManager->deleteRecord($table, ['id' => $params['id']]);
            break;

        case 'create':
            // Utilisation de la fonction createRecord qui crée un enregistrement en fonction des données renseignés par l'utilisateur //
            $dataManager->createRecord($table, [
                'titre' => $params['titre'],
                'auteur' => $params['auteur'],
                'annee_publication' => $params['annee'],
                'prix' => $params['prix']
            ]);
            break;

        case 'update':
            // Utilisation de la fonction updateRecord qui modifie un enregistrement en fonction des données renseignés par l'utilisateur //
            $dataManager->updateRecord($table, $params['updateId'], [
                'titre' => $params['updateTitre'],
                'auteur' => $params['updateAuteur'],
                'annee_publication' => $params['updateAnnee'],
                'prix' => $params['updatePrix']
            ]);
            break;

        default:
            echo 'Veuillez choisir une action valide';
            break;

    }
} else {
    echo "Vous n'êtes pas connecté a la BDD !";
}

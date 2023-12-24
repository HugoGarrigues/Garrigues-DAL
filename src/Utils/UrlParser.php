<?php

namespace Utils;
class UrlParser {

    public static function getParam($name) {
        return $_GET[$name] ?? '';
    }

    // Fonction qui permet de récupérer les paramètres de l'URL ( permet d'assainir l'index.php ) //
    public static function getParams() {
        return [
            'id' => self::getParam('id'),
            'action' => self::getParam('action'),
            'titre' => self::getParam('titre'),
            'auteur' => self::getParam('auteur'),
            'annee' => self::getParam('annee'),
            'prix' => self::getParam('prix'),
            'updateId' => self::getParam('id'),
            'updateTitre' => self::getParam('titre'),
            'updateAuteur' => self::getParam('auteur'),
            'updateAnnee' => self::getParam('annee'),
            'updatePrix' => self::getParam('prix')
        ];
    }
}
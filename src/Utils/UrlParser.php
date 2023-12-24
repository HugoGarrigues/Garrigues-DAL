<?php

namespace Utils;
class UrlParser {

    public static function getFilter($name) {
        return $_GET[$name] ?? '';
    }

    // Fonction qui permet de récupérer les filtres de l'URL ( permet d'assainir l'index.php ) //
    public static function getFilters() {
        return [
            'id' => self::getFilter('id'),
            'action' => self::getFilter('action'),
            'titre' => self::getFilter('titre'),
            'auteur' => self::getFilter('auteur'),
            'annee' => self::getFilter('annee'),
            'prix' => self::getFilter('prix'),
            'updateId' => self::getFilter('id'),
            'updateTitre' => self::getFilter('titre'),
            'updateAuteur' => self::getFilter('auteur'),
            'updateAnnee' => self::getFilter('annee'),
            'updatePrix' => self::getFilter('prix')
        ];
    }
}
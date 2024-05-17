# GARRIGUES-DAL

Ce projet est un projet a réaliser dans le cadre du module PHP. <br>
Le but de ce projet est de créer un middleware et les points API associés qui exposent l'ensemble complet et sécurisé (requêtes préparées) de services d'accès aux tables de données (CRUD). <br>


## Sommaire

- [Installation](#installation)
- [Utilisation](#utilisation)
- [Base de données](#base-de-données)
- [Architecture](#architecture)
- [Technologies](#technologies)
- [Auteurs](#auteurs)

## Installation

```bash
git clone https://github.com/HugoGarrigues/Garrigues-DAL.git
Installer la base de données (voir plus bas)
```
## Utilisation

Fonction Select: `view-source:http://localhost/Garrigues-DAL/public/index.php?action=select&id=2` <br><br>
Fonction Select * : `view-source:http://localhost/Garrigues-DAL/public/index.php?action=selectAll` <br><br>
Fonction Delete : `view-source:http://localhost/Garrigues-DAL/public/index.php?action=delete&id=2` <br><br>
Fonction Update : `view-source:http://localhost/Garrigues-DAL/public/index.php?action=update&id=8&titre=Le Trone de fer 8&auteur=George R. R. Martin&annee=2021&prix=17` <br><br>
Fonction Create : `view-source:http://localhost/Garrigues-DAL/public/index.php?action=create&titre=1984&auteur=George Orwell&annee=1949&prix=21` <br><br>


## Base de données

```sql
CREATE DATABASE IF NOT EXISTS biblio;

USE biblio;


CREATE TABLE IF NOT EXISTS livres (
    id int(11) NOT NULL AUTO_INCREMENT,
    titre varchar(255) NOT NULL,
    auteur varchar(255) NOT NULL,
    annee_publication int(11) NOT NULL,
    prix int(11) NOT NULL,
    PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO livres (titre, auteur, annee_publication, prix)
VALUES
    ('Le Trone de fer 1', 'George R. R. Martin', 1996, 15),
    ('Le Trone de fer 2', 'George R. R. Martin', 1998, 15),
    ('Le Trone de fer 3', 'George R. R. Martin', 2000, 15),
    ('Le Trone de fer 4', 'George R. R. Martin', 2005, 16),
    ('Le Trone de fer 5', 'George R. R. Martin', 2011, 16),
    ('Le Trone de fer 6', 'George R. R. Martin', 2016, 17),
    ('Le Trone de fer 7', 'George R. R. Martin', 2019, 17),
    ('Le Traune de ferr 8', 'George Orwell', 1512, 5),
    ('Le Trone de fer 9', 'George R. R. Martin', 2022, 18),
    ('Le Trone de fer 10', 'George R. R. Martin', 2023, 19);
```

## Architecture

``` bash
├── wamp64
│   ├── www
│   │   └── Garrigues-DAL
│   │       ├── public
│   │       │   └── index.php
│   │       ├── src
│   │       │   ├── Config
│   │       │   │   └── BddAccess.php
│   │       │   ├── Services
│   │       │   │   └── DataManager.php
│   │       │   ├── Utils
│   │       │   │   └── UrlParser.php
│   │       │   └──
│   │       ├── .gitattributes
│   │       └── README.md
│   ├── crendentials
│   │   ├── pwd.json
└──   └──   └──
```


## Technologies

- PHP 7.4
- MySQL 8.0.23

## Auteurs

- GARRIGUES Hugo - https://github.com/HugoGarrigues

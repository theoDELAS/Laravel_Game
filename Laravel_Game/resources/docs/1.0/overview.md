# Laravel Game

## Contexte

Ce projet

---

- [Mise en place](#Mise_en_place)
    - [Prérequis](#Prérequis)

<a name="Mise_en_place"></a>

## Mise en place

<a name="Prérequis"></a>

### Prérequis

* Installer:

    * Php
        * Comment vérifier si on a php: `php -v`
        * [Installation php](https://www.php.net/downloads.php)
    
    * Composer
        * [Installation composer](https://getcomposer.org/download/)
    * Npm
        * Comment vérifier si on a npm: `npm -v`
        * [Installation npm](https://nodejs.org/en/)
    * Laravel
        * [Installation laravel](https://laravel.com/docs/5.8/installation)
    * Un serveur avec une base de donnée
        * Ex: Wamp (windows) / Xampp (linux) / Mamp (mac)

* [Cloner le repository](https://github.com/theoDELAS/Laravel_Game.git)

* Créer une base de donnée avec le nom de base "laravel_game"

* Créer une copie du fichier .env.example se situant dans le dossier laravel_game en retirant le ".example"
* Aller dans le fichier .env que vous venez de créer
    * Modifier les lignes 9 à 14:
        ```
        DB_CONNECTION="nom de votre sgbd(mariadb/mysql/...)"
        DB_HOST="adresse ip de votre serveur"
        DB_PORT="port d'écoute de votre serveur"
        DB_DATABASE="laravel_game"
        DB_USERNAME="username de votre bdd"
        DB_PASSWORD="password de votre bdd"
        ```

* Ouvrer une console en étant dans le dossier "laravel_game"
    * Faire 
        * `composer update`
        * `php artisan migrate`
        * `php artisan db:seed`
        * `php artisan key:generate`
        * `php artisan serv`


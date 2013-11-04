mysql-pdo-class
===============

A shortcut class of PDO to use with MySQL

Installation
------------

First, you need composer. Download it :

    curl -sS https://getcomposer.org/installer | php

Look if he's installed :

    php composer.phar

And then install the project :

    php composer.phar install

In the composer.json of your project, add :

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/nahk/mysql-pdo-class.git"
        }
    ],
    "require": {
        "nahk/mysql-pdo-class": ">=1.0-dev"
    }

Usage example : 

    <?php 
    // example.php

    require __DIR__.'/vendor/autoload.php';

    use Nahk\PDO\MySQL;

    $con = new MySQL('host', 'db', 'user', 'pass');


sql-pdo-class
=============

A shortcut class of PDO to use with any SQL Database (for now)

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
            "url": "https://github.com/nahk/sql-pdo-class.git"
        }
    ],
    "require": {
        "nahk/sql-pdo-class": ">=1.0-dev"
    }

Usage example : 

    <?php 
    // example.php

    require __DIR__.'/vendor/autoload.php';

    use Nahk\PDO\SQL;

    $sql = new SQL('host', 'db', 'user', 'pass');

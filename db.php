<?php
//I am a singleton class
class Database
{
    private static $instance = null;
    private function __construct()
    {
    }
    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $connectionString = 'mysql:host=localhost;dbname=lab8';
            $user = 'webuser';
            $pass = 'P@ssw0rd';
            self::$instance = new PDO($connectionString, $user, $pass, $pdo_options);
        }

        return self::$instance;
    }
}

//code courtesy of http://requiremind.com/a-most-simple-php-mvc-beginners-tutorial/

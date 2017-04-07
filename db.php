<?php
//I am a singleton class. I exist so only a single instance of self is used throughout the code
class Database
{
    private static $instance = null;

    //Prevents object creation of class by using the "new" keyword
    private function __construct()
    {
    }



    public static function connect()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $connectionString = 'mysql:host=localhost;dbname=project';
            $user = 'weasbuser';
            $pass = 'P@ssw0rd';
            self::$instance = new PDO($connectionString, $user, $pass, $pdo_options);
        }

        return self::$instance;
    }
}

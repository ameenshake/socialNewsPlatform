<?php

/*---------------------------------------------------------
 *  All database logic for Users goes here.
 *  You will find function to create and return Users
 *---------------------------------------------------------*/

class User
{


    //create a new user in the database
    public static function create($username, $password, $email, $fname, $lname)
    {   //should I surround with try catch...?



        $db = Database::connect();
        $sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$username, $email]);

        if ($statement->fetch()) {
            return true;
        } else {
            $sql = 'INSERT INTO users values (?, ?, ?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$username, $fname, $lname, md5($password), $email]);

            return false;
        }
        $db = null;
    }

    public static function getUser($username, $password) {

        $db = Database::connect();
        $sql = 'SELECT username, email FROM users WHERE username = ? AND pass = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$username, md5($password)]);
        $result = $statement->fetch();

        if (!$result) {
          return false;
        } else {
          return $result;
        }

    }
}

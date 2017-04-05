<?php

/*---------------------------------------------------------
 *  All database logic for Posts goes here.
 *  You will find function to return all posts find
 *
 *
 *---------------------------------------------------------*/

class User
{
    public $username;
    public $password;
    public $email;
    public $fname;
    public $lname;

    public function __construct($username, $password, $email, $fname, $lname)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
    }
    public function create()
    {
        $userExists = true;

        $db = Database::connect();
        $sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$this->username, $this->email]);

        if ($statement->fetch()) {
            return $userExists;
        } else {
            $userExists = false;
            $sql = 'INSERT INTO users values (?, ?, ?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->username, $this->fname, $this->lname, md5($this->password), $this->email]);

            return $userExists;
        }
    }
}

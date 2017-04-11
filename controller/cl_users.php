<?php

class UsersController
{
    private $postData;

    public function __construct($postData)
    {
        $this->postData = $postData;
    }

    public function create()
    {
        $exists = User::create($this->postData['username'], $this->postData['password'], $this->postData['email'], $this->postData['fname'], $this->postData['lname']);

        if ($exists) {
            require_once 'views/users/error.html';
        }
    }

    //shows error if user does not exists, otherwise logins in and redirects to home
    public function login()
    {
        $a = User::getUser($this->postData['username'], $this->postData['password']);
        if ($a == false) {
            require_once 'views/users/error2.html';
        } else {
            session_start();
            $_SESSION['user'] = $a['username'];
            header('Location: index.php');
        }
    }

    //logs out the user
    public function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
          $_SESSION = array();
            $referal = $_SERVER['HTTP_REFERER'];
            header('Location: '.$referal);

        } else {
            header('Location: index.php');
        }
    }

  //serves the accountPage if the user is logged in
  public function account()
   {
     if(isset($_SESSION['user'])){
       require_once 'views/users/account.php';
     }
   }


}

<?php

class UsersController
{
    private $user;

    public function __construct($postData)
    {
        $this->user = new User($postData['username'], $postData['password'], $postData['email'], $postData['fname'], $postData['lname']);


    }

    public function create()
    {

      $exists = $this->user->create();
      if($exists){
        require_once 'views/users/error.html';
      }
    }
}

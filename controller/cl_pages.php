<?php
/*---------------------------------------------------------
 *  Controller class to serve static pages.
 *  Can define variables to declutter views

 *---------------------------------------------------------*/
class PagesController
{
    public function registeration()
    {
        require_once 'views/pages/registeration.html';
    }
    public function login()
    {
        require_once 'views/pages/login.html';
    }
    public function error()
    {
        require_once 'views/pages/error.php';
    }
}

<?php
/*---------------------------------------------------------
 *  Controller class to serve static pages.
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

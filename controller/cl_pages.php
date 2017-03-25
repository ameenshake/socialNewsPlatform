<?php
/*---------------------------------------------------------
 *  Controller class to serve requested page.
 *  Can be used to define variables to declutter views
 *---------------------------------------------------------*/
class PagesController
{
    public function home()
    {
        require_once 'views/pages/home.php';
    }
    public function error()
    {
        require_once 'views/pages/error.php';
    }
}

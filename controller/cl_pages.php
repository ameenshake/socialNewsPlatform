<?php
/*---------------------------------------------------------
 *  Controller class to serve requested page.
 *  Can be used to define variables to declutter views
 *---------------------------------------------------------*/
class PagesController
{
    public function registeration()
    {
        
        require_once 'views/pages/registeration.html';
    }
    public function error()
    {
        require_once 'views/pages/error.php';
    }
}

<?php
/*---------------------------------------------------------
 *  All requests are routed through this file to a
 *  cotroller and a method in that controller (action)
 *---------------------------------------------------------*/

require_once 'db.php';

var_dump($_GET);

//checks if pararmets of controller and action are set, otherwise it set them
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $actions = 'home';
}

//static layout
require_once 'views/layout.php';

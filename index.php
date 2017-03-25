<?php
/*---------------------------------------------------------
 *  All requests are recieved by this file and sent to a
 *  cotroller.
 * Flow: index + lay
 *---------------------------------------------------------*/

require_once 'db.php';

//checks if pararmets of controller and action are set, otherwise it set them
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}

//static layout
require_once 'views/layout.php';

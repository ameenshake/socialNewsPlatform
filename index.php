<?php
/*---------------------------------------------------------
 *  All requests are recieved by this file and sent to the
 *  routes file, which directs it to the controller.
 *
 *---------------------------------------------------------*/

require_once 'db.php';

//checks if pararmets of controller and action are set, otherwise it set them
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $isGET = true;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isPOST = true;
}

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'posts';
        $action = 'home';
    }

//static layout (header + footer)
require_once 'views/layout.php';

<?php
/*---------------------------------------------------------
 *  You guessed it, this file manages the routing for the
 *  different requests
 *---------------------------------------------------------*/

function call($controller, $action)
{
    //require the controller file
    require_once 'controller/cl_'.$controller.'.php';

    //make instance of the right class
    //(make sure to update any new controllers, that you add, here)
    switch ($controller) {
      case 'pages':
        $controller = new PagesController();
        break;
      case 'posts':
        $controller = new PostsController();
        break;
    }

    $controller->{ $action }();
}

    //list of controllers and their methods (actions).
    $controllers = ['pages' => ['home', 'error'],
                    'posts' => ['index', 'show'], ];

    $controllerExists = false;
    $actionExists = false;

    //checks to see if provided controller exists and if that controller has the action
    foreach ($controllers as $key => $value) {
        if ($key == $controller) {
            $controllerExists = true;
            foreach ($value as $innerValue) {
                if ($innerValue == $action) {
                    $actionExists = true;
                }
            }
            break;
        }
    }

    if ($controllerExists && $actionExists) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }

<?php
/*---------------------------------------------------------
 *  You guessed it, this file manages the routing for the
 *  different requests
 *---------------------------------------------------------*/

function call($controller, $action)
{
    //require the controller file
    require_once 'controller/cl_'.$controller.'.php';

    //call the
    switch ($controller) {
      case 'pages':
        $controller = new PagesController();
        break;
    }

    $controller->$action();
}


    //list of controllers and their methods (actions)
    $controllers = ['pages' => ['home', 'error']];
    $controllerExists = false;
    $actionExists = false;
    //checks to see if provided controller exists and if that controller has the action
    foreach ($controllers as $key => $value) {
        if ($key == $controller) {

            $controllerExists = true;
            foreach ($value as $innerValue) {
                if ($innerValue == $action) {
                    $actionExists == true;
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

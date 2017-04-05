<?php
/*---------------------------------------------------------
 *  You guessed it, this file manages the routing for the
 *  different GET requests
 * ToDo: POST Requests
 *---------------------------------------------------------*/
if ($isGET) {
    function callGET($controller, $action)
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
        require_once 'models/post.php';
        $controller = new PostsController();
        break;
    }

        $controller->{ $action }();
    }

    //list of controllers and their methods (actions).
    $controllers = ['pages' => ['registeration', 'error'],
                    'posts' => ['home', 'show'], ];

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
        callGET($controller, $action);
    } else {
        callGET('pages', 'error');
    }
} elseif ($isPOST) {
}

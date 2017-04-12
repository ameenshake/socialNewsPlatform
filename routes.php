<?php
/*---------------------------------------------------------
 *  You guessed it, this file manages the routing for the
 *  different GET and POST requests
 *
 * TODO: Better way to handle routing?
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

     //can't handle POST
     case 'posts':
     require_once 'models/post.php';
     require_once 'models/comment.php';
     $controller = new PostsController($_POST, $_GET);
     break;

     //can handle POST requests
     case 'users':
     require_once 'models/user.php';
     $controller = new UsersController($_POST);
     break;
   }

   $controller->{ $action }();
 }

  //list of controllers and their methods (actions).
    $controllerList = ['pages' => ['registeration', 'login', 'error'],
                    'posts' => ['home', 'postPage', 'newPostPage', 'create', 'createComment'],
                    'users' => ['create', 'login', 'logout', 'account']];

    $controllerExists = false;
    $actionExists = false;

    //checks to see if provided controller exists and if that controller has the action which is requested
    foreach ($controllerList as $key => $value) {
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

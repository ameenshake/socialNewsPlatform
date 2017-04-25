<?php
/*---------------------------------------------------------
 *  You guessed it, this file manages the routing for the
 *  different GET and POST requests
 *
 *---------------------------------------------------------*/

 function call($controller, $action)
 {

   //require the controller file
   require_once 'controller/cl_'.$controller.'.php';

   //make instance of the right class
   //(make sure to update any new controllers, that you add, here)
   switch ($controller) {

     //pages only serves static pages
     case 'pages':
     $controllerObj = new PagesController();
     break;


     case 'posts':
     require_once 'models/post.php';
     require_once 'models/comment.php';
     $controllerObj = new PostsController($_POST, $_GET);
     break;


     case 'users':
     require_once 'models/user.php';
     require_once 'models/comment.php';
     $controllerObj = new UsersController($_POST);
     break;
   }
    //TODO: find better way of doing this than checking strings every time
    if (substr($action, 0, 4) == 'ajax') {
        $controllerObj->{ $action }();
    } else {
        require_once 'views/header.php';
        $controllerObj->{ $action }();
        require_once 'views/footer.php';
    }
 }

  //list of controllers and their methods (actions).
    $controllerList = ['pages' => ['registeration', 'login', 'error'],
                    'posts' => ['home', 'ajaxComments', 'ajaxPosts', 'newPostPage', 'fetchPostPage', 'create', 'createComment'],
                    'users' => ['create', 'login', 'logout', 'account'], ];

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

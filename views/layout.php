<!-- TODO more layout pages -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/forms.css">
  <link rel="stylesheet" href="css/post.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <title><?php

  //TODO: fix unruly way to display post titles, especially for posts
            switch ($controller) {
              case 'pages':

                if ($action == 'registeration') {
                    echo 'Registeration';
                } elseif ($action == 'login') {
                    echo 'Login';
                } else {
                    echo 'Error';
                }

                break;

              case 'posts':

                if ($action == 'home') {
                  echo 'Home';
                } elseif ($action == 'newPostPage') {
                  echo 'New Post';
                } elseif ($action == 'postPage') {
                  echo 'Post';
                }

                break;

            }

        ?></title>

</head>

<body>
  <header>
    <div class="topmost">
      <a class="logo" href="index.php">MyDiscussionForum</a>

      <?php

      session_start();
      if (isset($_SESSION['user'])) {
          echo '<a class="user" href="index.php?controller=users&action=logout">Logout</a>';
          echo '<a class="user" href="index.php?controller=users&action=account">'.$_SESSION['user'].'</a>';
      } else {
          echo '<a class="user" href="index.php?controller=pages&action=login">Log In</a>
    <a class="user" href="index.php?controller=pages&action=registeration">Register</a>';
      }?>

    </div>

    <nav>
      <ul class="tabmenu">
        <li><a href="">Latest Stories</a></li>
        <li><a href="">Best Stories</a></li>
      </ul>
    </nav>

  </header>

    <?php

  
    require_once 'routes.php'; ?>



    <footer>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </footer>


    </body>

    </html>

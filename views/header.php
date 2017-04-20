
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

      <nav class="headLinks">
        <ul class="tabmenu">
          <li><a href="">Latest Stories</a></li>
          <li><a href="">Best Stories</a></li>
        </ul>
      </nav>




  </header>

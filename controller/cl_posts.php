<?php

/*---------------------------------------------------------
 *  Controller which queries db and serves posts.
 *
 *
 *---------------------------------------------------------*/

class PostsController
{
    private $POSTdata;
    private $GETdata;

    public function __construct($POSTdata, $GETdata)
    {
        $this->POSTdata = $POSTdata;
        $this->GETdata = $GETdata;
    }

    //returns the homepage
    public function home()
    {
        $posts = Post::fetchPosts();
        require_once 'views/posts/home.php';
    }

    //serves the page to create new posts
    public function newPostPage()
    {
        if (isset($_SESSION['user'])) {
            require_once 'views/posts/newPost.html';
        } else {
            require_once 'views/users/error3.html';
        }
    }

    //serves pages for each specific post (when you click on comments)
    public function fetchPostPage()
    {
        $post = Post::fetchSinglePost($this->GETdata['postID']);
        require_once 'views/posts/postPage.php';
    }

    //creates a new post to store in the database
    //TODO: Set category functionality
    public function create()
    {
        if (isset($_SESSION['user'])) {
            $date = date('Y-m-d H:i:s');

            $post = new Post($this->POSTdata['title'], $this->POSTdata['url'], $_SESSION['user'], $this->POSTdata['content'], $date, 'News');
            $post->createPost();
        } else {
            require_once 'views/users/error3.html';
        }
    }

    //Delivers the posts
    //TODO: catch for no GET['postID'] being set
    public function ajaxComments()
    {
        $comments = Comment::fetch($this->GETdata['postID']);

        $comments = json_encode($comments);

        echo $comments;
    }

    public function ajaxPosts()
    {
        $post = Post::fetchSinglePost($this->GETdata['postID']);

        $post = json_encode($post);

        echo $post;
    }

    public function createComment()
    {
      if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $date = date('Y-m-d H:i:s');
        $comment = new Comment($this->POSTdata['parentID'], $this->POSTdata['comment'], $username, $date, $this->POSTdata['postID']);
        $comment->create();
        $referal = $_SERVER['HTTP_REFERER'];
        header('Location: '.$referal);
      } else {
          require_once 'views/users/error3.html';
      }

    }
}

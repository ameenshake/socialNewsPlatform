<?php


class PostsController
{
    private $POSTdata;
    private $GETdata;

    public function __construct($POSTdata, $GETdata)
    {
        $this->POSTdata = $POSTdata;
        $this->GETdata = $GETdata;
    }

    public function home()
    {
        $posts = Post::fetchPosts();
        require_once 'views/posts/home.php';
    }

    public function newPostPage()
    {
        if (isset($_SESSION['user'])) {
            require_once 'views/posts/newPost.html';
        } else {
            require_once 'views/users/error3.html';
        }
    }

    //TODO: Set category functionality
    public function create()
    {   // apparently I already started session in layout
        // session_start();
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
    public function postPage()
    {   $postID = $this->GETdata['postID'];
        $post = Post::fetchSinglePost($postID);
        $comments = Comment::fetch($postID);
        require_once 'views/posts/postPage.php';
    }

    public function createComment()
    {
        $username = $_SESSION['user'];
        $date = date('Y-m-d H:i:s');
        $comment = new Comment($this->POSTdata['parentID'], $this->POSTdata['comment'], $username, $date, $this->POSTdata['postID']);
        $comment->create();
        $referal = $_SERVER['HTTP_REFERER'];
        header('Location: '.$referal);
    }
}

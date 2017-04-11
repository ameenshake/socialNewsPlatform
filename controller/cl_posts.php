<?php


class PostsController
{
    private $postData;
    private $getData;

    public function __construct($postData, $getData)
    {
        $this->postData = $postData;
        $this->getData = $getData;
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

            $post = new Post($this->postData['title'], $this->postData['url'], $_SESSION['user'], $this->postData['content'], $date, 'News');
            $post->createPost();
        } else {
            require_once 'views/users/error3.html';
        }
    }

    //TODO: catch for no GET['postID'] being set
    public function postPage()
    {
        $post = Post::fetchSinglePost($this->getData['postID']);
        require_once 'views/posts/postPage.php';
    }
}

<?php


class PostsController
{
    private $postData;
    private $getData;

    public function __construct($postData, $getData)
    {
        $this->postData = $postData;
    }

    public function home()
    {
        $posts = Post::fetchPosts();
        require_once 'views/posts/home.php';
    }

    public function newPostPage()
    {
        require_once 'views/posts/newPost.html';
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

    public function postPage()
    {

    }
}

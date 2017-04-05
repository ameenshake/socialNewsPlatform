<?php


class PostsController
{
    public function home()
    {
        $posts = Post::fetch();
        require_once 'views/posts/home.php';
    }

    public function show()
    {
    }
}

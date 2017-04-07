<?php


class PostsController
{
    public function home()
    {
        $posts = Post::fetchPosts();
        require_once 'views/posts/home.php';
    }

    public function create($postData)
    {
      $date = date('Y-m-d H:i:s');
      // $post = new Post($);
    }
}

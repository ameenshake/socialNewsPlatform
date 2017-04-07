<?php

/*---------------------------------------------------------
 *  All database logic for Posts goes here.
 *  You will find function to return all posts find
 *---------------------------------------------------------*/

class Post
{
    public $title;
    public $image;
    public $link;
    public $username;
    public $content;
    public $date;
    public $category;

    public function __construct($title, $image, $link, $username, $content, $date, $category)
    {
        $this->title = $title;
        $this->image = $image;
        $this->link = $link;
        $this->username = $username;
    }

    //returning a whole object is unecessary, should probably return Array. More efficient on memory maybe?
    public static function fetchPosts()
    {
        $list = [];
        $db = Database::connect();
        $sql = 'SELECT title, image, link, username FROM posts';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        foreach ($stmt->fetchAll() as $value) {
            $list[] = new self($value['title'], $value['image'], $value['link'], $value['username']);
        }

        $db = null;

        return $list;
    }

    public function createPost()
    {
        try {
            $db = Database::connect();
            $sql = 'INSERT INTO posts VALUES (?, ?, ?, ?, ?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->title, $this->link, $this->content, $this->image, $this->username, $this->date, $this->category]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function fetchComments()
    {
    }
}

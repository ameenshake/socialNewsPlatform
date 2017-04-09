<?php

/*---------------------------------------------------------
 *  All database logic for Posts goes here.
 *  You will find function to return all posts find
 *---------------------------------------------------------*/

class Post
{
    public $title;
    public $link;
    public $username;
    public $content;
    public $date;
    public $category;

    public function __construct($title, $link, $username, $content, $date, $category)
    {
        $this->title = $title;
        $this->link = $link;
        $this->username = $username;
        $this->content = $content;
        $this->date = $date;
        $this->category = $category;
    }

    //returning a whole object is unecessary, should probably return Array. More efficient on memory maybe?
    public static function fetchPosts()
    {
        $list = [];
        $db = Database::connect();
        $sql = 'SELECT * FROM posts';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        foreach ($stmt->fetchAll() as $value) {
            $list[] = new self($value['title'], $value['link'], $value['username'], $value['content'], $value['datePosted'], $value['category']);
        }

        $db = null;

        return $list;
    }

    public function fetchSinglePost()
    {
      
    }

    public function createPost()
    {
        try {
            $db = Database::connect();
            $sql = 'INSERT INTO posts (title, link, content, username, datePosted, category) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->title, $this->link, $this->content, $this->username, $this->date, $this->category]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function fetchComments()
    {
    }
}

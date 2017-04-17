<?php

/*---------------------------------------------------------
 *  All database logic for Posts goes here.
 *  You will find function to return all posts find
 *
 * TODO: surround reset of models with try..catch blocks
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

    //TODO: handle fetching a fixed amount of posts (webpage shouldnt display huge amounts of data)
    public static function fetchPosts()
    {
        $list = [];
        $db = Database::connect();
        $sql = 'SELECT * FROM posts';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $db = null;

        return $list;
    }

    public static function fetchSinglePost($postID)
    {
      $db = Database::connect();
      $sql = 'SELECT * FROM posts WHERE postID = ?';
      $stmt = $db->prepare($sql);
      $stmt->execute([$postID]);

      return $stmt->fetch();
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
        } finally {
            $db = null;
        }
    }

    public static function fetchPostsByCategory($category)
    {
      $list = [];
      $db = Database::connect();
      $sql = 'SELECT * FROM posts WHERE category = ?';
      $stmt = $db->prepare($sql);
      $stmt->execute([$category]);

      $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $db = null;

      return $list;
    }
}

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

    private function __construct($title, $image, $link, $username)
    {
      $this->title = $title;
      $this->image = $image;
      $this->link = $link;
      $this->username = $username;
    }

    public static function fetch()
    {
        $list = [];
        $db = Database::connect();
        $sql = 'SELECT title, image, link, username FROM posts';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        foreach ($stmt->fetchAll() as $value) {
            $list[] = new self($value['title'], $value['image'], $value['link'], $value['username']);
        }

        return $list;
    }
}

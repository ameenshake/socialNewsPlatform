<?php

class Comment
{
    public $parentID;
    public $commentText;
    public $username;
    public $datePosted;
    public $postID;

    public function __construct($parentID, $commentText, $username, $datePosted, $postID)
    {
        $this->parentID = $parentID;
        $this->commentText = $commentText;
        $this->username = $username;
        $this->datePosted = $datePosted;
        $this->postID = $postID;
    }

    public function create()
    {
        $db = Database::connect();
        $sql = 'INSERT into comments (parentID, commentText, username, datePosted, postID) VALUES (?, ?, ?, ?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->parentID, $this->commentText, $this->username, $this->datePosted, $this->postID]);
    }

    public static function fetch($postID)
    {
      $db = Database::connect();
      $sql = 'SELECT * FROM comments WHERE postID = ? ORDER BY comments.parentID DESC';
      $stmt = $db->prepare($sql);
      $stmt->execute([$postID]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchByUser($username) {
      $db = Database::connect();
      $sql = 'SELECT * FROM comments WHERE username = ? ORDER BY comments.datePosted DESC';
      $stmt = $db->prepare($sql);
      $stmt->execute([$username]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}

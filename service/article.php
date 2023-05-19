<?php

Class Article{
    // connection 
    private $connection;

    // table name
    private $table = "article";

    // columns
    public $id;
    public $title;
    public $summary;
    public $position;
    public $author;
    public $createdat;
    public $updatedat;

    public function __construct($db){
        $this->connection = $db;
    }

    public function insertArticle(){
        $query = "INSERT INTO ".$this->table." SET title = :title, summary = :summary, position = :position, author = :author, createdat = :createdat, updatedat = :createdat;";
        $stmt = $this->connection->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->summary = htmlspecialchars(strip_tags($this->summary));
        $this->position = htmlspecialchars(strip_tags($this->position));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->createdat = htmlspecialchars(strip_tags($this->createdat));

        $stmt->bindParam(":title",  $this->title);
        $stmt->bindParam(":summary",  $this->summary);
        $stmt->bindParam(":position",  $this->position);
        $stmt->bindParam(":author",  $this->author);
        $stmt->bindParam(":createdat",  $this->createdat);

        $response = new stdClass;
        if($stmt->execute()){
            $response->status = "success";
            $response->article_id = $this->connection->lastInsertId();
            $response->created_at = $this->createdat;
        }else{
            $response->status = "failed";
        }

        return $response;
    }

   function updateArticle()
      {
        $query = "UPDATE ".$this->table." SET title = :title, summary = :summary, position = :position, author = :author, updatedat = :updatedat WHERE id = :id;";
        $stmt = $this->connection->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->summary = htmlspecialchars(strip_tags($this->summary));
        $this->position = htmlspecialchars(strip_tags($this->position));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->createdat = htmlspecialchars(strip_tags($this->updatedat));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":title",  $this->title);
        $stmt->bindParam(":summary",  $this->summary);
        $stmt->bindParam(":position",  $this->position);
        $stmt->bindParam(":author",  $this->author);
        $stmt->bindParam(":updatedat",  $this->updatedat);

        $response = new stdClass;
        if($stmt->execute()){
            $response->status = "success";
            $response->article_id = $this->id;
            $response->updated_at = $this->updatedat;
        }else{
            $response->status = "failed";
        }

        return $response;
      }
}
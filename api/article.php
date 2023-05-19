<?php

Class APIArticle{
    protected $article;
    public function __construct($article){
        $this->article = $article;
    }
    public function createArticle($data){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $this->article->title = $data->title;
        $this->article->summary = $data->summary;
        $this->article->position = $data->position;
        $this->article->author = $data->author;
        $this->article->createdat = date('Y-m-d H:i:s');

        return $this->article->insertArticle();
    }

    public function updateArticle($id,$data){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $this->article->id = $id;
        $this->article->title = $data->title;
        $this->article->summary = $data->summary;
        $this->article->position = $data->position;
        $this->article->author = $data->author;
        $this->article->updatedat = date('Y-m-d H:i:s');

        return $this->article->updateArticle();
    }
}



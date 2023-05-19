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

        $validation = $this->validation($data);
        if (property_exists($validation, 'status')) {
            header("HTTP/1.0 400 Bad Request");
            return json_encode($validation);
        }

        $this->article->title = $data->title;
        $this->article->summary = $data->summary;
        $this->article->position = $data->position;
        $this->article->author = $data->author;
        $this->article->createdat = date('Y-m-d H:i:s');

        header("HTTP/1.0 201 Created");
        return json_encode($this->article->insertArticle());
    }

    public function updateArticle($id,$data){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $validation = $this->validation($data);
        if (property_exists($validation, 'status')) {
            header("HTTP/1.0 400 Bad Request");
            return json_encode($validation);
        }

        $this->article->id = $id;
        $this->article->title = $data->title;
        $this->article->summary = $data->summary;
        $this->article->position = $data->position;
        $this->article->author = $data->author;
        $this->article->updatedat = date('Y-m-d H:i:s');

        header("HTTP/1.0 200 OK");
        return json_encode($this->article->updateArticle());
    }

    private function validation($data) {
        $response = new stdClass;
        if($data->title == ''){
            $response->status = 'failed';
            $response->error = 'title is required';
            return $response;
        }

        if($data->summary == ''){
            $response->status = 'failed';
            $response->error = 'summary is required';
            return $response;
        }

        if($data->author == ''){
            $response->status = 'failed';
            $response->error = 'author is required';
            return $response;
        }

        if($data->position){
            if($data->position < 1 || $data->position > 5){
                $response->status = 'failed';
                $response->error = 'position must between 1 to 5';
                return $response;
            }
        }else{
            $response->status = 'failed';
            $response->error = 'position is required';
            return $response;
        }

        return $response;
    }
}



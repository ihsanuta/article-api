<?php

include_once './config/config.php';
include_once './utility/mysql.php';
include_once './api/article.php';
include_once './service/article.php';

$config = new Config('./.env');
$config->load();
$config->set();

$database = new Mysql();
$db = $database->getConnection($config->dbconfig);
$article = new Article($db);
$api = new APIArticle($article);

$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $resp = $api->createArticle($data);
        if ($resp->status == "success"){
            header("HTTP/1.0 201 Created");
        }else{
            header("HTTP/1.0 500 Internal Server Error");
        }
        echo json_encode($resp);
        break;
    case 'PUT':
        $url = explode("/",$_SERVER['REQUEST_URI']);
        $id =  intval($url[2]);
        if($id > 0){
            $data = json_decode(file_get_contents("php://input"));
            $resp = $api->updateArticle($id,$data);
            if ($resp->status == "success"){
                header("HTTP/1.0 200 OK");
            }else{
                header("HTTP/1.0 500 Internal Server Error");
            }
            echo json_encode($resp);
        }else{
            header("HTTP/1.0 400 Bad Request");
            echo json_encode([
                'status' => false
            ]);
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    break;
}
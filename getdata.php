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

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://cdnstatic.detik.com/internal/sample/demo.json");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

$data = json_decode($output);
$resp = [];
foreach ($data as $key => $value) {
    $article->title = $value->title;
    $article->summary = $value->summary;
    $article->position = 0;
    $article->author = $value->author;
    $article->createdat =  $value->created_at;
    $article->updatedat =  $value->updated_at;

    $save = $article->insertArticle();

    array_push($resp, [
        'id' => $save->article_id,
        'title' => $value->title,
        'summary' => $value->summary,
        'position' => 0,
        'author' => $value->author,
        'created_at' => $value->created_at,
        'updated_at' => $value->updated_at,
    ]);
}

echo json_encode($resp);
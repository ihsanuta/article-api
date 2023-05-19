<?php

class Mysql{

    public $connection;

    public function getConnection(object $configdb){
        $this->connection = null;
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s", $configdb->host, $configdb->name);
            $this->connection = new PDO($dsn, $configdb->user, $configdb->pass);
            // $this->connection->exec("set name utf8");
        } catch (PDOException $e) {
            echo "Database could not be connected : ".$e->getMessage();
        }

        return $this->connection;
    }
}


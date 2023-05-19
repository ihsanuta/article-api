# article-api

## Setup Database
Create Database articles or others database name
```
CREATE DATABASE `articles`;
```

Running query DDL in file database.sql for create table
```
USE `db_article`;

/*Table structure for table `article` */
DROP TABLE IF EXISTS `article`;
-- articles.article definition

CREATE TABLE `article` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `position` smallint unsigned NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdat` timestamp NOT NULL,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```

## Setup ENV
Open file .env and set with configuration database
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USER=root
DB_PASS=
DB_NAME=
```

## API
Running API in cmd with
```
php -S 127.0.0.1:8000
```

Create article with cURL or postman
```
curl --location --request POST 'http://127.0.0.1:8000/article' \
--header 'Content-Type: application/json' \
--data-raw '{
    "title":"buku satu",
    "summary":"buku tentang satu",
    "position":1,
    "author":"saya"
}'
```

Update article with cURL or postman
```
curl --location --request PUT 'http://127.0.0.1:8000/article/{article_id}' \
--header 'Content-Type: application/json' \
--data-raw '{
    "title":"buku satu satu",
    "summary":"buku tentang satu",
    "position":1,
    "author":"gramedia"
}'
```

## PHP CLI
Running cli with cmd
```
php getdata.php
```
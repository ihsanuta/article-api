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
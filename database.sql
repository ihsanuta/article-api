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
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `article` WRITE;
INSERT INTO article
(title, summary, `position`, author, createdat, updatedat)
VALUES('Gempa M 7,8 Guncang Pasifik Selatan, Picu Peringatan Tsunami!', 'Noumea - Sebuah gempa bumi berkekuatan Magnitudo 7,8 mengguncang negara-negara di kawasan Pasifik Selatan. Gempa yang berpusat di kedalaman 38 kilometer ini memicu peringatan tsunami untuk beberapa negara di kawasan itu, seperti Vanuatu, Fiji dan Kiribati', 1, 'detikcom', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
VALUES('Ada-ada Saja! Motor Ini Ditinggal Pemilik di Tengah Pawai Atlet SEA Games', 'Jakarta - Kemenpora menggelar kirab juara kontingen SEA Games 2023 dari Senayan menuju Bundaran HI. Tampak ada motor BeAT putih yang parkir di tengah jalan hingga menghalangi laju pemotor lain yang ikut konvoi.', 2, 'detikcom', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
VALUES('Sejarah Hari Peringatan Reformasi Nasional Tanggal 21 Mei', 'Jakarta - Tanggal 21 Mei diperingati sebagai Hari Peringatan Reformasi atau Hari Reformasi Nasional. Tanggal tersebut dipilih menjadi Hari Peringatan Reformasi Nasional karena bertepatan dengan lengsernya Presiden Soeharto pada 21 Mei 1998 silam.', 3, 'detikcom', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
UNLOCK TABLES;

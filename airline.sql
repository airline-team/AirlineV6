-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: airline
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `company_id` int(255) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `company_email` text NOT NULL,
  `company_phone` text NOT NULL,
  `company_age` text NOT NULL,
  `company_info` mediumtext NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'ООО Максимус','maxim-maximov@yandex.ru','+79667447110','2 года','Долголетие,100 тысяч довольных клиентов и непревзойденный сервис'),(2,'ООО Дальний полет','long_travel@box.ru','+79663227225','7 лет','Довольные клиенты, счастливые инвесторы и богатеющие агрегаторы'),(3,'Travel.Blog','travel-box@gmail.com','+79667117110','8 месяцев','Молодой стартап, используем рекомендательные системы для лучшего подбора отдыха и помогаем жить, а не существовать');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_service`
--

DROP TABLE IF EXISTS `company_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_info` text NOT NULL,
  `service_picture` text NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_service`
--

LOCK TABLES `company_service` WRITE;
/*!40000 ALTER TABLE `company_service` DISABLE KEYS */;
INSERT INTO `company_service` VALUES (4,2,'Отдых на Мальдивах - горячая путевка','Только сейчас и только у нас самые выгодные билеты на зиму!!!','winter.jpeg'),(5,1,'Страхование','В отпуск нельзя ездить без неё,наша компании поможет вам в случае чего !','sddefault.jpeg'),(6,3,'Покори гори - пока не поздно!','Представляем вам лучший горнолыжный курорт с лучшими ценами и превосходным сервисом','dombai.jpeg');
/*!40000 ALTER TABLE `company_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_fio` text NOT NULL,
  `user_phone` text NOT NULL,
  `user_trip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,1,'Горный Владислав Андреевич','+79445115002','Лондоне,Квебеке,Италии'),(2,2,'Шугарин Максим Олегович','+79331221009','Лондоне,Турции,Японии'),(3,3,'Шугарин Максим Вадимович','+79331221227','Лондоне,Питере');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vlad','85d5c8dcb7db39358916efb7e6f840502f547b2c',1),(2,'max','0706025b2bbcec1ed8d64822f4eccd96314938d0',2),(3,'shon','60c88078581478f5aa851c6f702e27a1eb916524',3),(4,'test','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL),(5,'map','cc9f816a42431cf852cdc7a3fad42a6f65ffce24',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-23  1:02:54

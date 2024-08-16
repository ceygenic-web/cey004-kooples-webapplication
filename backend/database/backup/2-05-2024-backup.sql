-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: cey002_db
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `user_user_id` varchar(45) NOT NULL,
  `trip_report_report_id` varchar(45) NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id_UNIQUE` (`comment_id`),
  KEY `fk_comment_user1_idx` (`user_user_id`),
  KEY `fk_comment_trip_report1_idx` (`trip_report_report_id`),
  CONSTRAINT `fk_comment_trip_report1` FOREIGN KEY (`trip_report_report_id`) REFERENCES `trip_report` (`report_id`),
  CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_list`
--

DROP TABLE IF EXISTS `friend_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friend_list` (
  `connection_id` int NOT NULL AUTO_INCREMENT,
  `user_id_self` varchar(45) NOT NULL,
  `user_id_friend` varchar(45) NOT NULL,
  PRIMARY KEY (`connection_id`),
  UNIQUE KEY `connection_id_UNIQUE` (`connection_id`),
  KEY `fk_friend_list_user1_idx` (`user_id_self`),
  KEY `fk_friend_list_user2_idx` (`user_id_friend`),
  CONSTRAINT `fk_friend_list_user1` FOREIGN KEY (`user_id_self`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_friend_list_user2` FOREIGN KEY (`user_id_friend`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_list`
--

LOCK TABLES `friend_list` WRITE;
/*!40000 ALTER TABLE `friend_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `friend_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `trip_report_report_id` varchar(45) NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id_UNIQUE` (`image_id`),
  KEY `fk_image_trip_report1_idx` (`trip_report_report_id`),
  CONSTRAINT `fk_image_trip_report1` FOREIGN KEY (`trip_report_report_id`) REFERENCES `trip_report` (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (8,'C:\\xampp\\htdocs\\Education Purpose\\CEY002-Travel-Mems\\backend\\api/../../public/resources/images/profileImages/65d231d84faa.jpg','65d231d84faa'),(9,'C:\\xampp\\htdocs\\Education Purpose\\CEY002-Travel-Mems\\backend\\api/../../public/resources/images/profileImages/65d231d84faa.jpg','65d231d84faa'),(10,'C:\\xampp\\htdocs\\Education Purpose\\CEY002-Travel-Mems\\backend\\api/../../public/resources/images/profileImages/65d36c84c3e1.jpg','65d36c84c3e1'),(11,'C:\\xampp\\htdocs\\Education Purpose\\CEY002-Travel-Mems\\backend\\api/../../public/resources/images/profileImages/65d36c84c3e1.jpg','65d36c84c3e1');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reaction` (
  `reaction_id` int NOT NULL AUTO_INCREMENT,
  `user_user_id` varchar(45) NOT NULL,
  `trip_report_report_id` varchar(45) NOT NULL,
  PRIMARY KEY (`reaction_id`),
  UNIQUE KEY `reaction_id_UNIQUE` (`reaction_id`),
  KEY `fk_reaction_user1_idx` (`user_user_id`),
  KEY `fk_reaction_trip_report1_idx` (`trip_report_report_id`),
  CONSTRAINT `fk_reaction_trip_report1` FOREIGN KEY (`trip_report_report_id`) REFERENCES `trip_report` (`report_id`),
  CONSTRAINT `fk_reaction_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reaction`
--

LOCK TABLES `reaction` WRITE;
/*!40000 ALTER TABLE `reaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `reaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_status`
--

DROP TABLE IF EXISTS `report_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `report_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_status`
--

LOCK TABLES `report_status` WRITE;
/*!40000 ALTER TABLE `report_status` DISABLE KEYS */;
INSERT INTO `report_status` VALUES (1,'public'),(2,'private'),(3,'hidden'),(4,'pending'),(5,'deleted');
/*!40000 ALTER TABLE `report_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_report`
--

DROP TABLE IF EXISTS `trip_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trip_report` (
  `report_id` varchar(45) NOT NULL,
  `description` longtext,
  `locations` json DEFAULT NULL,
  `view_count` int DEFAULT NULL,
  `reported_datetime` datetime DEFAULT NULL,
  `report_status_status_id` int NOT NULL,
  `user_user_id` varchar(45) NOT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `report_id_UNIQUE` (`report_id`),
  KEY `fk_trip_report_report_status1_idx` (`report_status_status_id`),
  KEY `fk_trip_report_user1_idx` (`user_user_id`),
  CONSTRAINT `fk_trip_report_report_status1` FOREIGN KEY (`report_status_status_id`) REFERENCES `report_status` (`status_id`),
  CONSTRAINT `fk_trip_report_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_report`
--

LOCK TABLES `trip_report` WRITE;
/*!40000 ALTER TABLE `trip_report` DISABLE KEYS */;
INSERT INTO `trip_report` VALUES ('65d231d84faa','this is a discription','\"assvga\"',0,'2024-02-18 17:35:36',1,'65d22da74936'),('65d36c84c3e1','this is a discription','\"assvga\"',0,'2024-02-19 15:58:12',3,'65d36c78b94e'),('65d36c9c6ff2','this is a discription','\"assvga\"',0,'2024-02-19 15:58:36',1,'65d36c78b94e'),('65d36ca0ac18','this is a discription','\"assvga\"',0,'2024-02-19 15:58:40',1,'65d36c78b94e'),('65d36ca96135','this is a discription','\"assvga\"',0,'2024-02-19 15:58:49',1,'65d36c78b94e');
/*!40000 ALTER TABLE `trip_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` varchar(45) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio` varchar(45) DEFAULT NULL,
  `birthday` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender_gender_id` int NOT NULL,
  `password_hash` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_status_status_id1` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `fk_user_gender_idx` (`gender_gender_id`),
  KEY `fk_user_user_status1_idx` (`user_status_status_id1`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_gender_id`) REFERENCES `gender` (`gender_id`),
  CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_status_id1`) REFERENCES `user_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('65d22da74936','ghgghsggtggtqg@gmail.com','Daham','Kaushikaa','0710902997','Little prince','2003-01-23',1,'0217ebd0814428d5ed3182f4c89478c6a78d67d38ed99b037c129a0d4df890c8',1),('65d36c78b94e','d@gmail.com','gamagedara','sunil','0710902997','Little prince','2003-01-23',1,'0217ebd0814428d5ed3182f4c89478c6a78d67d38ed99b037c129a0d4df890c8',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_id_UNIQUE` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (1,'public'),(2,'private'),(3,'hidden ');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-02 18:50:42

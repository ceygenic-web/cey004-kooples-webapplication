-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: cey004_db
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mobile` varchar(10) NOT NULL,
  `password_hash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'0710902997','d9d70fa1151233d7fe18f6dd94526c55189f122e085b353bda20bd80a2280020'),(2,'0784822710','2f5d6c34e0dc7671616ee514bc723ff5b45194567e566e8734f02b7eef9e5507');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Taffta'),(2,'Chevron'),(3,'Dazzling');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `product_id` varchar(6) NOT NULL,
  `category_category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `other_data` text,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_category_idx` (`category_category_id`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('471516',1,'this is the final product ','here is the description field',12000,'{\"blousepiece\":\"has blous\",\"style_number\":\"hehe\",\"shipping_info\":\"home\",\"returns\":\"no return\",\"measurements\":\"345\",\"wash_instructions\":\"wash\",\"fabric\":\"fabric is here\"}'),('802615',1,'this is the final product ','here is the description field',12000,'{\"blousepiece\":\"has blous\",\"style_number\":\"hehe\",\"shipping_info\":\"home\",\"returns\":\"no return\",\"measurements\":\"345\",\"wash_instructions\":\"wash\",\"fabric\":\"fabric is here\"}'),('957709',1,'saree 2`','sareee description',12000,'{\"blousepiece\":\"no\",\"style_number\":\"12h1231\",\"shipping_info\":\"home\",\"returns\":\"no\",\"measurements\":\"100m\",\"wash_instructions\":\"can\",\"fabric\":\"fabric\"}');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `product_images_id` int NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `product_product_id` varchar(6) NOT NULL,
  PRIMARY KEY (`product_images_id`),
  KEY `fk_product_images_product1_idx` (`product_product_id`),
  CONSTRAINT `fk_product_images_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'resources/images/products/802615-image-0.jpeg','802615'),(2,'resources/images/products/802615-image-1.jpeg','802615'),(3,'resources/images/products/802615-image-2.jpeg','802615'),(4,'resources/images/products/471516-image-0.jpeg','471516'),(5,'resources/images/products/471516-image-1.jpeg','471516'),(6,'resources/images/products/471516-image-2.jpeg','471516'),(7,'resources/images/products/957709-image-0.jpeg','957709'),(8,'resources/images/products/957709-image-1.jpeg','957709'),(9,'resources/images/products/957709-image-2.jpeg','957709');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-12  3:08:36

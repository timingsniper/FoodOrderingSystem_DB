-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: waimaidb
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
-- Table structure for table `alert_table`
--

DROP TABLE IF EXISTS `alert_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alert_table` (
  `alert_id` int NOT NULL AUTO_INCREMENT,
  `rider_id` int NOT NULL,
  `alert_type` varchar(200) NOT NULL,
  `alert_time` datetime NOT NULL,
  `resolved` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `area_id` int NOT NULL,
  `covid_stat` enum('YES','NO') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `customer_id` int NOT NULL,
  `food_id` int NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_price` int NOT NULL,
  `merchant_id` int NOT NULL,
  `merchant_name` varchar(45) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`customer_id`,`food_id`),
  KEY `customerid_idx` (`customer_id`),
  KEY `foodid_idx` (`food_id`),
  KEY `merchantid_cart_idx` (`merchant_id`),
  CONSTRAINT `customerid_cart` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `foodid_cart` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `merchantid_cart` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `sex` enum('MALE','FEMALE') NOT NULL,
  `phone` char(11) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_num` varchar(18) NOT NULL,
  `delivery_addr` varchar(500) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `id_num_UNIQUE` (`id_num`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food` (
  `food_id` int NOT NULL AUTO_INCREMENT,
  `merchant_id` int NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_price` int NOT NULL,
  `ordered_count` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`food_id`),
  KEY `merchant_id_idx` (`merchant_id`),
  CONSTRAINT `merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` enum('CUSTOMER','MERCHANT','RIDER','ADMIN') NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merchant` (
  `merchant_id` int NOT NULL AUTO_INCREMENT,
  `merchant_name` varchar(45) NOT NULL,
  `merchant_addr` varchar(500) NOT NULL,
  `phone` char(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `delivery_coverage` varchar(10) NOT NULL,
  `is_open` enum('YES','NO') NOT NULL DEFAULT 'YES' COMMENT '1= open, 0 = closed',
  `menu_id` int DEFAULT NULL,
  `area_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`merchant_id`),
  UNIQUE KEY `menu_id_UNIQUE` (`menu_id`),
  KEY `areaid_idx` (`area_id`),
  CONSTRAINT `areaid_merchant` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_menu`
--

DROP TABLE IF EXISTS `order_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_menu` (
  `ordermenu_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_price` int NOT NULL,
  `food_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`ordermenu_id`),
  UNIQUE KEY `ordermenu_id_UNIQUE` (`ordermenu_id`),
  KEY `orderid_ordermenu_idx` (`order_id`),
  CONSTRAINT `orderid_ordermenu` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_time` datetime NOT NULL,
  `customer_id` int NOT NULL,
  `phone` varchar(11) NOT NULL,
  `total_price` int NOT NULL,
  `merchant_id` int NOT NULL,
  `rider_id` int DEFAULT NULL,
  `delivery_addr` varchar(500) NOT NULL,
  `order_status` enum('ORDERED','YIJIEDAN','QISHOUDAODIAN','PEISONGZHONG','DONE','CANCELED') NOT NULL DEFAULT 'ORDERED',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `riderid_idx` (`rider_id`),
  KEY `customerid_order_idx` (`customer_id`),
  KEY `merchantid_order_idx` (`merchant_id`),
  CONSTRAINT `customerid_order` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `merchantid_order` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riderid_order` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rider` (
  `rider_id` int NOT NULL AUTO_INCREMENT,
  `rider_name` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL,
  `joinTime` datetime NOT NULL,
  `homeAddr` varchar(500) NOT NULL,
  `temp` decimal(3,1) NOT NULL DEFAULT '36.0',
  `pcr` enum('POSITIVE','NEGATIVE') NOT NULL DEFAULT 'NEGATIVE',
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pcr_time` datetime DEFAULT NULL,
  `service_status` enum('ACTIVE','SUSPENDED') DEFAULT 'ACTIVE',
  PRIMARY KEY (`rider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-29 23:38:55

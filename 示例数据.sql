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
-- Dumping data for table `alert_table`
--

LOCK TABLES `alert_table` WRITE;
/*!40000 ALTER TABLE `alert_table` DISABLE KEYS */;
INSERT INTO `alert_table` VALUES (1,1,'You are under high danger of COVID-19 Infection, Please Complete 5tian 3jian!','2022-12-28 23:57:54',1),(2,1,'You are under high danger of COVID-19 Infection, Please Complete 5tian 3jian!','2022-12-28 23:57:58',1),(3,2,'You are under high danger of COVID-19 Infection, Please Complete 5tian 3jian!','2022-12-29 00:17:57',0),(4,9,'You are under high danger of COVID-19 Infection, Please Complete 5tian 3jian!','2022-12-29 02:12:39',0);
/*!40000 ALTER TABLE `alert_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (0,'NO'),(1,'NO'),(2,'NO'),(3,'NO');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Been Yun','2004-01-06','FEMALE','15600066166','yunbeen0106@naver.com','been','been','213904829304890218','ShangdiShijie 19Hao'),(2,'Percy','1999-05-17','MALE','13146108388','','percy','percy','213948291037897328','Zhongguan Xinyuan 3Hao Lou'),(3,'Jack','2000-01-01','MALE','13023194893','jack@pku.edu.cn','jack','jack','234574432134556778','Yanyuan 35 Haolou'),(4,'Bob','2003-05-01','MALE','13225192893','bob@pku.edu.cn','bob','bob','234574432134456778','Yanyuan 10 Haolou'),(5,'Winnie','2001-06-01','FEMALE','13212592893','winnie@pku.edu.cn','winnie','winnie','234574468934456778','Yanyuan 10 Haolou'),(6,'Jane','1998-06-01','FEMALE','13212123493','jane@pku.edu.cn','jane','jane','354574468934456778','Zhongguan Yuan 3Hao'),(7,'Raph','1999-06-01','MALE','13212112345','raph@pku.edu.cn','raph','raph','354145468934456778','Yanyuan 28 HaoLou'),(8,'Rich','1998-10-08','MALE','15912112345','rich@pku.edu.cn','rich','rich','354141234934456778','Yanyuan 23 HaoLou'),(9,'Perry','1970-10-08','MALE','13912112345','perry@pku.edu.cn','perry','perry','354141212344456778','Yanyuan 23 HaoLou'),(10,'John','1980-10-15','MALE','11234662345','john@pku.edu.cn','john','john','342123456789456778','Yanyuan 18 HaoLou'),(11,'Alice','2003-01-04','FEMALE','12347892374','alice@pku.edu.cn','alice','alice','212342577539456778','Yanyuan 9 HaoLou'),(12,'Chris','2005-10-29','MALE','15610283478','chris@pku.edu.cn','chris','chris','312123423339456778','Yanyuan 10 HaoLou'),(13,'Dave','2008-01-09','MALE','13592839849','dave@pku.edu.cn','dave','dave','123453423339456778','Yanyuan 3 HaoLou'),(14,'Ethan','2004-07-07','MALE','14712837894',NULL,'ethan','ethan','3452339456723','Yanyuan 3 HaoLou'),(15,'Grace','2002-07-07','FEMALE','13512346461',NULL,'grace','grace','123457042346456723','Yanyuan 9 HaoLou'),(16,'James','2002-07-07','MALE','16234146461',NULL,'james','james','312345642346456723','Yanyuan 3 HaoLou'),(17,'Mary','2001-03-14','FEMALE','13112355793',NULL,'mary','mary','123443291037897328','Zhongguan Xinyuan 2Hao Lou'),(18,'Kimmy','2002-02-19','FEMALE','15678355793',NULL,'kimmy','kimmy','312345657037897328','Zhongguan Xinyuan 6Hao Lou'),(19,'Sonny','1976-01-08','MALE','18748376893',NULL,'sonny','sonny','876182357037897328','Zhongguan Xinyuan 3Hao Lou'),(20,'Messi','1973-03-09','MALE','19983416893',NULL,'messi','messi','238471297037897328','Zhongguan Xinyuan 5Hao Lou');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,1,'Cheese Pizza',80,8),(2,1,'Potato Pizza',90,5),(3,1,'BBQ Pizza',80,4),(4,1,'Seafood Pizza',100,2),(5,1,'Hawaiian Pizza',85,4),(6,1,'Chicken Platter',40,5),(7,1,'Garlic Sauce',4,24),(8,1,'Tomato Spaghetti',35,2),(9,1,'Carbonara',40,3),(10,1,'Sprite_Papajohns',5,17),(11,2,'Ginger Burger',21,5),(12,2,'Spicy Ginger Burger',21,6),(13,2,'New Orleans Burger',22,2),(14,2,'Lao Beijing Chicken Roll',20,2),(15,2,'Chicken Popcorn',14,5),(16,2,'French Fries_KFC',15,2),(17,2,'Mashed Potato',9,5),(18,2,'Crazy Thursday Set',80,2),(19,2,'Coke_KFC',5,8),(20,2,'Egg Tart',8,5),(21,3,'Kimchi Fried Rice',32,9),(22,3,'Kimchi Soup',36,2),(23,3,'Seafood Tofu Soup',40,3),(24,3,'Kimchi',5,5),(25,3,'Rice',4,6),(26,3,'Seaweed Soup',35,3),(27,3,'Banana Milk',10,5),(28,3,'Soju',24,6),(29,3,'Korean Banfan',37,2),(30,3,'Bulgogi Rice',33,1),(31,4,'ZhiZhi Meimei',28,5),(32,4,'ZhiZhi Mangmang',28,2),(33,4,'DuoRou Putao',28,7),(34,4,'ZhiZhi Lvyan',13,3),(35,4,'ChunniuRucha',15,2),(36,4,'Americano',8,3),(37,4,'Latte',16,4),(38,4,'Coconut Latte',17,5),(39,4,'Bobo Naicha',19,2),(40,4,'DuoRou Qingti',19,3),(41,5,'Big Mac Set',52,7),(42,5,'Cheese Burger Set',39,1),(43,5,'Double Cheese Burger Set',49,4),(44,5,'Fillet O Fish Set',34,1),(45,5,'Spicy Chicken Burger Set',46,2),(46,5,'Grilled Chicken Burger Set',40,1),(47,5,'McNuggets',14,5),(48,5,'Taro Pie',9,4),(49,5,'Pineapple Pie',9,7),(50,5,'Zero Coke_McDonalds',11,5),(51,1,'Coke_Papajohns',5,12);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('admin1','admin1','ADMIN'),('alice','alice','CUSTOMER'),('been','been','CUSTOMER'),('bob','bob','CUSTOMER'),('chris','chris','CUSTOMER'),('dave','dave','CUSTOMER'),('ethan','ethan','CUSTOMER'),('grace','grace','CUSTOMER'),('heytea','heytea','MERCHANT'),('jack','jack','CUSTOMER'),('james','james','CUSTOMER'),('jane','jane','CUSTOMER'),('john','john','CUSTOMER'),('kfc','kfc','MERCHANT'),('kimmy','kimmy','CUSTOMER'),('mary','mary','CUSTOMER'),('mcdonalds','mcdonalds','MERCHANT'),('messi','messi','CUSTOMER'),('papajohns','papajohns','MERCHANT'),('percy','percy','CUSTOMER'),('perry','perry','CUSTOMER'),('raph','raph','CUSTOMER'),('rich','rich','CUSTOMER'),('riderchen','riderchen','RIDER'),('riderjang','riderjang','RIDER'),('riderjung','riderjung','RIDER'),('riderkang','riderkang','RIDER'),('riderkim','riderkim','RIDER'),('riderlee','riderlee','RIDER'),('ridersun','ridersun','RIDER'),('riderwang','riderwang','RIDER'),('riderxu','riderxu','RIDER'),('rideryun','rideryun','RIDER'),('seoul798','seoul798','MERCHANT'),('sonny','sonny','CUSTOMER'),('winnie','winnie','CUSTOMER');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `merchant`
--

LOCK TABLES `merchant` WRITE;
/*!40000 ALTER TABLE `merchant` DISABLE KEYS */;
INSERT INTO `merchant` VALUES (1,'Papa Johns','ZhongguanCun','13873726471','papajohns','papajohns','1234','YES',1,2),(2,'KFC','Wudaokou','14782890192','kfc','kfc','12345','YES',2,1),(3,'Seoul 798','Wudaokou Dongyuan Dasha','13148029384','seoul798','seoul798','123','YES',3,1),(4,'Heytea','Suzhoujie','17612341234','heytea','heytea','123','YES',4,3),(5,'McDonalds','ZhongguanCun','01039489238','mcdonalds','mcdonalds','12','YES',5,2);
/*!40000 ALTER TABLE `merchant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_menu`
--

LOCK TABLES `order_menu` WRITE;
/*!40000 ALTER TABLE `order_menu` DISABLE KEYS */;
INSERT INTO `order_menu` VALUES (38,25,'Cheese Pizza',80,1,2),(39,25,'BBQ Pizza',80,3,1),(40,25,'Sprite_Papajohns',5,10,1),(41,26,'Kimchi Fried Rice',32,21,1),(42,26,'Seafood Tofu Soup',40,23,1),(44,27,'ZhiZhi Meimei',28,31,3),(45,28,'Spicy Ginger Burger',21,12,3),(46,28,'Coke_KFC',5,19,2),(48,29,'Seafood Pizza',100,4,2),(49,29,'Garlic Sauce',4,7,4),(50,29,'Carbonara',40,9,1),(51,30,'Kimchi Fried Rice',32,21,1),(52,30,'Kimchi',5,24,1),(53,30,'Soju',24,28,1),(54,31,'Rice',4,25,1),(55,31,'Seaweed Soup',35,26,1),(57,32,'Kimchi',5,24,2),(58,32,'Korean Banfan',37,29,1),(60,33,'DuoRou Putao',28,33,1),(61,33,'ChunniuRucha',15,35,2),(62,33,'Americano',8,36,1),(63,34,'Big Mac Set',52,41,2),(64,34,'Fillet O Fish Set',34,44,1),(65,34,'Taro Pie',9,48,3),(66,35,'Potato Pizza',90,2,1),(67,35,'Hawaiian Pizza',85,5,1),(68,35,'Chicken Platter',40,6,2),(69,35,'Tomato Spaghetti',35,8,1),(70,35,'Sprite_Papajohns',5,10,3),(73,36,'Spicy Ginger Burger',21,12,1),(74,36,'Chicken Popcorn',14,15,2),(75,36,'French Fries_KFC',15,16,1),(76,36,'Mashed Potato',9,17,3),(77,36,'Crazy Thursday Set',80,18,1),(80,37,'Coconut Latte',17,38,1),(81,37,'DuoRou Qingti',19,40,2),(83,38,'Cheese Pizza',80,1,1),(84,39,'Kimchi Fried Rice',32,21,1),(85,39,'Soju',24,28,1),(86,39,'Bulgogi Rice',33,30,1),(87,40,'New Orleans Burger',22,13,1),(88,40,'Lao Beijing Chicken Roll',20,14,1),(89,40,'Egg Tart',8,20,3),(90,41,'ZhiZhi Mangmang',28,32,1),(91,41,'ZhiZhi Lvyan',13,34,2),(93,42,'DuoRou Putao',28,33,1),(94,42,'Latte',16,37,2),(96,43,'Cheese Pizza',80,1,2),(97,43,'Chicken Platter',40,6,1),(98,43,'Garlic Sauce',4,7,4),(99,43,'Carbonara',40,9,1),(103,44,'Double Cheese Burger Set',49,43,1),(104,44,'Pineapple Pie',9,49,2),(105,44,'Zero Coke_McDonalds',11,50,1),(106,45,'ZhiZhi Mangmang',28,32,1),(107,45,'ZhiZhi Lvyan',13,34,1),(108,45,'DuoRou Qingti',19,40,2),(109,46,'Americano',8,36,1),(110,46,'Bobo Naicha',19,39,1),(112,47,'Ginger Burger',21,11,1),(113,47,'Chicken Popcorn',14,15,1),(114,47,'Coke_KFC',5,19,1),(115,48,'Kimchi Fried Rice',32,21,3),(116,48,'Kimchi Soup',36,22,1),(117,48,'Banana Milk',10,27,1),(118,49,'Grilled Chicken Burger Set',40,46,1),(119,49,'McNuggets',14,47,1),(120,49,'Zero Coke_McDonalds',11,50,2),(121,50,'ZhiZhi Meimei',28,31,2),(122,50,'Bobo Naicha',19,39,1),(124,51,'Spicy Chicken Burger Set',46,45,1),(125,51,'Pineapple Pie',9,49,1),(127,52,'Cheese Burger Set',39,42,1),(128,52,'McNuggets',14,47,1),(130,53,'Kimchi Fried Rice',32,21,1),(131,53,'Kimchi',5,24,1),(132,53,'Rice',4,25,1),(133,54,'Lao Beijing Chicken Roll',20,14,1),(134,54,'Coke_KFC',5,19,1),(135,54,'Egg Tart',8,20,1),(136,55,'Cheese Pizza',80,1,2),(137,55,'Potato Pizza',90,2,2),(138,55,'Sprite_Papajohns',5,10,10),(139,56,'DuoRou Putao',28,33,1),(140,56,'ZhiZhi Lvyan',13,34,1),(142,57,'Ginger Burger',21,11,1),(143,57,'New Orleans Burger',22,13,1),(144,57,'Coke_KFC',5,19,1),(145,58,'Double Cheese Burger Set',49,43,1),(146,58,'Taro Pie',9,48,1),(147,58,'Pineapple Pie',9,49,1),(148,59,'Hawaiian Pizza',85,5,1),(149,59,'Chicken Platter',40,6,1),(150,59,'Garlic Sauce',4,7,6),(151,59,'Carbonara',40,9,1),(152,59,'Sprite_Papajohns',5,10,3),(155,60,'Rice',4,25,1),(156,60,'Seaweed Soup',35,26,1),(157,60,'Banana Milk',10,27,1),(158,61,'ZhiZhi Meimei',28,31,1),(159,61,'DuoRou Qingti',19,40,1),(161,62,'Kimchi Fried Rice',32,21,1),(162,62,'Banana Milk',10,27,2),(163,62,'Soju',24,28,1),(164,63,'Americano',8,36,1),(165,63,'Latte',16,37,1),(167,64,'Spicy Chicken Burger Set',46,45,1),(168,64,'Zero Coke_McDonalds',11,50,1),(170,65,'BBQ Pizza',80,3,1),(171,65,'Garlic Sauce',4,7,4),(172,65,'Coke_Papajohns',5,51,3),(173,66,'Kimchi Fried Rice',32,21,1),(174,66,'Kimchi Soup',36,22,1),(175,66,'Rice',4,25,3),(176,67,'Ginger Burger',21,11,2),(177,67,'French Fries_KFC',15,16,1),(178,67,'Coke_KFC',5,19,3),(179,68,'BBQ Pizza',80,3,1),(180,68,'Coke_Papajohns',5,51,2),(182,69,'Coconut Latte',17,38,3),(183,70,'Seafood Tofu Soup',40,23,1),(184,70,'Kimchi',5,24,1),(186,71,'ZhiZhi Meimei',28,31,1),(187,71,'ZhiZhi Mangmang',28,32,1),(189,72,'Seaweed Soup',35,26,1),(190,72,'Banana Milk',10,27,1),(192,73,'Big Mac Set',52,41,2),(193,73,'Pineapple Pie',9,49,1),(195,74,'Hawaiian Pizza',85,5,2),(196,74,'Chicken Platter',40,6,1),(197,74,'Garlic Sauce',4,7,1),(198,74,'Tomato Spaghetti',35,8,1),(199,74,'Coke_Papajohns',5,51,1),(202,75,'DuoRou Putao',28,33,3),(203,76,'Soju',24,28,2),(204,76,'Korean Banfan',37,29,1),(206,77,'Spicy Ginger Burger',21,12,1),(207,77,'Chicken Popcorn',14,15,2),(208,77,'Egg Tart',8,20,1),(209,78,'Cheese Pizza',80,1,1),(210,78,'Potato Pizza',90,2,1),(211,78,'Garlic Sauce',4,7,5),(212,78,'Coke_Papajohns',5,51,3),(216,79,'BBQ Pizza',80,3,1),(217,79,'Coke_Papajohns',5,51,1),(219,80,'Big Mac Set',52,41,1),(220,80,'McNuggets',14,47,2),(222,81,'Ginger Burger',21,11,1),(223,81,'Spicy Ginger Burger',21,12,1),(225,82,'Double Cheese Burger Set',49,43,1),(226,82,'Zero Coke_McDonalds',11,50,1),(228,83,'DuoRou Putao',28,33,1),(229,83,'Coconut Latte',17,38,1),(231,84,'Seafood Tofu Soup',40,23,1),(232,84,'Soju',24,28,1),(234,85,'ZhiZhi Meimei',28,31,1),(235,85,'Latte',16,37,1),(237,86,'Big Mac Set',52,41,1),(238,86,'McNuggets',14,47,1),(239,86,'Pineapple Pie',9,49,1),(240,87,'Cheese Pizza',80,1,1),(241,87,'Potato Pizza',90,2,1),(242,87,'Coke_Papajohns',5,51,2),(243,88,'Big Mac Set',52,41,1),(244,88,'Double Cheese Burger Set',49,43,1),(245,88,'Pineapple Pie',9,49,1),(246,89,'Mashed Potato',9,17,2),(247,89,'Crazy Thursday Set',80,18,1);
/*!40000 ALTER TABLE `order_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (25,'2022-12-29 00:06:49',1,'15600066166',245,1,1,'ShangdiShijie 19Hao','DONE',NULL),(26,'2022-12-29 00:09:21',1,'15600066166',72,3,4,'ShangdiShijie 19Hao','DONE',NULL),(27,'2022-12-29 00:09:41',1,'15600066166',84,4,NULL,'ShangdiShijie 19Hao','CANCELED',NULL),(28,'2022-12-29 00:12:10',2,'13146108388',73,2,3,'Zhongguan Xinyuan 3Hao Lou','DONE',NULL),(29,'2022-12-29 00:13:11',2,'13146108388',256,1,10,'Zhongguan Xinyuan 3Hao Lou','DONE',NULL),(30,'2022-12-29 00:14:36',2,'13146108388',61,3,4,'Zhongguan Xinyuan 3Hao Lou','PEISONGZHONG',NULL),(31,'2022-12-29 00:15:28',2,'13146108388',39,3,4,'Zhongguan Xinyuan 3Hao Lou','QISHOUDAODIAN',NULL),(32,'2022-12-29 00:16:22',2,'13146108388',47,3,4,'Zhongguan Xinyuan 3Hao Lou','QISHOUDAODIAN',NULL),(33,'2022-12-29 00:17:18',3,'13023194893',66,4,2,'Yanyuan 35 Haolou','DONE',NULL),(34,'2022-12-29 00:19:09',3,'13023194893',165,5,7,'Yanyuan 35 Haolou','DONE',NULL),(35,'2022-12-29 00:20:45',3,'13023194893',305,1,5,'Yanyuan 35 Haolou','DONE',NULL),(36,'2022-12-29 00:22:18',4,'13225192893',171,2,3,'Yanyuan 10 Haolou','DONE',NULL),(37,'2022-12-29 00:22:58',4,'13225192893',55,4,1,'Yanyuan 10 Haolou','DONE',NULL),(38,'2022-12-29 00:23:28',4,'13225192893',80,1,NULL,'Yanyuan 10 Haolou','CANCELED',NULL),(39,'2022-12-29 00:26:41',5,'13212592893',89,3,2,'Yanyuan 10 Haolou','DONE',NULL),(40,'2022-12-29 00:28:48',5,'13212592893',66,2,4,'Yanyuan 10 Haolou','DONE',NULL),(41,'2022-12-29 00:30:53',5,'13212592893',54,4,3,'Yanyuan 10 Haolou','DONE',NULL),(42,'2022-12-29 00:31:28',5,'13212592893',60,4,1,'Yanyuan 10 Haolou','DONE',NULL),(43,'2022-12-29 00:32:38',6,'13212123493',256,1,4,'Zhongguan Yuan 3Hao','DONE',NULL),(44,'2022-12-29 00:34:01',6,'13212123493',78,5,1,'Zhongguan Yuan 3Hao','DONE',NULL),(45,'2022-12-29 00:34:54',6,'13212123493',79,4,NULL,'Zhongguan Yuan 3Hao','CANCELED',NULL),(46,'2022-12-29 00:39:24',6,'13212123493',27,4,2,'Zhongguan Yuan 3Hao','DONE',NULL),(47,'2022-12-29 00:44:19',7,'13212112345',40,2,5,'Yanyuan 28 HaoLou','DONE',NULL),(48,'2022-12-29 00:45:07',7,'13212112345',142,3,3,'Yanyuan 28 HaoLou','DONE',NULL),(49,'2022-12-29 00:45:45',7,'13212112345',76,5,5,'Yanyuan 28 HaoLou','DONE',NULL),(50,'2022-12-29 01:26:44',8,'15912112345',75,4,3,'Yanyuan 23 HaoLou','DONE',NULL),(51,'2022-12-29 01:27:24',8,'15912112345',55,5,7,'Yanyuan 23 HaoLou','DONE',NULL),(52,'2022-12-29 01:27:45',8,'15912112345',53,5,6,'Yanyuan 23 HaoLou','DONE',NULL),(53,'2022-12-29 01:29:06',9,'13912112345',41,3,7,'Yanyuan 23 HaoLou','DONE',NULL),(54,'2022-12-29 01:29:47',9,'13912112345',33,2,7,'Yanyuan 23 HaoLou','DONE',NULL),(55,'2022-12-29 01:30:05',9,'13912112345',390,1,5,'Yanyuan 23 HaoLou','DONE',NULL),(56,'2022-12-29 01:35:53',10,'11234662345',41,4,6,'Yanyuan 18 HaoLou','PEISONGZHONG',NULL),(57,'2022-12-29 01:36:04',10,'11234662345',48,2,6,'Yanyuan 18 HaoLou','QISHOUDAODIAN',NULL),(58,'2022-12-29 01:36:18',10,'11234662345',67,5,6,'Yanyuan 18 HaoLou','PEISONGZHONG',NULL),(59,'2022-12-29 01:37:26',11,'12347892374',204,1,7,'Yanyuan 9 HaoLou','DONE',NULL),(60,'2022-12-29 01:38:43',11,'12347892374',49,3,7,'Yanyuan 9 HaoLou','DONE',NULL),(61,'2022-12-29 01:39:25',11,'12347892374',47,4,7,'Yanyuan 9 HaoLou','DONE',NULL),(62,'2022-12-29 01:40:22',12,'15610283478',76,3,5,'Yanyuan 10 HaoLou','DONE',NULL),(63,'2022-12-29 01:40:34',12,'15610283478',24,4,8,'Yanyuan 10 HaoLou','DONE',NULL),(64,'2022-12-29 01:41:29',12,'15610283478',57,5,7,'Yanyuan 10 HaoLou','DONE',NULL),(65,'2022-12-29 01:42:46',12,'15610283478',111,1,8,'Yanyuan 10 HaoLou','DONE',NULL),(66,'2022-12-29 01:44:03',13,'13592839849',80,3,7,'Yanyuan 3 HaoLou','DONE',NULL),(67,'2022-12-29 01:44:45',13,'13592839849',72,2,8,'Yanyuan 3 HaoLou','DONE',NULL),(68,'2022-12-29 01:45:07',13,'13592839849',90,1,8,'Yanyuan 3 HaoLou','DONE',NULL),(69,'2022-12-29 01:45:37',14,'14712837894',51,4,7,'Yanyuan 3 HaoLou','DONE',NULL),(70,'2022-12-29 01:45:54',14,'14712837894',45,3,9,'Yanyuan 3 HaoLou','DONE',NULL),(71,'2022-12-29 01:46:11',14,'14712837894',56,4,8,'Yanyuan 3 HaoLou','DONE',NULL),(72,'2022-12-29 01:46:32',15,'13512346461',45,3,9,'Yanyuan 9 HaoLou','DONE',NULL),(73,'2022-12-29 01:46:43',15,'13512346461',113,5,8,'Yanyuan 9 HaoLou','DONE',NULL),(74,'2022-12-29 01:47:10',15,'13512346461',254,1,7,'Yanyuan 9 HaoLou','DONE',NULL),(75,'2022-12-29 01:48:38',16,'16234146461',84,4,8,'Yanyuan 3 HaoLou','DONE',NULL),(76,'2022-12-29 01:48:53',16,'16234146461',85,3,8,'Yanyuan 3 HaoLou','DONE',NULL),(77,'2022-12-29 01:49:29',16,'16234146461',57,2,8,'Yanyuan 3 HaoLou','DONE',NULL),(78,'2022-12-29 01:52:08',17,'13112355793',205,1,9,'Zhongguan Xinyuan 2Hao Lou','DONE',NULL),(79,'2022-12-29 01:52:36',17,'13112355793',85,1,10,'Zhongguan Xinyuan 2Hao Lou','DONE',NULL),(80,'2022-12-29 01:53:02',17,'13112355793',80,5,10,'Zhongguan Xinyuan 2Hao Lou','DONE',NULL),(81,'2022-12-29 01:53:44',18,'15678355793',42,2,9,'Zhongguan Xinyuan 6Hao Lou','DONE',NULL),(82,'2022-12-29 01:53:54',18,'15678355793',60,5,10,'Zhongguan Xinyuan 6Hao Lou','DONE',NULL),(83,'2022-12-29 01:54:17',18,'15678355793',45,4,7,'Zhongguan Xinyuan 6Hao Lou','DONE',NULL),(84,'2022-12-29 01:54:47',19,'18748376893',64,3,8,'Zhongguan Xinyuan 3Hao Lou','DONE',NULL),(85,'2022-12-29 01:54:58',19,'18748376893',44,4,10,'Zhongguan Xinyuan 3Hao Lou','DONE',NULL),(86,'2022-12-29 01:55:18',19,'18748376893',75,5,9,'Zhongguan Xinyuan 3Hao Lou','DONE',NULL),(87,'2022-12-29 01:55:48',20,'19983416893',180,1,10,'Zhongguan Xinyuan 5Hao Lou','DONE',NULL),(88,'2022-12-29 01:56:01',20,'19983416893',110,5,10,'Zhongguan Xinyuan 5Hao Lou','DONE',NULL),(89,'2022-12-29 01:56:30',20,'19983416893',98,2,7,'Zhongguan Xinyuan 5Hao Lou','DONE',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
INSERT INTO `rider` VALUES (1,'Rider Kim','16712341234','2022-12-28 23:56:54','ZhongguanCun 3Hao',36.0,'NEGATIVE','riderkim','riderkim','2022-12-28 23:56:54','ACTIVE'),(2,'Rider Wang','18737263746','2022-12-28 23:58:59','Xinyuan 3Hao Lou',38.2,'NEGATIVE','riderwang','riderwang','2022-12-28 23:58:59','ACTIVE'),(3,'Rider Sun','18732837148','2022-12-28 23:59:47','Yanyuan 28Haolou',36.0,'NEGATIVE','ridersun','ridersun','2022-12-28 23:59:47','ACTIVE'),(4,'Rider Jang','13627389417','2022-12-29 00:00:53','Wudaokou Xinqu',36.0,'NEGATIVE','riderjang','riderjang','2022-12-29 00:00:53','ACTIVE'),(5,'Rider Lee','19892838784','2022-12-29 00:01:36','Yanyuan 30 Hao',36.0,'NEGATIVE','riderlee','riderlee','2022-12-29 00:01:36','ACTIVE'),(6,'Rider Kang','18723647162','2022-12-29 00:02:23','Wudaokou 2',36.0,'NEGATIVE','riderkang','riderkang','2022-12-29 00:02:23','ACTIVE'),(7,'Rider Chen','12324283018','2022-12-29 00:02:59','Zhongguancun 5Hao',36.0,'NEGATIVE','riderchen','riderchen','2022-12-29 00:02:59','ACTIVE'),(8,'Rider Xu','13123413241','2022-12-29 00:03:41','Qinghua Jisuanji Xi',36.0,'NEGATIVE','riderxu','riderxu','2022-12-29 00:03:41','ACTIVE'),(9,'Rider Jung','19321341234','2022-12-29 00:04:26','Zhongxin 6',38.2,'NEGATIVE','riderjung','riderjung','2022-12-29 00:04:26','ACTIVE'),(10,'Rider Yun','15139749120','2022-12-29 00:04:47','Shangdi 9',36.0,'NEGATIVE','rideryun','rideryun','2022-12-29 00:04:47','ACTIVE');
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-29  2:13:50

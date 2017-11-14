-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: foodsearch_db
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'batata frita','eweewr','eq'),(2,'nanda','jhujhdsu',''),(3,'suco','nksa',''),(4,'aand, ','mw\'','m,w');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_meis`
--

DROP TABLE IF EXISTS `profile_meis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_meis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `space` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_user` (`user_id`),
  KEY `fk_profile_nemu` (`menu_id`),
  CONSTRAINT `fk_profile_nemu` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `fk_profile_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_meis`
--

LOCK TABLES `profile_meis` WRITE;
/*!40000 ALTER TABLE `profile_meis` DISABLE KEYS */;
INSERT INTO `profile_meis` VALUES (1,'nadadadfd','uiuwiuwqi','iieroewpo','134RJ',1,1,'',0.000000,0.000000),(2,'er54er','edr4e','ert','ert',2,1,'',0.000000,0.000000),(3,'nkm','m,s','lms','lm',3,3,'\r\nbb',0.000000,0.000000),(4,'jebn','uqhj2n','ubwjqnm','ne',8,3,'2e\'',0.000000,0.000000),(5,'jebn','uqhj2n','ubwjqnm','ne',8,3,'2e\'',0.000000,0.000000),(6,'amanda','KMS ','KLW','KMW ',1,1,'M,',-98.000000,50.000000),(7,'rua verteste','12','jk ','nkk',4,3,'wbnbw',-7.834370,-34.906399),(8,'nada','nsn','ns','mk',1,1,'mm',51.508743,-0.120850),(9,'rua vertentes','mn','m,','nm',1,1,'nm',-98.000000,50.000000),(10,'abreu','nk','m,','nm,',1,1,'nm,',-7.910140,-34.903301),(11,'ke4n\'','k, ',' nb',' bnm,',1,1,'bnm,',-8.054280,-34.881302);
/*!40000 ALTER TABLE `profile_meis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Amanda Isabel','amanda@amanda.com','$2y$10$0elmYPYDd4Rm0VHdn0lvVeLlGEUtgyYWGFocioSQeNTZYQRZC1QSq','amanda castro'),(2,'jose Vinicius','vinicius@njenh.coikm','$2y$10$yGcyoLsLROfBPXfJFpl0DOxVLjXPl9bl1EmSFX0qv.Av6FzTHnZIG','sa'),(3,'nada','msn@nd.cm','nww',''),(4,'amandaisabel','alama@mans.com','123',''),(5,'amanda','nanas@knsa.oc','123','ANA'),(6,'amandasa','amandjdok@kmsa.ck','123','amanda isabel'),(7,'nmne','khqwn@jnms.com','123','anakhn'),(8,'amandacastro','amandacastro@dnd.cd','$2y$10$ZKvA6W6UChJ9uCzx3PNvuuiXRvmpFGdr8vHIFy4pynwTiLLHBpjXW','Amanda');
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

-- Dump completed on 2017-11-13 21:04:21

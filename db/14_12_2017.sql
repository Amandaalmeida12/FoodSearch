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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_image_profile` (`profile_id`),
  CONSTRAINT `fk_image_profile` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (3,'download.jpeg','',20),(4,'download.jpeg','',20),(5,'galeriasgato-gif.gif',NULL,20),(6,'galeriasmei.png',NULL,21),(7,'galeriasgato-gif.gif',NULL,22),(8,'gato-gif.gif',NULL,20),(9,'gato-gif.gif',NULL,20),(10,'galeriasd255d69b-d8eb-4a64-9d95-3ec6511055a1-cake-logo.png',NULL,20),(11,'galeriasgato-gif.gif',NULL,20),(12,'images.jpeg',NULL,23),(13,'download.jpeg',NULL,24),(14,'download (1).jpeg',NULL,20),(15,'download (2).jpeg',NULL,26),(16,'download (2).jpeg',NULL,20);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `price` float DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (28,'batata frita',5.5,'hamburgueria','batata frita','download.jpeg',NULL),(29,'comida',9,'comida','comida diversas','download.jpeg',NULL),(30,'batata',4,'hamburguer','batabaat','galeriasmei.png',NULL),(31,'batata',4,'hamburguer','batabaat','galeriasmei.png',NULL),(32,'Hamburgueria',4,'hamburgueria','hamburguer','images.jpeg',NULL),(33,'Currasco',24,'churrascaria','Churrasco','download.jpeg',NULL),(34,'Pizza',22,'pizzaria','Pizza','download (1).jpeg',NULL),(35,'Tapioca',4,'Tapioca','Tapiocaria','download (2).jpeg',NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_menus`
--

DROP TABLE IF EXISTS `profile_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_id` (`profile_id`),
  KEY `fk_profile_menu` (`menu_id`),
  KEY `fk_profile_menu_image` (`image_id`),
  CONSTRAINT `fk_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_profile_menu` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_profile_menu_image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_menus`
--

LOCK TABLES `profile_menus` WRITE;
/*!40000 ALTER TABLE `profile_menus` DISABLE KEYS */;
INSERT INTO `profile_menus` VALUES (11,23,32,12),(12,24,33,13),(13,25,34,13),(14,26,35,15);
/*!40000 ALTER TABLE `profile_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_user` (`user_id`),
  CONSTRAINT `fk_profile_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (20,'Alice','R. Vertentes, 19 - Santo Antônio, Igarassu - PE, Brasil','18:00 as 21:00','999999','Empresa de lanches','download.jpeg',NULL,31,-7.853866,-34.909225),(21,'comida','Paulista - Navarro, Paulista - PE, Brasil','09:00 as 21:00','787878','comida','download.jpeg','',31,-7.918455,-34.820957),(22,'nmGHJ','Recife - Paratibe, Recife - PE, Brasil','HGJ','7876789','EMPRESA DE PÃO','galeriasmei.png',NULL,31,-8.057838,-34.882896),(23,'Hamburgueria','Igarassu, PE, Brasil','19:00 as 22:00','35457788','hamburgueria ','images.jpeg',NULL,30,-7.829224,-34.901619),(24,'Churrascaaria','Cruz de Rebouças, Igarassu - PE, Brasil','12:00 as 22:00','56356','Churrascaria','download.jpeg',NULL,30,-7.877619,-34.898277),(25,'Pizzaria','Olinda, PE, Brasil','12:00 as 22:00','5494333','Pizzaria','download (1).jpeg',NULL,30,-7.990714,-34.841621),(26,'Tapiocaria','Paulista - Navarro, Paulista - PE, Brasil','08:00 as 17:00','67484','tapioca','download (2).jpeg',NULL,30,-7.918455,-34.820957);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
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
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (30,'amandacasttro','amandaisabel237@gmail.com','$2y$10$p3AH8sabuad9TDaIE2bj4eyUU30mUnMiGMsroSNuCgUXWFNicAFjq'),(31,'ALICE','alice@alice.com','$2y$10$fvqsut1sRwocZ/i56MV1ze4i14O44bz/e8iLaZT5gDe4YvaM/r.lG'),(32,'joão','joao@joao.com','$2y$10$LUtg9GYYuTN6cyOJF7qtQOCrF8EZAK.Vj.L1kCx1UGgniSMO01GL.'),(33,'banbina','bambina@babina.com','$2y$10$eAutRo4/GOJT7qOgwzMhTeLDYj.i3j1Ei2NyjH1OCq0xVzvgivr3i'),(34,'aaaa','aaa@aaa.com','$2y$10$W5Q80MgFhMX1BZTClRmqrOcUqGC8jCEgzhcjaK597hxooLj3damFi'),(35,'katiaaa','kattia@katia.com','$2y$10$2s0wMv9nPA0fw5aguAR2oOi6uzhLutOuJ.0HjBf3io6XWI38.VNXy'),(36,'hjnejnmenmm','njk@hhh.cin','$2y$10$lLbnokXvuOfeSmm7dGRtpuR1RmLTuKuwk7PAMH6UQelilu.0o.9fS'),(37,'olaaa','oooo@ooo.com','$2y$10$Fb.O0rHEnDxg6nikMVKdGOWEZ1gQtTgEwfndj84fOElRNX4He6wum');
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

-- Dump completed on 2017-12-14 21:48:22

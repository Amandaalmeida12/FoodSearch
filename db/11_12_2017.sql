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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'Logo-Food-Search-_Tamanho-Grande_.png','',3),(2,'Logo-Food-Search-_Tamanho-Grande_.png','',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (25,'batatas',2,'frituras','jnm','download.jpeg',''),(26,'cabra',NULL,'wkn','cabra assada','logo.png',NULL),(27,'macarrão',5,'chvjbn,','nbghfgjhkj','',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_menus`
--

LOCK TABLES `profile_menus` WRITE;
/*!40000 ALTER TABLE `profile_menus` DISABLE KEYS */;
INSERT INTO `profile_menus` VALUES (4,3,25,1),(6,10,27,2),(7,5,25,2),(8,11,26,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (3,'cASTRO','ghjkl','gcnmjbm',' nmbn',' nmbnmJKWQN GGHJ','download.jpeg','',28,1.000000,3.000000),(4,'nafaaa','km,,',',m','km,','l.','Logo-Food-Search-_Tamanho-Grande_.png','',15,43.000000,23.000000),(5,'nankm','km,.','jjkm,','jkm,','jkm,','Logo-Food-Search-_Tamanho-Grande_.png',NULL,15,23.000000,14.000000),(6,'amanda bhnb','Camaragibe - PE, Brasil','bnbm\'jbm\'','bn ','nbm','Logo-Food-Search-_Tamanho-Grande_.png',NULL,15,0.000000,0.000000),(7,'am','R. Mal. Deodoro - Matriz, Curitiba - PR, Brasil','jnm','jnm','jnm,','Logo-Food-Search-_Tamanho-Grande_.png',NULL,15,-25.427063,-49.256969),(8,'amanda','R. Vertentes, 19 - Santo Antônio, Igarassu - PE, Brasil','nkn m','m ','m','Logo-Food-Search-_Tamanho-Grande_.png',NULL,15,-7.853866,-34.909225),(9,'hbnm','Abreu e Lima, PE, Brasil','bnk','bjnm','jbnm','Logo-Food-Search-_Tamanho-Grande_.png',NULL,15,-7.901134,-34.898705),(10,'macaxeira','Macaxeira, Recife - PE, 52171-011, Brasil','123\'o\'','123','nm','Logo-Food-Search-_Tamanho-Grande_.png',NULL,27,-8.013154,-34.929184),(11,'facig','Rod. Gov. Mário Covas, S/n - Centro, Igarassu - PE, 53630-220, Brasil','07:00 as 14:00','999999','  nm,','gato-gif.gif',NULL,15,-7.855724,-34.909554),(12,'nwehb','R. Padre Carapuceiro - Boa Viagem, Recife - PE, Brasil','ghbjk','hbjk','hjk','cake.icon.png',NULL,15,-8.117414,-34.901089),(13,'nm','Derby, Recife - PE, 52171-011, Brasil','nm','m,','m ,','logotr.png',NULL,15,-8.056198,-34.899654),(14,'jghj','Rio Doce, Olinda - PE, Brasil','ghjk','hbjk','bn m','mei.png',NULL,15,-7.966105,-34.832207),(15,'hjghj','Torre, Recife - PE, 52171-011, Brasil','ghjk','ghjk','bnj','cake.logo.svg',NULL,15,-8.045011,-34.909920),(16,'br','BR-101, 236 - COHAB, Igarassu - PE, Brasil','hbjk','n m','bm','galeriascake.restaurante.png',NULL,15,-7.845562,-34.910069),(17,'ess','Espinheiro, Recife - PE, 50050-290, Brasil','ghjj','hghj','gh','cake.power.gif',NULL,15,-8.043143,-34.891380),(18,'fghj','Tamarineira, Recife - PE, 52171-011, Brasil','hjkl','vbh','kl','cake.power.gif',NULL,15,-8.029595,-34.900372),(19,'abas','Abadiânia - GO, 72940-000, Brasil','hj','bn','bn','cake.power.gif',NULL,15,-16.194319,-48.679001);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (14,'katia','katia@katia.com','$2y$10$WKOtKd9N9sx9pr9IixOW5uO0GJTSA0nWNJ0ltDoXOdYwTSIWfAVqW'),(15,'amandacasttro','hbbhng@hbjmdnsm.sdb','$2y$10$k7DoFTuNfe40.jhxcpIRuO55RyJrUQuDBI8I4It/NSAfXrsH6CDNW'),(16,'amanda','bambi@bambi.com','$2y$10$gSCpgnnVSB8Sm6W5pQD5EeCh1AmwMpKSk/lFgoXM6Hdg0IQck8QKu'),(26,'amnmghjhg','amandaisabel237@gmail.com','$2y$10$FSiXOWkMC4d0O9tK39ka7.dc5G0u/VYIlDMrtonvufadk36iA0SDK'),(27,'guito','guito@guito.com','$2y$10$pT9rOf34fmHZdsxAjXWAueWCLYf.cfgpmIFp2amHadYgmPFJ2CCU6'),(28,'gitoo','gitoo@gitoo.com','$2y$10$rz3AhFiKQCw1ID5fHIHZR.Au8ng3O.z8D85R6D9U3QBKazwMO5L3q');
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

-- Dump completed on 2017-12-11 12:05:42

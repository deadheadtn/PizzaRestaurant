-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: projet
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Current Database: `projet`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `projet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `projet`;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_COMMANDE_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ligne_commande` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_produit`),
  KEY `FK_PRODUITSS` (`id_produit`),
  CONSTRAINT `FK_COMMANDE` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  CONSTRAINT `FK_PRODUITSS` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne_commande`
--

LOCK TABLES `ligne_commande` WRITE;
/*!40000 ALTER TABLE `ligne_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligne_commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (41,55,12,1),(42,56,12,1),(43,57,12,1),(44,58,63,1),(45,59,42,1),(46,59,22,1),(47,60,63,1),(48,61,22,1),(49,62,22,1),(50,63,7,1),(51,63,55,1),(52,63,68,1),(53,64,68,1),(54,65,53,1),(55,65,70,2),(56,65,42,2),(57,65,22,5),(58,66,53,1),(59,67,63,1),(60,68,68,1),(61,69,42,2),(62,70,68,1),(63,71,53,1),(64,72,53,2),(65,72,68,1),(66,73,55,1),(67,74,63,1),(68,75,63,1),(69,76,63,1),(70,77,63,1),(71,78,63,1),(72,79,22,1),(73,80,68,1),(74,81,42,2),(75,81,55,1),(76,82,53,1),(77,82,47,2147483647),(78,83,47,1),(79,83,22,1),(80,83,42,1),(81,83,70,1),(82,83,7,2),(83,83,53,2),(84,83,63,1),(85,84,42,2),(86,84,53,1),(87,85,42,1),(88,86,7,1),(89,86,68,1),(90,86,63,1),(91,87,53,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (55,5,5.00,'2017-04-04 06:57:06','2017-04-04 06:57:06','0'),(56,5,5.00,'2017-04-04 07:28:30','2017-04-04 07:28:30','0'),(57,5,5.00,'2017-04-04 07:39:55','2017-04-04 07:39:55','0'),(58,5,2.30,'2017-04-04 08:13:56','2017-04-04 08:13:56','0'),(59,5,7.50,'2017-04-06 13:48:44','2017-04-06 13:48:44','0'),(60,11,2.30,'2017-04-10 18:38:17','2017-04-10 18:38:17','0'),(61,5,3.50,'2017-04-10 21:21:26','2017-04-10 21:21:26','0'),(62,4,3.50,'2017-04-11 17:19:27','2017-04-11 17:19:27','0'),(63,4,9.50,'2017-04-11 17:22:25','2017-04-11 17:22:25','0'),(64,4,2.00,'2017-04-11 18:08:07','2017-04-11 18:08:07','0'),(65,4,45.10,'2017-04-11 18:37:55','2017-04-11 18:37:55','0'),(66,4,1.60,'2017-04-11 18:38:48','2017-04-11 18:38:48','0'),(67,4,2.30,'2017-04-11 18:51:08','2017-04-11 18:51:08','0'),(68,4,2.00,'2017-04-11 18:52:13','2017-04-11 18:52:13','0'),(69,4,8.00,'2017-04-11 18:54:03','2017-04-11 18:54:03','0'),(70,4,2.00,'2017-04-11 18:56:18','2017-04-11 18:56:18','0'),(71,4,1.60,'2017-04-11 18:57:23','2017-04-11 18:57:23','0'),(72,4,5.20,'2017-04-11 19:15:20','2017-04-11 19:15:20','0'),(73,4,2.00,'2017-04-11 19:22:25','2017-04-11 19:22:25','0'),(74,4,2.30,'2017-04-11 19:30:43','2017-04-11 19:30:43','0'),(75,4,2.30,'2017-04-11 19:31:18','2017-04-11 19:31:18','0'),(76,4,2.30,'2017-04-11 19:33:09','2017-04-11 19:33:09','0'),(77,11,2.30,'2017-04-18 11:03:50','2017-04-18 11:03:50','0'),(78,11,2.30,'2017-04-18 11:14:40','2017-04-18 11:14:40','0'),(79,5,3.50,'2017-04-21 08:30:19','2017-04-21 08:30:19','0'),(80,5,2.00,'2017-04-21 10:00:09','2017-04-21 10:00:09','0'),(81,5,10.00,'2017-04-21 10:19:09','2017-04-21 10:19:09','0'),(82,11,100000000.00,'2017-04-21 11:07:19','2017-04-21 11:07:19','1'),(83,11,35.00,'2017-04-25 10:22:57','2017-04-25 10:22:57','1'),(84,11,9.60,'2017-04-25 10:29:41','2017-04-25 10:29:41','1'),(85,11,4.00,'2017-04-25 10:49:41','2017-04-25 10:49:41','1'),(86,11,9.80,'2017-04-25 11:27:50','2017-04-25 11:27:50','1'),(87,5,1.60,'2017-04-28 11:02:27','2017-04-28 11:02:27','1');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (4,'Sandwich Bagel ','ssd','sandwich',0,1.6,'img/produits/sandwich/bagel.jpg','aaaaa'),(7,'pizza 4 fromaggi','#33jj','pizza',0,5.5,'img/produits/pizza/pizza4fromaggi.jpg','pizza au fromage'),(22,'pizza margherita','#63opv','pizza',0,3.5,'img/produits/pizza/pizzamargherita.jpg','pizza sans thon'),(25,'Angus burger','cvb','hamburger',0,3.5,'img/produits/hamburger/angus.jpg','aaaaa'),(27,'Buffalo Burger','hytt','hamburger',0,4,'img/produits/hamburger/buffalo.jpg','nbnv'),(42,'pizza neptune','#35e32','pizza',0,4,'img/produits/pizza/pizzaneptune.jpg','pizza au thon'),(47,'50_50 Burger','gggf','hamburger',0,2,'img/produits/hamburger/50_50.jpg','ffff'),(53,'Cheese Burger ','iiik','hamburger',0,1.6,'img/produits/sandwich/chili.jpg','eeee'),(55,'Sandwich Bologna','ooo','sandwich',0,2,'img/produits/sandwich/bologna.jpg','ffff'),(63,'Chicken Sandwich ','std','sandwich',0,2.3,'img/produits/sandwich/chicken.jpg','afda'),(68,'Chili Sandwich','ooo','sandwich',0,2,'img/produits/sandwich/chili.jpg','bbvc'),(70,'pizza 4 saison','azdazd','pizza',0,9,'img/produits/pizza/pizza4saison.jpg','azdazd');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotion` (
  `id_prom` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `pourcentage_prom` int(11) NOT NULL,
  PRIMARY KEY (`id_prom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_reclamation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamation`
--

LOCK TABLES `reclamation` WRITE;
/*!40000 ALTER TABLE `reclamation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reclamation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIN` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_tel` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbr_point` int(255) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` int(11) DEFAULT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'saif','oueslati','homme','25/08/1994','Bizerte','11375497','25115383',0,'','email.gmail.com',0,'saif','hahiho'),(5,'Bacem','Ben Achour','Inconnu','10/10/1994','Rades','11223344','58445698',0,'','test@test.com',0,'Bacem','aresguerre'),(6,'adazd','azdazd',NULL,NULL,NULL,NULL,NULL,0,NULL,'test@taest.com',NULL,'test@taest.com','aaaaaaaaaa'),(7,'adazd','azdazd',NULL,NULL,NULL,NULL,NULL,0,NULL,'test@taest.coma',NULL,'test@taest.coma','aaaaaaaaaa'),(8,'adazd','azdazd',NULL,NULL,NULL,NULL,NULL,0,NULL,'test@taesta.coma',NULL,'test@taesta.coma','aaaa'),(9,'khechine','nejm',NULL,NULL,NULL,NULL,NULL,0,NULL,'nejm@en.com',NULL,'nejm@en.com','123456'),(10,'Nejmeddine','Khechine',NULL,NULL,NULL,NULL,NULL,0,NULL,'nejmeddine.khechine@gmail.com',NULL,'nejmeddine.khechine@gmail.com','123456'),(11,'admin','admin',NULL,NULL,NULL,NULL,NULL,0,NULL,'admin',NULL,'admin','123456');
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

-- Dump completed on 2017-04-30 17:12:45

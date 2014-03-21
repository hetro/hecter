CREATE DATABASE  IF NOT EXISTS `thesis-b` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `thesis-b`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: thesis-b
-- ------------------------------------------------------
-- Server version	5.5.23

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
-- Table structure for table `certificateofcover`
--

DROP TABLE IF EXISTS `certificateofcover`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificateofcover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessandprofession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificateofcover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateissued` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `officialreceipt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeofbody` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bltfilenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `platenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chassisnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motornumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorizedcapacity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `startofinsurance` datetime NOT NULL,
  `endofinsurance` datetime NOT NULL,
  `unladenweight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificateofcover`
--

LOCK TABLES `certificateofcover` WRITE;
/*!40000 ALTER TABLE `certificateofcover` DISABLE KEYS */;
INSERT INTO `certificateofcover` VALUES (1,'A301293','X182DHS','3192390','1201283','Jethro Laviste','','Internet Shop / Web Developer','123818','2014-02-04','12312312','2007','Honda','Motorcycle','Blue','123123','56345','23461','444','300','2014-02-06 00:15:04','2014-02-06 01:00:00','2015-02-06 00:00:00',NULL),(2,'A301293','X182DHS','3192390','1201283','Jethro Laviste','43 Jupiter St','Internet Shop / Web Developer','123818','2014-02-04','12312312','2007','Honda','Motorcycle','Blue','123123','56345','23461','444','300','2014-02-06 00:15:23','2014-02-06 01:00:00','2015-02-06 00:00:00',NULL),(3,'A301293','X182DHS','3192390','1201283','Jethro Laviste','','Internet Shop / Web Developer','123818','2014-02-05','12312312','2007','Honda','Motorcycle','Blue','123123','56345','23461','444','300','2014-02-06 01:24:29','2014-02-06 01:00:00','2015-02-06 00:00:00',NULL);
/*!40000 ALTER TABLE `certificateofcover` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claimbodilyinjuries`
--

DROP TABLE IF EXISTS `claimbodilyinjuries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claimbodilyinjuries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policy_id` int(11) DEFAULT NULL,
  `professional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicesrendered` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reimbursablefee` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4F498E792D29E3C6` (`policy_id`),
  CONSTRAINT `FK_4F498E792D29E3C6` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claimbodilyinjuries`
--

LOCK TABLES `claimbodilyinjuries` WRITE;
/*!40000 ALTER TABLE `claimbodilyinjuries` DISABLE KEYS */;
INSERT INTO `claimbodilyinjuries` VALUES (1,1,'Hospital Rooms','Medium Operation',400.00),(2,1,'Surgical Expenses','Major Operation',1300.00),(3,1,'Surgical Expenses','Minor Operation',123.00);
/*!40000 ALTER TABLE `claimbodilyinjuries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claimdisablement`
--

DROP TABLE IF EXISTS `claimdisablement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claimdisablement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policy_id` int(11) DEFAULT NULL,
  `loss` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D4AB67D42D29E3C6` (`policy_id`),
  CONSTRAINT `FK_D4AB67D42D29E3C6` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claimdisablement`
--

LOCK TABLES `claimdisablement` WRITE;
/*!40000 ALTER TABLE `claimdisablement` DISABLE KEYS */;
INSERT INTO `claimdisablement` VALUES (2,1,'Both Feet',5000.00),(3,1,'Leg at/or above knee',3000.00),(4,1,'Index Finger',30000.00);
/*!40000 ALTER TABLE `claimdisablement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policy`
--

DROP TABLE IF EXISTS `policy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessandprofession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificateofcover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateissued` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `officialreceipt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeofbody` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bltfilenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `platenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chassisnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motornumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unladenweight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorizedcapacity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `startofinsurance` datetime NOT NULL,
  `endofinsurance` datetime NOT NULL,
  `premiumpaid` decimal(10,2) NOT NULL,
  `authenticationfee` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `stamps` decimal(10,2) NOT NULL,
  `lgt` decimal(10,2) NOT NULL,
  `totalamountdue` decimal(10,2) NOT NULL,
  `claimstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policy`
--

LOCK TABLES `policy` WRITE;
/*!40000 ALTER TABLE `policy` DISABLE KEYS */;
INSERT INTO `policy` VALUES (1,'MC-00178758','87229','019283','83746','John Doe','Jethro Internet Cafe, Albas Bldg Washington Dr. Legazpi City, Philippines','Programmer','827361','2014-02-06','8192039','2008','Honda','Motorcycles/Tricycles/Trailers','Black','728391','908293','828018','983831','500','300','2014-03-04 05:37:20','2014-02-06 02:00:00','2015-02-06 02:00:00',199.60,90.00,23.95,23.95,1.50,339.00,'Claimed'),(3,'182913','87229','019283','2313A','Jethro F Laviste','Alba Bldg. Washington Drive','Web Developer','1A3HS','2014-02-12','8192039','2013','Kawasaki','Motorcycles/Tricycles/Trailers','Blue','728391','908293','828018','983831','500','300','2014-02-25 14:49:25','2014-02-06 03:00:00','2015-02-06 03:00:00',250.00,65.40,30.00,30.00,1.88,377.28,NULL),(4,'1829132','87229','019283','83746','Jethro F Laviste','Alba Bldg. Washington Drive','Programmer','827361','2014-02-21','8192039','2007','Honda','CV Light/Medium Trucks (own goods) not over 3930 kgs.','Blue','728391','908293','828018','983831','500','Legazpi City','2014-02-21 15:44:33','2014-02-21 15:00:00','2014-02-21 16:00:00',555.00,65.40,66.60,66.60,4.16,757.76,NULL),(5,'182913A','87229','019283','83746','Jethro F Laviste','Jethro Internet Cafe, Albas Bldg Washington Dr.','Programmer','827361','2014-02-26','8192039','2008','Kawasaki','AC & Tourist Cars','Blue','728391','908293','828018','983831','500','Legazpi City','2014-02-21 15:50:18','2014-02-21 15:00:00','2014-02-21 16:00:00',590.82,65.40,70.90,70.90,4.43,802.45,NULL),(6,'MC 5089135','87229','019283','MC 5089135','Jethro F Laviste','Alba Bldg. Washington Drive','Programmer','827361','2014-02-21','8192039','2010','Kawasaki','Motorcycles/Tricycles/Trailers','Blue','728391','908293','828018','983831','500','Legazpi City','2014-02-27 15:29:18','2014-02-21 15:00:00','2014-02-28 16:00:00',3000.00,65.40,360.00,360.00,22.50,3807.90,NULL),(7,'MC-0027875',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-25 16:46:33','2014-02-25 16:00:00','2014-02-25 19:00:00',250.00,65.40,30.00,30.00,1.88,377.28,NULL),(8,'MC-00178752',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-02-25 16:48:31','2014-02-25 16:00:00','2014-02-25 19:00:00',250.00,65.40,30.00,30.00,1.88,377.28,NULL),(9,'MC-0013333','87229','019283',NULL,'Jethro F Laviste','Washington Dr.','Programmer',NULL,'2014-02-12','ASDASD','2007','Kawasaki','Private Cars (including jeeps & utility vehicles)','Blue','182371','2721','8280123','983831','500','130','2014-02-28 20:09:50','2014-02-28 20:00:00','2014-02-28 21:00:00',447.11,65.40,53.65,53.65,3.35,623.17,NULL),(10,'MC-0017123','87229','019283',NULL,'John Doe','Jethro Internet Cafe, Albas Bldg Washington Dr.','Programmer',NULL,'2014-03-18',NULL,'2008','Hyundai','Private Cars (including jeeps & utility vehicles)','Blue','728391','908293','828018','983831','500','Legazpi City','2014-03-17 04:20:05','2014-03-17 04:00:00','2015-03-17 05:00:00',1447.11,65.40,173.65,173.65,10.85,1870.67,NULL),(11,'MC-00178752','87229','019283',NULL,'John Doe','Jethro Internet Cafe, Albas Bldg Washington Dr.','Programmer',NULL,'2014-02-06',NULL,'2008','Hyundai','CV Light/Medium Trucks (own goods) not over 3930 kgs.','Black','728391','908293','828018','983831','5','Legazpi City','2014-03-17 16:13:03','2014-02-21 15:00:00','2015-02-06 02:00:00',2487.03,65.40,298.44,298.44,18.65,3167.97,NULL),(12,'1829132','87229','019283',NULL,'John Doe','Jethro Internet Cafe, Albas Bldg Washington Dr.','Programmer',NULL,'2014-02-06',NULL,'2008','Volkswagen','Private Cars (including jeeps & utility vehicles)','Blue','728391','908293','828018','983831','33','Legazpi City','2014-03-17 16:14:00','2014-03-20 16:13:00','2015-02-06 03:00:00',1447.11,65.40,173.65,173.65,10.85,1870.67,NULL),(13,'cvvv','87229','019283',NULL,'John Doe','Jethro Internet Cafe, Albas Bldg Washington Dr.','Programmer',NULL,'2014-02-12',NULL,'2007','Hyundai','CV Light/Medium Trucks (own goods) not over 3930 kgs.','Black','728391','908293','828018','12312','33','Legazpi City','2014-03-19 16:17:48','2014-03-19 17:00:00','2015-03-19 17:00:00',2487.03,65.50,298.44,298.44,18.65,3168.07,NULL);
/*!40000 ALTER TABLE `policy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Private Cars (including jeeps & utility vehicles)','1447.11'),(2,'CV Light/Medium Trucks (own goods) not over 3930 kgs.','2487.03'),(3,'Heavy Trucks (own goods) & Private Buses over 3930 kgs.','3958.08'),(4,'AC & Tourist Cars','4590.82'),(5,'Taxi, PUJ & Mini Bus','5878.24'),(6,'PUB & Tourist Bus','61157.69'),(7,'Motorcycles/Tricycles/Trailers','7199.6'),(9,'Authentication Fee','65.50');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,'jet_lav@yahoo.com','Jethro Laviste','$2y$14$esdf87PHppgRt8fHtERRpuryFRefEe0RNG..w3OFz4uTdCo0E5aH2',NULL),(2,NULL,'gm-jethro@jeth-ro.com',NULL,'$2y$14$mYtbJrfSsKJxX1zihtv6IORVLq/J2A6LXREPfDYirG9XNYIguXQ3W',NULL),(3,NULL,'Custodian@jeth-ro.com',NULL,'$2y$14$ZzV0CKlIHGdZFX8URNaJOuu3Ys0mRYJSOB7eg7kgZYgoM2XTUTyJy',NULL),(4,NULL,'jethro4254@jeth-ro.com',NULL,'$2y$14$2/NZgJxCKY6UnOEQaHrf5OgTUImJVTZw5Cyqrhoz0BCi.xw8FNnIO',NULL),(5,NULL,'jet_lav2@yahoo.com',NULL,'$2y$14$5iRdhXIQ6e7wjanBBax5mOe1eRufWhpaVQAgJQtOF/6glw.Wtafk.',NULL),(6,NULL,'jet_lav3@yahoo.com',NULL,'$2y$14$8NxAjo3f3reb.Mt.BgdLAezv4CqlcHkJFnzrK.hD7aOHcMzBamcU.',NULL),(7,NULL,'test@yahoo.com',NULL,'$2y$14$SO9RNEAyVb0yB3FXnmQkWOcJoc7NtkY6xFb06MWfUuJHD6AwkVfAG',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_role` (`role_id`),
  KEY `idx_parent_id` (`parent_id`),
  CONSTRAINT `fk_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'user',1,NULL),(2,'moderator',2,NULL),(3,'admin',3,NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_linker`
--

DROP TABLE IF EXISTS `user_role_linker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role_linker` (
  `user_id` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `idx_role_id` (`role_id`),
  KEY `idx_user_id` (`user_id`),
  CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_linker`
--

LOCK TABLES `user_role_linker` WRITE;
/*!40000 ALTER TABLE `user_role_linker` DISABLE KEYS */;
INSERT INTO `user_role_linker` VALUES (2,1),(4,1),(6,1),(7,1),(3,2),(1,3);
/*!40000 ALTER TABLE `user_role_linker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-21 15:38:42

-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project2
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(45) DEFAULT NULL,
  `wachtwoord` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `idadmin_UNIQUE` (`idadmin`),
  UNIQUE KEY `gebruikersnaam_UNIQUE` (`gebruikersnaam`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `alleinformatie`
--

DROP TABLE IF EXISTS `alleinformatie`;
/*!50001 DROP VIEW IF EXISTS `alleinformatie`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `alleinformatie` AS SELECT 
 1 AS `naameve`,
 1 AS `dagen`,
 1 AS `aantal`,
 1 AS `naamger`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evenementen`
--

DROP TABLE IF EXISTS `evenementen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenementen` (
  `idevenementen` int(11) NOT NULL AUTO_INCREMENT,
  `naameve` varchar(45) NOT NULL,
  `dagen` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  PRIMARY KEY (`idevenementen`),
  UNIQUE KEY `idevenementen_UNIQUE` (`idevenementen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenementen`
--

LOCK TABLES `evenementen` WRITE;
/*!40000 ALTER TABLE `evenementen` DISABLE KEYS */;
INSERT INTO `evenementen` VALUES (1,'picknick',1,4),(2,'lunchtime',2,10),(3,'desert',2,5);
/*!40000 ALTER TABLE `evenementen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerecht`
--

DROP TABLE IF EXISTS `gerecht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerecht` (
  `idgerecht` int(11) NOT NULL AUTO_INCREMENT,
  `naamger` varchar(45) NOT NULL,
  PRIMARY KEY (`idgerecht`),
  UNIQUE KEY `idgerecht_UNIQUE` (`idgerecht`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerecht`
--

LOCK TABLES `gerecht` WRITE;
/*!40000 ALTER TABLE `gerecht` DISABLE KEYS */;
INSERT INTO `gerecht` VALUES (1,'pannekoeken'),(2,'spaghetti'),(3,'lasagne'),(4,'brownie'),(5,'croque monsieur'),(6,'pudding');
/*!40000 ALTER TABLE `gerecht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerechtevenement`
--

DROP TABLE IF EXISTS `gerechtevenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerechtevenement` (
  `idGerechtevenement` int(11) NOT NULL AUTO_INCREMENT,
  `idevenementen` int(11) NOT NULL,
  `idgerecht` int(11) NOT NULL,
  PRIMARY KEY (`idGerechtevenement`),
  UNIQUE KEY `idGerechtevenement_UNIQUE` (`idGerechtevenement`),
  KEY `eve_idx` (`idevenementen`),
  KEY `ger_idx` (`idgerecht`),
  CONSTRAINT `eve` FOREIGN KEY (`idevenementen`) REFERENCES `evenementen` (`idevenementen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ger` FOREIGN KEY (`idgerecht`) REFERENCES `gerecht` (`idgerecht`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerechtevenement`
--

LOCK TABLES `gerechtevenement` WRITE;
/*!40000 ALTER TABLE `gerechtevenement` DISABLE KEYS */;
INSERT INTO `gerechtevenement` VALUES (1,2,2),(2,2,3),(3,3,1),(4,3,4),(5,1,5),(6,1,6);
/*!40000 ALTER TABLE `gerechtevenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerechtproduct`
--

DROP TABLE IF EXISTS `gerechtproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerechtproduct` (
  `idgerechtproduct` int(11) NOT NULL AUTO_INCREMENT,
  `idgerecht` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `Eenheid` varchar(45) NOT NULL,
  PRIMARY KEY (`idgerechtproduct`),
  UNIQUE KEY `idgerechtproduct_UNIQUE` (`idgerechtproduct`),
  KEY `gerechten_idx` (`idgerecht`),
  KEY `producten_idx` (`idproduct`),
  CONSTRAINT `gerechten` FOREIGN KEY (`idgerecht`) REFERENCES `gerecht` (`idgerecht`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producten` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerechtproduct`
--

LOCK TABLES `gerechtproduct` WRITE;
/*!40000 ALTER TABLE `gerechtproduct` DISABLE KEYS */;
INSERT INTO `gerechtproduct` VALUES (1,1,4,2,'KG'),(2,1,4,3,'L'),(3,2,4,3,'L'),(4,3,4,2,'L');
/*!40000 ALTER TABLE `gerechtproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `prodger`
--

DROP TABLE IF EXISTS `prodger`;
/*!50001 DROP VIEW IF EXISTS `prodger`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `prodger` AS SELECT 
 1 AS `idproduct`,
 1 AS `idgerecht`,
 1 AS `naamprod`,
 1 AS `naamger`,
 1 AS `hoeveelheid`,
 1 AS `eenheid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `naamprod` varchar(45) NOT NULL,
  `aantal` int(11) NOT NULL,
  `idwinkel` int(11) NOT NULL,
  PRIMARY KEY (`idproduct`),
  UNIQUE KEY `idproduct_UNIQUE` (`idproduct`),
  KEY `winkel_idx` (`idwinkel`),
  CONSTRAINT `winkel` FOREIGN KEY (`idwinkel`) REFERENCES `winkel` (`idwinkel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'suiker',1,3),(2,'melk',2,4),(3,'tomatensaus',5,2),(4,'suiker',3,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `winkel`
--

DROP TABLE IF EXISTS `winkel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `winkel` (
  `idwinkel` int(11) NOT NULL AUTO_INCREMENT,
  `naamwink` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idwinkel`),
  UNIQUE KEY `idwinkel_UNIQUE` (`idwinkel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `winkel`
--

LOCK TABLES `winkel` WRITE;
/*!40000 ALTER TABLE `winkel` DISABLE KEYS */;
INSERT INTO `winkel` VALUES (1,'aldi'),(2,'lidl'),(3,'Delhaize'),(4,'colruyt');
/*!40000 ALTER TABLE `winkel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `alleinformatie`
--

/*!50001 DROP VIEW IF EXISTS `alleinformatie`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `alleinformatie` AS select `evenementen`.`naameve` AS `naameve`,`evenementen`.`dagen` AS `dagen`,`evenementen`.`aantal` AS `aantal`,`gerecht`.`naamger` AS `naamger` from ((`evenementen` join `gerechtevenement` on((`gerechtevenement`.`idevenementen` = `evenementen`.`idevenementen`))) join `gerecht` on((`gerecht`.`idgerecht` = `gerechtevenement`.`idgerecht`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `prodger`
--

/*!50001 DROP VIEW IF EXISTS `prodger`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `prodger` AS select `product`.`idproduct` AS `idproduct`,`gerecht`.`idgerecht` AS `idgerecht`,`product`.`naamprod` AS `naamprod`,`gerecht`.`naamger` AS `naamger`,`gerechtproduct`.`hoeveelheid` AS `hoeveelheid`,`gerechtproduct`.`Eenheid` AS `eenheid` from ((`gerechtproduct` join `gerecht` on((`gerecht`.`idgerecht` = `gerechtproduct`.`idgerecht`))) join `product` on((`product`.`idproduct` = `gerechtproduct`.`idproduct`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-18 21:43:06

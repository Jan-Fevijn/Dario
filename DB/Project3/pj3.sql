-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project3
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
-- Temporary view structure for view `aankopen`
--

DROP TABLE IF EXISTS `aankopen`;
/*!50001 DROP VIEW IF EXISTS `aankopen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `aankopen` AS SELECT 
 1 AS `typebrood`,
 1 AS `prijs`,
 1 AS `datum`,
 1 AS `naam`,
 1 AS `voornaam`,
 1 AS `idklant`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `automaat`
--

DROP TABLE IF EXISTS `automaat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `automaat` (
  `idAutomaat` int(11) NOT NULL AUTO_INCREMENT,
  `locatie` int(11) NOT NULL,
  `brood` int(11) NOT NULL,
  `aantal` int(11) NOT NULL DEFAULT '0',
  `datum` date DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idAutomaat`),
  KEY `automaat_brood` (`brood`),
  CONSTRAINT `automaat_brood` FOREIGN KEY (`brood`) REFERENCES `brood` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automaat`
--

LOCK TABLES `automaat` WRITE;
/*!40000 ALTER TABLE `automaat` DISABLE KEYS */;
INSERT INTO `automaat` VALUES (7,1,2,3,'2020-04-22',3.50),(8,2,5,2,'2020-04-22',4.00),(9,3,4,4,'2020-04-22',5.00),(10,4,1,1,'2020-04-22',2.00),(11,5,3,1,'2020-04-22',3.00),(12,6,6,3,'2020-04-22',4.00);
/*!40000 ALTER TABLE `automaat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brood`
--

DROP TABLE IF EXISTS `brood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeBrood` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brood`
--

LOCK TABLES `brood` WRITE;
/*!40000 ALTER TABLE `brood` DISABLE KEYS */;
INSERT INTO `brood` VALUES (1,'bus melkwit'),(2,'bus wit'),(3,'bus tarwe'),(4,'boeren tarwe'),(5,'boeren tijger tarwe'),(6,'boeren mout');
/*!40000 ALTER TABLE `brood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klant` (
  `idKlant` int(11) NOT NULL AUTO_INCREMENT,
  `klantcode` varchar(10) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `balans` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idKlant`),
  UNIQUE KEY `klantcode` (`klantcode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klant`
--

LOCK TABLES `klant` WRITE;
/*!40000 ALTER TABLE `klant` DISABLE KEYS */;
INSERT INTO `klant` VALUES (1,'1234','Decuypere','Dario',10.00),(2,'5678','Paudel','Rubin',12.00);
/*!40000 ALTER TABLE `klant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactie`
--

DROP TABLE IF EXISTS `transactie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactie` (
  `idTransactie` int(11) NOT NULL AUTO_INCREMENT,
  `idAutomaat` int(11) NOT NULL,
  `idKlant` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  PRIMARY KEY (`idTransactie`),
  KEY `transactie_auto` (`idAutomaat`),
  KEY `transactie_klant` (`idKlant`),
  CONSTRAINT `transactie_auto` FOREIGN KEY (`idAutomaat`) REFERENCES `automaat` (`idAutomaat`),
  CONSTRAINT `transactie_klant` FOREIGN KEY (`idKlant`) REFERENCES `klant` (`idKlant`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactie`
--

LOCK TABLES `transactie` WRITE;
/*!40000 ALTER TABLE `transactie` DISABLE KEYS */;
INSERT INTO `transactie` VALUES (1,9,2,'2020-04-22'),(2,7,1,'2020-04-22'),(3,12,1,'2020-04-22');
/*!40000 ALTER TABLE `transactie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `aankopen`
--

/*!50001 DROP VIEW IF EXISTS `aankopen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `aankopen` AS select `brood`.`typeBrood` AS `typebrood`,`automaat`.`prijs` AS `prijs`,`transactie`.`datum` AS `datum`,`klant`.`naam` AS `naam`,`klant`.`voornaam` AS `voornaam`,`klant`.`idKlant` AS `idklant` from (((`transactie` join `automaat` on((`automaat`.`idAutomaat` = `transactie`.`idAutomaat`))) join `brood` on((`brood`.`id` = `automaat`.`brood`))) join `klant` on((`klant`.`idKlant` = `transactie`.`idKlant`))) */;
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

-- Dump completed on 2020-04-22 21:40:49

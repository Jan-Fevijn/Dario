-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: spelletjes
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
-- Temporary view structure for view `infogame`
--

DROP TABLE IF EXISTS `infogame`;
/*!50001 DROP VIEW IF EXISTS `infogame`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `infogame` AS SELECT 
 1 AS `spel`,
 1 AS `naam`,
 1 AS `aankoopdatum`,
 1 AS `genre`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `infospellen`
--

DROP TABLE IF EXISTS `infospellen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infospellen` (
  `idinfospellen` int(11) NOT NULL AUTO_INCREMENT,
  `spel` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`idinfospellen`),
  UNIQUE KEY `idinfospellen_UNIQUE` (`idinfospellen`),
  KEY `spellen_idx` (`spel`),
  KEY `types_idx` (`type`),
  CONSTRAINT `spellen` FOREIGN KEY (`spel`) REFERENCES `spellen` (`idspellen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `types` FOREIGN KEY (`type`) REFERENCES `type` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infospellen`
--

LOCK TABLES `infospellen` WRITE;
/*!40000 ALTER TABLE `infospellen` DISABLE KEYS */;
INSERT INTO `infospellen` VALUES (1,1,3),(2,2,1),(3,3,2);
/*!40000 ALTER TABLE `infospellen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persoon`
--

DROP TABLE IF EXISTS `persoon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persoon` (
  `idpersoon` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `telefoonnummer` varchar(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `wachtwoord` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpersoon`),
  UNIQUE KEY `idpersoon_UNIQUE` (`idpersoon`),
  UNIQUE KEY `tele_UQ` (`telefoonnummer`),
  UNIQUE KEY `naam_VN_UQ` (`naam`,`voornaam`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persoon`
--

LOCK TABLES `persoon` WRITE;
/*!40000 ALTER TABLE `persoon` DISABLE KEYS */;
INSERT INTO `persoon` VALUES (1,'desmaele','arnaud','32497317895','arnauddesmaele@atheneumjanfevijn.be','test'),(2,'wintein','lorenzo','32497456879','lorenzowintein@atheneumjanfevijn.be','test'),(3,'paudel','rubin','32485412389','rubinpaudel@atheneumjanfevijn.be','test');
/*!40000 ALTER TABLE `persoon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spellen`
--

DROP TABLE IF EXISTS `spellen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spellen` (
  `idspellen` int(11) NOT NULL AUTO_INCREMENT,
  `spel` varchar(45) NOT NULL,
  `korte inhoud` varchar(200) DEFAULT NULL,
  `aankoopdatum` date NOT NULL,
  `uitgever` int(11) NOT NULL,
  PRIMARY KEY (`idspellen`),
  UNIQUE KEY `idspellen_UNIQUE` (`idspellen`),
  KEY `uit_spel_idx` (`uitgever`),
  CONSTRAINT `uit_spel` FOREIGN KEY (`uitgever`) REFERENCES `uitgever` (`iduitgever`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spellen`
--

LOCK TABLES `spellen` WRITE;
/*!40000 ALTER TABLE `spellen` DISABLE KEYS */;
INSERT INTO `spellen` VALUES (1,'fortnite','blijf als laatste over','2020-05-18',2),(2,'gears of war','vermoord aliens','2020-05-18',3),(3,'call of duty','vermoord','2020-05-18',1),(4,'warzone',NULL,'2020-06-07',1);
/*!40000 ALTER TABLE `spellen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(100) NOT NULL,
  `leeftijd` int(11) NOT NULL,
  PRIMARY KEY (`idtype`),
  UNIQUE KEY `idtype_UNIQUE` (`idtype`),
  UNIQUE KEY `Genre_age_UQ` (`genre`,`leeftijd`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (3,'battle royale',12),(2,'first person shooter',16),(1,'Third person shooter',16);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uitgever`
--

DROP TABLE IF EXISTS `uitgever`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uitgever` (
  `iduitgever` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(75) NOT NULL,
  PRIMARY KEY (`iduitgever`),
  UNIQUE KEY `iduitgever_UNIQUE` (`iduitgever`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uitgever`
--

LOCK TABLES `uitgever` WRITE;
/*!40000 ALTER TABLE `uitgever` DISABLE KEYS */;
INSERT INTO `uitgever` VALUES (1,'activision'),(2,'epic games'),(3,'microsoft');
/*!40000 ALTER TABLE `uitgever` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uitlenen`
--

DROP TABLE IF EXISTS `uitlenen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uitlenen` (
  `iduitlenen` int(11) NOT NULL AUTO_INCREMENT,
  `info` int(11) NOT NULL,
  `persoon` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`iduitlenen`),
  UNIQUE KEY `iduitlenen_UNIQUE` (`iduitlenen`),
  KEY `persoon_idx` (`persoon`),
  KEY `spel_idx` (`info`),
  CONSTRAINT `info` FOREIGN KEY (`info`) REFERENCES `infospellen` (`idinfospellen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `persoon` FOREIGN KEY (`persoon`) REFERENCES `persoon` (`idpersoon`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uitlenen`
--

LOCK TABLES `uitlenen` WRITE;
/*!40000 ALTER TABLE `uitlenen` DISABLE KEYS */;
INSERT INTO `uitlenen` VALUES (1,1,2,'2020-05-18'),(2,2,1,'2020-05-18'),(3,3,3,'2020-05-18');
/*!40000 ALTER TABLE `uitlenen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `infogame`
--

/*!50001 DROP VIEW IF EXISTS `infogame`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `infogame` AS select `spellen`.`spel` AS `spel`,`uitgever`.`naam` AS `naam`,`spellen`.`aankoopdatum` AS `aankoopdatum`,`type`.`genre` AS `genre` from (((`infospellen` join `spellen` on((`spellen`.`idspellen` = `infospellen`.`spel`))) join `uitgever` on((`uitgever`.`iduitgever` = `spellen`.`uitgever`))) join `type` on((`type`.`idtype` = `infospellen`.`type`))) */;
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

-- Dump completed on 2020-06-08 12:48:58

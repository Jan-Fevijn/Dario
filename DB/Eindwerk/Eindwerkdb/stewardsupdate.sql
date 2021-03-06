-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: festivalstewards
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
-- Table structure for table `notificaties`
--

DROP TABLE IF EXISTS `notificaties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificaties` (
  `idnotificaties` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `bericht` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `datum` date NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idnotificaties`),
  UNIQUE KEY `idnotificaties_UNIQUE` (`idnotificaties`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaties`
--

LOCK TABLES `notificaties` WRITE;
/*!40000 ALTER TABLE `notificaties` DISABLE KEYS */;
INSERT INTO `notificaties` VALUES (0,'dario','yo matje','unread','2020-05-03',NULL);
/*!40000 ALTER TABLE `notificaties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plaats`
--

DROP TABLE IF EXISTS `plaats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plaats` (
  `idPlaats` int(11) NOT NULL AUTO_INCREMENT,
  `plaatsnaam` varchar(255) NOT NULL,
  `afkorting` varchar(45) NOT NULL,
  PRIMARY KEY (`idPlaats`),
  UNIQUE KEY `idPlaatsen_UNIQUE` (`idPlaats`),
  UNIQUE KEY `afkorting_UNIQUE` (`afkorting`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plaats`
--

LOCK TABLES `plaats` WRITE;
/*!40000 ALTER TABLE `plaats` DISABLE KEYS */;
INSERT INTO `plaats` VALUES (1,'','th'),(2,'','ph'),(3,'','fbn');
/*!40000 ALTER TABLE `plaats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift` (
  `idshift` int(11) NOT NULL AUTO_INCREMENT,
  `idSteward` int(11) NOT NULL,
  `idPlaats` int(11) NOT NULL,
  `idTijd` int(11) NOT NULL,
  PRIMARY KEY (`idshift`),
  KEY `idSteward_idx` (`idSteward`),
  KEY `idPlaats_idx` (`idPlaats`),
  KEY `idTijd_idx` (`idTijd`),
  CONSTRAINT `idPlaats` FOREIGN KEY (`idPlaats`) REFERENCES `plaats` (`idPlaats`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idSteward` FOREIGN KEY (`idSteward`) REFERENCES `steward` (`idSteward`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idTijd` FOREIGN KEY (`idTijd`) REFERENCES `tijd` (`idTijd`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift`
--

LOCK TABLES `shift` WRITE;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` VALUES (12,11,2,1),(13,13,2,2);
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `steward`
--

DROP TABLE IF EXISTS `steward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `steward` (
  `idSteward` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(45) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  `Telefoonnummer` varchar(20) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wwResetCode` varchar(45) DEFAULT NULL,
  `User_TypeID` int(11) DEFAULT '2',
  PRIMARY KEY (`idSteward`),
  UNIQUE KEY `Telefoonnummer_UNIQUE` (`Telefoonnummer`),
  UNIQUE KEY `Gebruikersnaam_UNIQUE` (`email`),
  UNIQUE KEY `idSteward_UNIQUE` (`idSteward`),
  KEY `user_idx` (`User_TypeID`),
  CONSTRAINT `user` FOREIGN KEY (`User_TypeID`) REFERENCES `usertype` (`idUserType`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `steward`
--

LOCK TABLES `steward` WRITE;
/*!40000 ALTER TABLE `steward` DISABLE KEYS */;
INSERT INTO `steward` VALUES (11,'Dario','Decuypere','2147483647','098f6bcd4621d373cade4e832627b4f6','ddcdecuypere@gmail.com','480618776',2),(13,'Rubin','Paudel','202','098f6bcd4621d373cade4e832627b4f6','test@test.test',NULL,2),(14,'admin','admin','1','21232f297a57a5a743894a0e4a801fc3','admin@admin.admin',NULL,1);
/*!40000 ALTER TABLE `steward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `stewardsinfo`
--

DROP TABLE IF EXISTS `stewardsinfo`;
/*!50001 DROP VIEW IF EXISTS `stewardsinfo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stewardsinfo` AS SELECT 
 1 AS `idSteward`,
 1 AS `Voornaam`,
 1 AS `Naam`,
 1 AS `Tijd`,
 1 AS `Dag`,
 1 AS `afkorting`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tijd`
--

DROP TABLE IF EXISTS `tijd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tijd` (
  `idTijd` int(11) NOT NULL AUTO_INCREMENT,
  `Tijd` varchar(45) NOT NULL,
  `dag` varchar(45) NOT NULL,
  PRIMARY KEY (`idTijd`),
  UNIQUE KEY `idTijden_UNIQUE` (`idTijd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tijd`
--

LOCK TABLES `tijd` WRITE;
/*!40000 ALTER TABLE `tijd` DISABLE KEYS */;
INSERT INTO `tijd` VALUES (1,'13u30','za'),(2,'9u30','zo');
/*!40000 ALTER TABLE `tijd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `idUserType` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) NOT NULL,
  PRIMARY KEY (`idUserType`),
  UNIQUE KEY `idUserType_UNIQUE` (`idUserType`),
  UNIQUE KEY `Naam_UNIQUE` (`Naam`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'admin'),(2,'Gebruiker');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `stewardsinfo`
--

/*!50001 DROP VIEW IF EXISTS `stewardsinfo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stewardsinfo` AS select `steward`.`idSteward` AS `idSteward`,`steward`.`Voornaam` AS `Voornaam`,`steward`.`Naam` AS `Naam`,`tijd`.`Tijd` AS `Tijd`,`tijd`.`dag` AS `Dag`,`plaats`.`afkorting` AS `afkorting` from (((`shift` join `tijd` on((`tijd`.`idTijd` = `shift`.`idTijd`))) join `plaats` on((`plaats`.`idPlaats` = `shift`.`idPlaats`))) join `steward` on((`steward`.`idSteward` = `shift`.`idSteward`))) */;
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

-- Dump completed on 2020-05-06 15:15:44

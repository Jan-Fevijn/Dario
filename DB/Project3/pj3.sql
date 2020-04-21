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
-- Table structure for table `brood`
--

DROP TABLE IF EXISTS `brood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brood` (
  `idBrood` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`idBrood`),
  UNIQUE KEY `idBrood_UNIQUE` (`idBrood`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brood`
--

LOCK TABLES `brood` WRITE;
/*!40000 ALTER TABLE `brood` DISABLE KEYS */;
/*!40000 ALTER TABLE `brood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klant` (
  `idklant` int(11) NOT NULL AUTO_INCREMENT,
  `klantcode` int(11) NOT NULL,
  `balans` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idklant`),
  UNIQUE KEY `idklant_UNIQUE` (`idklant`),
  UNIQUE KEY `klantcode_UNIQUE` (`klantcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klant`
--

LOCK TABLES `klant` WRITE;
/*!40000 ALTER TABLE `klant` DISABLE KEYS */;
/*!40000 ALTER TABLE `klant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactie`
--

DROP TABLE IF EXISTS `transactie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactie` (
  `idtransactie` int(11) NOT NULL AUTO_INCREMENT,
  `idBrood` int(11) NOT NULL,
  `idKlanten` int(11) NOT NULL,
  `Prijs` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idtransactie`),
  UNIQUE KEY `idtransactie_UNIQUE` (`idtransactie`),
  KEY `brood_idx` (`idBrood`),
  KEY `klant_idx` (`idKlanten`),
  CONSTRAINT `brood` FOREIGN KEY (`idBrood`) REFERENCES `brood` (`idBrood`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `klant` FOREIGN KEY (`idKlanten`) REFERENCES `klant` (`idklant`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactie`
--

LOCK TABLES `transactie` WRITE;
/*!40000 ALTER TABLE `transactie` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-21 13:46:58

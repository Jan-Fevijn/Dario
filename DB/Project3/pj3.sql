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
-- Table structure for table `broodpositiedatum`
--

DROP TABLE IF EXISTS `broodpositiedatum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `broodpositiedatum` (
  `idbroodpositieDatum` int(11) NOT NULL AUTO_INCREMENT,
  `idbrood` int(11) NOT NULL,
  `positie` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `aantalIn` int(11) NOT NULL,
  `kostprijs` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idbroodpositieDatum`),
  KEY `FKBestaandBrood` (`idbrood`),
  CONSTRAINT `FKBestaandBrood` FOREIGN KEY (`idbrood`) REFERENCES `broodtype` (`idbroodtype`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broodpositiedatum`
--

LOCK TABLES `broodpositiedatum` WRITE;
/*!40000 ALTER TABLE `broodpositiedatum` DISABLE KEYS */;
INSERT INTO `broodpositiedatum` VALUES (1,1,1,'2020-04-15',5,2.20),(2,2,2,'2020-04-20',8,1.30),(3,4,3,'2020-04-19',8,1.30),(4,3,4,'2020-04-10',2,2.00),(5,5,5,'2020-04-05',3,1.50),(6,6,6,'2020-04-13',7,1.75);
/*!40000 ALTER TABLE `broodpositiedatum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `broodtype`
--

DROP TABLE IF EXISTS `broodtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `broodtype` (
  `idbroodtype` int(11) NOT NULL AUTO_INCREMENT,
  `broodnaam` varchar(45) NOT NULL,
  PRIMARY KEY (`idbroodtype`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broodtype`
--

LOCK TABLES `broodtype` WRITE;
/*!40000 ALTER TABLE `broodtype` DISABLE KEYS */;
INSERT INTO `broodtype` VALUES (1,'bus melkwit'),(2,'bus wit'),(3,'bus tarwe'),(4,'boeren tijger wit'),(5,'boeren mout'),(6,'boeren tarwe');
/*!40000 ALTER TABLE `broodtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klant` (
  `idklant` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`idklant`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klant`
--

LOCK TABLES `klant` WRITE;
/*!40000 ALTER TABLE `klant` DISABLE KEYS */;
INSERT INTO `klant` VALUES (1,'Dario',1234),(2,'Rubin',5678);
/*!40000 ALTER TABLE `klant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saldo`
--

DROP TABLE IF EXISTS `saldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saldo` (
  `idsaldo` int(11) NOT NULL AUTO_INCREMENT,
  `idklant` int(11) NOT NULL,
  `saldo` decimal(8,2) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `broodpositiedatum` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsaldo`),
  KEY `FKklantsaldo` (`idklant`),
  KEY `FKaankoop` (`broodpositiedatum`),
  CONSTRAINT `FKaankoop` FOREIGN KEY (`broodpositiedatum`) REFERENCES `broodpositiedatum` (`idbroodpositieDatum`),
  CONSTRAINT `FKklantsaldo` FOREIGN KEY (`idklant`) REFERENCES `klant` (`idklant`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saldo`
--

LOCK TABLES `saldo` WRITE;
/*!40000 ALTER TABLE `saldo` DISABLE KEYS */;
INSERT INTO `saldo` VALUES (1,1,10.00,'2020-04-21',6),(2,2,20.00,'2020-04-21',2),(3,2,20.00,'2020-04-18',1);
/*!40000 ALTER TABLE `saldo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 19:49:23

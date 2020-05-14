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
-- Table structure for table `infospellen`
--

DROP TABLE IF EXISTS `infospellen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infospellen` (
  `idinfospellen` int(11) NOT NULL AUTO_INCREMENT,
  `spel` int(11) NOT NULL,
  `uitgever` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`idinfospellen`),
  UNIQUE KEY `idinfospellen_UNIQUE` (`idinfospellen`),
  KEY `spellen_idx` (`spel`),
  KEY `types_idx` (`type`),
  KEY `uitgevers_idx` (`uitgever`),
  CONSTRAINT `spellen` FOREIGN KEY (`spel`) REFERENCES `spellen` (`idspellen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `uitgevers` FOREIGN KEY (`uitgever`) REFERENCES `uitgever` (`iduitgever`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `types` FOREIGN KEY (`type`) REFERENCES `type` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infospellen`
--

LOCK TABLES `infospellen` WRITE;
/*!40000 ALTER TABLE `infospellen` DISABLE KEYS */;
INSERT INTO `infospellen` VALUES (1,3,3,1),(2,1,1,2),(3,2,2,3);
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
  PRIMARY KEY (`idpersoon`),
  UNIQUE KEY `idpersoon_UNIQUE` (`idpersoon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persoon`
--

LOCK TABLES `persoon` WRITE;
/*!40000 ALTER TABLE `persoon` DISABLE KEYS */;
INSERT INTO `persoon` VALUES (1,'desmaele','arnaud','32497317895'),(2,'wintein','lorenzo','32497456879'),(3,'paudel','rubin','32485412389');
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
  `naam` varchar(45) NOT NULL,
  `korte inhoud` varchar(200) DEFAULT NULL,
  `aankoopdatum` date NOT NULL,
  PRIMARY KEY (`idspellen`),
  UNIQUE KEY `idspellen_UNIQUE` (`idspellen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spellen`
--

LOCK TABLES `spellen` WRITE;
/*!40000 ALTER TABLE `spellen` DISABLE KEYS */;
INSERT INTO `spellen` VALUES (1,'call of duty','schieten op andere mensen','2019-07-21'),(2,'fortnite','overleven tot je de laatste bent','2019-03-10'),(3,'Gears of war','buitenaardse wezens vermoorden','2016-04-17');
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
  UNIQUE KEY `idtype_UNIQUE` (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'third person shooter',16),(2,'first person shooter',16),(3,'battle royale',12);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uitlenen`
--

LOCK TABLES `uitlenen` WRITE;
/*!40000 ALTER TABLE `uitlenen` DISABLE KEYS */;
INSERT INTO `uitlenen` VALUES (5,1,2,'2020-05-14'),(6,2,3,'2020-05-14'),(7,3,1,'2020-05-14');
/*!40000 ALTER TABLE `uitlenen` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14 10:41:17

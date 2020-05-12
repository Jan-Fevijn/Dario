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
  `maker` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
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
INSERT INTO `spellen` VALUES (1,'call of duty','activision','first person shooter','schieten op andere mensen','2019-07-21'),(2,'fortnite','epic games','battle royale','overleven tot je de laatste bent','2019-03-10'),(3,'Gears of war','	Microsoft Game Studios','third persin shooter','buitenaardse wezens vermoorden','2016-04-17');
/*!40000 ALTER TABLE `spellen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uitlenen`
--

DROP TABLE IF EXISTS `uitlenen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uitlenen` (
  `iduitlenen` int(11) NOT NULL AUTO_INCREMENT,
  `spel` int(11) NOT NULL,
  `persoon` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`iduitlenen`),
  UNIQUE KEY `iduitlenen_UNIQUE` (`iduitlenen`),
  KEY `persoon_idx` (`persoon`),
  KEY `spel_idx` (`spel`),
  KEY `persoon_spel` (`spel`,`persoon`),
  CONSTRAINT `spel` FOREIGN KEY (`spel`) REFERENCES `spellen` (`idspellen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `persoon` FOREIGN KEY (`persoon`) REFERENCES `persoon` (`idpersoon`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uitlenen`
--

LOCK TABLES `uitlenen` WRITE;
/*!40000 ALTER TABLE `uitlenen` DISABLE KEYS */;
INSERT INTO `uitlenen` VALUES (1,3,2,'2020-02-02'),(2,1,3,'2020-04-12'),(3,2,1,'2020-05-11'),(4,3,2,'2020-03-02');
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

-- Dump completed on 2020-05-12 21:21:57

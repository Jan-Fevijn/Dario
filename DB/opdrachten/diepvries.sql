-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: diepvries
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
-- Table structure for table `houdbaarheid`
--

DROP TABLE IF EXISTS `houdbaarheid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `houdbaarheid` (
  `idhoudbaarheid` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `lade` int(11) NOT NULL,
  `datumIn` date NOT NULL,
  `datumUit` date NOT NULL,
  PRIMARY KEY (`idhoudbaarheid`),
  UNIQUE KEY `idhoudbaarheid_UNIQUE` (`idhoudbaarheid`),
  KEY `prod_idx` (`product`),
  KEY `lades_idx` (`lade`),
  CONSTRAINT `lades` FOREIGN KEY (`lade`) REFERENCES `lade` (`idlade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prod` FOREIGN KEY (`product`) REFERENCES `producten` (`idproducten`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houdbaarheid`
--

LOCK TABLES `houdbaarheid` WRITE;
/*!40000 ALTER TABLE `houdbaarheid` DISABLE KEYS */;
INSERT INTO `houdbaarheid` VALUES (1,2,1,'2020-05-12','2020-05-30'),(2,5,1,'2020-05-12','2020-06-12'),(3,6,2,'2020-05-12','2020-06-21'),(4,1,3,'2020-05-12','2020-07-23'),(5,3,4,'2020-05-12','2020-06-14'),(6,4,5,'2020-05-12','2020-05-29');
/*!40000 ALTER TABLE `houdbaarheid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lade`
--

DROP TABLE IF EXISTS `lade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lade` (
  `idlade` int(11) NOT NULL AUTO_INCREMENT,
  `ladenummer` int(11) NOT NULL,
  PRIMARY KEY (`idlade`),
  UNIQUE KEY `idlade_UNIQUE` (`idlade`),
  UNIQUE KEY `ladenummer_UNIQUE` (`ladenummer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 MAX_ROWS=6;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lade`
--

LOCK TABLES `lade` WRITE;
/*!40000 ALTER TABLE `lade` DISABLE KEYS */;
INSERT INTO `lade` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6);
/*!40000 ALTER TABLE `lade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producten`
--

DROP TABLE IF EXISTS `producten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producten` (
  `idproducten` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  PRIMARY KEY (`idproducten`),
  UNIQUE KEY `idproducten_UNIQUE` (`idproducten`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producten`
--

LOCK TABLES `producten` WRITE;
/*!40000 ALTER TABLE `producten` DISABLE KEYS */;
INSERT INTO `producten` VALUES (1,'broccoli'),(2,'pizza'),(3,'ijs'),(4,'kabbeljauw'),(5,'ribbetjes'),(6,'pasta');
/*!40000 ALTER TABLE `producten` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-12 21:21:04

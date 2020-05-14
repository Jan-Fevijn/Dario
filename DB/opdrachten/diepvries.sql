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
  `inhoud` int(11) NOT NULL,
  `lade` int(11) NOT NULL,
  `invriesdatum` date NOT NULL,
  `gewicht` varchar(45) NOT NULL,
  `aantal` varchar(45) NOT NULL,
  PRIMARY KEY (`idhoudbaarheid`),
  UNIQUE KEY `idhoudbaarheid_UNIQUE` (`idhoudbaarheid`),
  KEY `prod_idx` (`inhoud`),
  KEY `lades_idx` (`lade`),
  CONSTRAINT `lades` FOREIGN KEY (`lade`) REFERENCES `lade` (`idlade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prod` FOREIGN KEY (`inhoud`) REFERENCES `inhoud` (`idinhoud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houdbaarheid`
--

LOCK TABLES `houdbaarheid` WRITE;
/*!40000 ALTER TABLE `houdbaarheid` DISABLE KEYS */;
INSERT INTO `houdbaarheid` VALUES (1,2,1,'2020-05-30','250g','2'),(2,5,1,'2020-06-12','1kg','3'),(3,6,2,'2020-06-21','250g','1'),(4,1,3,'2020-07-23','150g','1'),(5,3,4,'2020-06-14','350g','2'),(6,4,5,'2020-05-29','150g','2');
/*!40000 ALTER TABLE `houdbaarheid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inhoud`
--

DROP TABLE IF EXISTS `inhoud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inhoud` (
  `idinhoud` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `houdbaarheidsdatum` date NOT NULL,
  PRIMARY KEY (`idinhoud`),
  UNIQUE KEY `idproducten_UNIQUE` (`idinhoud`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inhoud`
--

LOCK TABLES `inhoud` WRITE;
/*!40000 ALTER TABLE `inhoud` DISABLE KEYS */;
INSERT INTO `inhoud` VALUES (1,'broccoli','2020-05-29'),(2,'pizza','2020-06-14'),(3,'ijs','2020-06-29'),(4,'kabbeljauw','2020-05-26'),(5,'ribbetjes','2020-05-19'),(6,'pasta','2020-05-25');
/*!40000 ALTER TABLE `inhoud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lade`
--

DROP TABLE IF EXISTS `lade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lade` (
  `idlade` int(11) NOT NULL AUTO_INCREMENT,
  `lade` int(11) NOT NULL,
  PRIMARY KEY (`idlade`),
  UNIQUE KEY `idlade_UNIQUE` (`idlade`),
  UNIQUE KEY `ladenummer_UNIQUE` (`lade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 MAX_ROWS=6;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lade`
--

LOCK TABLES `lade` WRITE;
/*!40000 ALTER TABLE `lade` DISABLE KEYS */;
INSERT INTO `lade` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6);
/*!40000 ALTER TABLE `lade` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14 10:40:46

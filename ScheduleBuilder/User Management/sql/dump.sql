CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `prerequisites`
--

DROP TABLE IF EXISTS `prerequisites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prerequisites` (
  `idprerequisites` int(11) NOT NULL AUTO_INCREMENT,
  `depends` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  PRIMARY KEY (`idprerequisites`),
  KEY `fk_prerequisites_course_catalog` (`idcourse`),
  KEY `fk_prerequisites_course_catalog1` (`depends`),
  CONSTRAINT `fk_prerequisites_course_catalog` FOREIGN KEY (`idcourse`) REFERENCES `course_catalog` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prerequisites_course_catalog1` FOREIGN KEY (`depends`) REFERENCES `course_catalog` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prerequisites`
--

LOCK TABLES `prerequisites` WRITE;
/*!40000 ALTER TABLE `prerequisites` DISABLE KEYS */;
INSERT INTO `prerequisites` VALUES (1,3,4),(2,2,4),(3,1,4),(4,2,3),(5,1,3),(6,1,2),(7,3,5),(8,4,6);
/*!40000 ALTER TABLE `prerequisites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_catalog`
--

DROP TABLE IF EXISTS `course_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_catalog` (
  `idcourse` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(45) DEFAULT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  `distance` tinyint(4) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcourse`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_catalog`
--

LOCK TABLES `course_catalog` WRITE;
/*!40000 ALTER TABLE `course_catalog` DISABLE KEYS */;
INSERT INTO `course_catalog` VALUES (1,'cse1000','intro to CSE',0,50),(2,'cse1284','intro to computer programming in C',0,50),(3,'cse1384','intermedieate computer programming',0,50),(4,'cse3333','algorithms',1,25),(5,'cse4003','dcsp',0,25),(6,'cse3384','data com',1,35);
/*!40000 ALTER TABLE `course_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_list`
--

DROP TABLE IF EXISTS `schedule_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_list` (
  `idschedule_list` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idschedule_list`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_list`
--

LOCK TABLES `schedule_list` WRITE;
/*!40000 ALTER TABLE `schedule_list` DISABLE KEYS */;
INSERT INTO `schedule_list` VALUES (1,'Current Schedule','3/11/2012');
/*!40000 ALTER TABLE `schedule_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `administrator` tinyint(4) DEFAULT NULL,
  `netid` varchar(45) DEFAULT NULL,
  `ta` tinyint(4) DEFAULT '0',
  `email` varchar(45) DEFAULT NULL,
  `prefrences` text,
  `hiatus` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `netid_UNIQUE` (`netid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='		';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','admin','ab1234',1,'ab1234',0,'admin@a.com',NULL,NULL),(2,'professor','1',NULL,NULL,'p1',0,'prof1@cse','No classes back to back.',NULL),(3,'professor','2',NULL,NULL,'p2',0,'prof2@cse','I want a coffee break between classes.',NULL),(4,'professor','3',NULL,NULL,'p3',0,'prof3@cse','No morning classes',NULL),(5,'TA','1',NULL,NULL,'t1',1,'ta1@cse',NULL,NULL),(6,'professor','4',NULL,NULL,'p4',0,'pfro4@cse',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `idschedule` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(45) DEFAULT NULL,
  `room` varchar(45) DEFAULT NULL,
  `idcourse` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `idschedule_list` int(11) NOT NULL,
  PRIMARY KEY (`idschedule`),
  KEY `fk_schedule_course_catalog1` (`idcourse`),
  KEY `fk_schedule_users1` (`idusers`),
  KEY `fk_schedule_schedule_list1` (`idschedule_list`),
  CONSTRAINT `fk_schedule_course_catalog1` FOREIGN KEY (`idcourse`) REFERENCES `course_catalog` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedule_schedule_list1` FOREIGN KEY (`idschedule_list`) REFERENCES `schedule_list` (`idschedule_list`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedule_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'8','100',1,2,1),(2,'9','100',2,2,1),(3,'10','100',3,3,1),(4,'10','102',4,4,1),(5,'11','104',5,6,1),(6,'12','100',6,6,1);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-20 19:14:30

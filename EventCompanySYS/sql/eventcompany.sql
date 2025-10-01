-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: eventcompany
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `bookingID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `eventid` tinyint(3) unsigned DEFAULT NULL,
  `numberOfTickets` tinyint(3) unsigned DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('A','C','P') DEFAULT 'A',
  PRIMARY KEY (`bookingID`),
  KEY `fk_event` (`eventid`),
  CONSTRAINT `fk_event` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,'alice@example.com',1,2,299.98,'A'),(2,'bob@example.com',3,1,99.99,'A'),(3,'carol@example.com',5,3,89.97,'A'),(4,'david@example.com',6,2,99.98,'A'),(5,'alice@example.com',8,1,59.99,'A'),(6,'bob@example.com',9,2,599.98,'A'),(7,'carol@example.com',11,4,159.96,'A'),(8,'david@example.com',12,2,179.98,'A');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `orgName` varchar(30) DEFAULT NULL,
  `contactPerson` varchar(50) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `building` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `county` varchar(30) DEFAULT NULL,
  `eircode` varchar(8) DEFAULT NULL,
  `status` enum('A','D','P') DEFAULT 'A',
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Green Leaf Charity','Mary O Donnell','+353861234567','mary.odonnell@greenleaf.ie','Unit 5','Charity Street','Dublin','Dublin','D02ABC1','A'),(2,'Sunny Side Nursing Home','Paul Brennan','+353879876543','paul.brennan@sunnyside.ie','Building 12','Elm Road','Cork','Cork','T12XYZ9','A'),(3,'West Coast Bookstore','Sinead Ryan','+353899874563','sinead.ryan@westcoastbooks.ie','Shop 22','Library Square','Limerick','Limerick','V94GHI7','A'),(4,'Happy Paws Veterinary','Declan Finn','+353879832145','declan.finn@happypaws.ie','Clinic B','Pet Street','Waterford','Waterford','X91JKL8','A'),(5,'Sunshine Bakery','Emma Nolan','+353856987412','emma.nolan@sunshinebakery.ie','Bakery House','Market Road','Kilkenny','Kilkenny','R95MNO2','A'),(6,'Silverline Accounting','John Casey','+353867412580','john.casey@silverline.ie','Suite 3A','Finance Avenue','Sligo','Sligo','F91PQR3','A'),(7,'Harbor Auto Repairs','Liam Keane','+353859638520','liam.keane@harborautorepairs.ie','Garage 5','Harbor Road','Wexford','Wexford','Y35STU4','D'),(8,'EcoGrow Garden Center','Rachel Byrne','+353875556677','rachel.byrne@ecogrow.ie','Greenhouse A','Country Road','Clare','Clare','V95VWX5','A'),(9,'CodeCrafters Ltd.','Mark Duffy','+353883334455','mark.duffy@codecrafters.ie','Software Plaza','Developer Lane','Galway','Galway','H92JKL7','A'),(10,'ByteWave Technologies','David Kelly','+353861112233','david.kelly@bytewave.ie','Tech Park','Innovation Street','Dublin','Dublin','D04DEF5','A'),(11,'DataSync Solutions','Emma Walsh','+353894445566','emma.walsh@datasync.ie','Cloud Center','Sync Avenue','Limerick','Limerick','V95MNO8','A'),(12,'Quantum AI Labs','Tom Fitzgerald','+353905556677','tom.fitzgerald@quantumailabs.ie','AI Tower','Future Street','Waterford','Waterford','X92PQR9','A');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `eventID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `eventType` varchar(2) NOT NULL,
  `clientID` tinyint(3) unsigned DEFAULT NULL,
  `description` text DEFAULT NULL,
  `venueid` tinyint(3) unsigned DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `startTime` varchar(5) DEFAULT NULL,
  `duration` smallint(5) unsigned DEFAULT NULL,
  `capacity` smallint(5) unsigned DEFAULT NULL,
  `tickets` smallint(5) unsigned DEFAULT NULL,
  `availableTickets` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `filepath` text NOT NULL,
  `status` enum('A','C','P') DEFAULT 'A',
  PRIMARY KEY (`eventID`),
  KEY `fk_eventType` (`eventType`),
  KEY `fk_client` (`clientID`),
  KEY `fk_venue` (`venueid`),
  CONSTRAINT `fk_client` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  CONSTRAINT `fk_eventType` FOREIGN KEY (`eventType`) REFERENCES `eventtypes` (`typeID`),
  CONSTRAINT `fk_venue` FOREIGN KEY (`venueid`) REFERENCES `venues` (`venueID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Tech Innovators Conference','CO',10,'A conference featuring the latest innovations in technology.',3,'2025-06-15','09:00',480,250,250,100,149.99,'img/eventsImg/Tech Innovators Conference.jpg','A'),(2,'Cybersecurity Summit','CO',11,'A cybersecurity-focused conference with industry leaders.',2,'2025-09-10','10:00',480,300,300,150,199.99,'img/eventsImg/CybersecuritySumit.jpeg','A'),(3,'Cloud Computing Workshop','WO',12,'A hands-on workshop covering cloud computing fundamentals.',3,'2025-07-22','13:00',240,150,150,50,99.99,'img/eventsImg/cloudComputingWorkshop.jpg','A'),(4,'AI & Machine Learning Bootcamp','WO',9,'A deep dive into artificial intelligence and machine learning.',5,'2025-08-05','10:00',360,200,200,120,179.99,'img/eventsImg/MachineLearning.jpg','A'),(5,'Startup Networking Meetup','ME',7,'A casual networking event for startup founders and investors.',1,'2025-04-20','18:00',180,100,100,30,29.99,'img/eventsImg/StartupNetworkingMeetup.jpg','A'),(6,'Quantum Computing Discussion','ME',8,'A roundtable discussion on the future of quantum computing.',4,'2025-06-12','15:00',120,120,120,70,49.99,'img/eventsImg/default.jpeg','A'),(7,'Rock Night Live','CT',5,'A night of live rock music featuring popular bands.',9,'2025-10-25','19:00',240,800,800,500,79.99,'img/eventsImg/RockLive.jpg','A'),(8,'Jazz Evening','CT',6,'An intimate jazz concert with renowned artists.',6,'2025-09-18','18:30',210,350,350,250,59.99,'img/eventsImg/default.jpeg','A'),(9,'Elegant Wedding Celebration','WE',1,'A beautifully organized wedding with premium services.',6,'2025-05-30','15:00',539,350,350,100,299.99,'img/eventsImg/default.jpeg','A'),(10,'Rustic Barn Wedding','WE',2,'A countryside wedding with a charming rustic theme.',8,'2025-07-15','14:00',599,200,200,90,249.99,'img/eventsImg/default.jpeg','A'),(11,'Marathon Championship','SP',3,'An annual marathon championship event.',7,'2025-11-10','08:00',360,500,500,200,39.99,'img/eventsImg/Marathon.jpeg','A'),(12,'City Football Cup Final','SP',4,'The grand finale of the city football championship.',5,'2025-12-05','16:00',240,600,600,350,89.99,'img/eventsImg/default.jpeg','A'),(13,'Classic Film Night','MO',5,'A screening of classic Hollywood films.',5,'2025-03-15','20:00',180,250,250,150,19.99,'img/eventsImg/default.jpeg','A'),(14,'Sci-Fi Movie Marathon','MO',6,'A marathon featuring popular sci-fi films.',3,'2025-07-20','18:00',480,250,250,80,24.99,'img/eventsImg/default.jpeg','A');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventtypes`
--

DROP TABLE IF EXISTS `eventtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventtypes` (
  `typeID` varchar(2) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`typeID`),
  UNIQUE KEY `typeID` (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventtypes`
--

LOCK TABLES `eventtypes` WRITE;
/*!40000 ALTER TABLE `eventtypes` DISABLE KEYS */;
INSERT INTO `eventtypes` VALUES ('CM','Community Event'),('CO','Conference'),('CT','Concert'),('ED','Educational Event'),('EX','Exhibition'),('FA','Festival'),('FU','Fundraiser'),('ME','Meeting'),('MO','Movie Screening'),('NE','Networking Event'),('PA','Party'),('SE','Seminar'),('SP','Sports Event'),('TO','Tour'),('WE','Wedding'),('WO','Workshop');
/*!40000 ALTER TABLE `eventtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserId` varchar(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Type` enum('Staff','Client','Admin') DEFAULT 'Client',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserId` (`UserId`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Password` (`Password`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('A000000001','admin_izzy','IzzyAdmin01',NULL,'Admin'),('A000000002','admin_jack','JackMaster2',NULL,'Admin'),('A000000003','admin_karen','KarenRoot03',NULL,'Admin'),('A000000004','admin_luke','LukeSecure4!',NULL,'Admin'),('S000000001','staff_emily','EmilyStrong1',NULL,'Staff'),('S000000002','staff_frank','FrankWork88',NULL,'Staff'),('S000000003','staff_grace','GraceLogin9',NULL,'Staff'),('S000000004','staff_henry','HenryOffice0',NULL,'Staff'),('U000000001','client_alice','AlicePass01','alice@example.com','Client'),('U000000002','client_bob','BobPass123','bob@example.com','Client'),('U000000003','client_carol','CarolPwd456','carol@example.com','Client'),('U000000004','client_david','David2025!','david@example.com','Client');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venues`
--

DROP TABLE IF EXISTS `venues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venues` (
  `venueID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `capacity` smallint(5) unsigned DEFAULT NULL,
  `contactPerson` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `building` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `county` varchar(30) DEFAULT NULL,
  `eircode` varchar(8) DEFAULT NULL,
  `status` enum('A','D','P') DEFAULT 'A',
  PRIMARY KEY (`venueID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venues`
--

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;
INSERT INTO `venues` VALUES (1,'Grand Hall','A spacious hall for large events.',500,'John Smith','+353871234567','john.smith@grandhall.ie','Building A','Main Street','Dublin','Dublin','D01ABC1','A'),(2,'Riverside Conference Center','Modern venue with river views.',300,'Emily Johnson','+353869876543','emily.johnson@riverside.ie','Block B','River Road','Cork','Cork','T12XYZ9','A'),(3,'TechHub Auditorium','High-tech venue ideal for conferences.',250,'Sarah Murphy','+353836543210','sarah.murphy@techhub.ie','Innovation Park','Tech Avenue','Limerick','Limerick','V94GHI7','A'),(4,'Greenfield Community Hall','Perfect for local gatherings and fundraisers.',150,'Patrick Doyle','+353898765432','patrick.doyle@greenfield.ie','Community Centre','Oak Lane','Waterford','Waterford','X91JKL8','A'),(5,'Starlight Theater','An open-air theater for concerts and performances.',600,'Laura Nolan','+353873216549','laura.nolan@starlight.ie','Theater District','Broadway Road','Kilkenny','Kilkenny','R95MNO2','A'),(6,'Sunset Garden Venue','Outdoor venue ideal for weddings and receptions.',350,'James Byrne','+353867412580','james.byrne@sunsetgarden.ie','Garden Estate','Sunset Drive','Sligo','Sligo','F91PQR3','A'),(7,'Oceanview Banquet Hall','A stunning sea-view venue for corporate and social events.',280,'Rebecca Finn','+353859638520','rebecca.finn@oceanview.ie','Seaside Plaza','Harbor Street','Wexford','Wexford','Y35STU4','A'),(8,'The Rustic Barn','A charming countryside barn perfect for rustic weddings.',200,'Kevin McGrath','+353875556677','kevin.mcgrath@rusticbarn.ie','Farmhouse Grounds','Country Road','Clare','Clare','V95VWX5','A'),(9,'Metropolitan Exhibition Hall','Large-scale exhibition hall for trade shows and expos.',800,'Catherine O Brien','+353869871123','catherine.obrien@metrohall.ie','Exhibition Centre','City Center','Belfast','Antrim','BT1YZA6','A');
/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-07 11:14:15

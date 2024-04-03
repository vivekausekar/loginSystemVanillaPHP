-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: login_system
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vivek@gmail.com','123','profile.jpg'),(2,'vivek@gmail.com','123','profile.jpg'),(3,'vivek@gmail.com','123','profile.jpg'),(4,'vivek@gmail.com','123','profile.jpg'),(5,'vivek@gmail.com','123','profile.jpg'),(6,'vivek@gmail.com','123','E:/xampp/htdocs/loginSystemVanillaPHP/upload/images/1712127728-1709-profile.jpg'),(7,'vivek@gmail.com','123','E:/xampp/htdocs/loginSystemVanillaPHP/upload/images/1712127913-4453-profile.jpg'),(8,'vivekausekar@gm','40bd001563085fc35165329ea1ff5c5ecbdbbeef','E:/xampp/htdocs/loginSystemVanillaPHP/upload/images/1712128597-8758-profile.jpg'),(9,'vivek.ausekar@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','E:/xampp/htdocs/loginSystemVanillaPHP/upload/images/1712128737-3480-profile.jpg'),(10,'vivek.a@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','/upload/images/1712131378-3910-profile.jpg'),(11,'vausekar@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','http://localhost/loginSystemVanillaPHP/upload/images/1712131434-6449-profile.jpg'),(12,'va@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','/upload/images/1712131564-8726-profile.jpg'),(13,'v.ausekar@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','/upload/images/1712132944-9268-profile.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-03 14:31:50

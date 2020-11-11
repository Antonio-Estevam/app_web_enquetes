-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: inqueetesdb
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer` (
  `idanswer` int NOT NULL AUTO_INCREMENT,
  `answer_name` varchar(45) NOT NULL,
  `answer_id_user_fk` int NOT NULL,
  `answer_id_question_fk` varchar(35) NOT NULL,
  `answer_id_option_fk` int NOT NULL,
  PRIMARY KEY (`idanswer`),
  KEY `answer_id_user_fk_idx` (`answer_id_user_fk`),
  KEY `answer_id_question_fk_idx` (`answer_id_question_fk`),
  KEY `answer_id_option_fk_idx` (`answer_id_option_fk`),
  CONSTRAINT `answer_id_option_fk` FOREIGN KEY (`answer_id_option_fk`) REFERENCES `option` (`idoption`),
  CONSTRAINT `answer_id_question_fk` FOREIGN KEY (`answer_id_question_fk`) REFERENCES `question` (`idquestion`),
  CONSTRAINT `answer_id_user_fk` FOREIGN KEY (`answer_id_user_fk`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (5,'Jão',9,'1',1),(7,'tt',9,'AVS002',1);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option` (
  `idoption` int NOT NULL AUTO_INCREMENT,
  `option_body` varchar(90) NOT NULL,
  `id_question_fk` varchar(35) NOT NULL,
  PRIMARY KEY (`idoption`),
  KEY `id_question_fk_idx` (`id_question_fk`),
  CONSTRAINT `id_question_fk` FOREIGN KEY (`id_question_fk`) REFERENCES `question` (`idquestion`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,'Praia.','1'),(2,'Paris','1'),(3,'Bahaia','1'),(5,'EUA','AVS002'),(6,'BA','1'),(8,'yy','1'),(13,'Flamengo ','AVS915101120202011'),(14,'12','AVS917101120202025'),(15,'chocolate ','AVS660101120202008'),(16,'cocada','AVS660101120202008'),(17,'op1','AVS940101120202045'),(18,'op2','AVS940101120202045'),(19,'op3','AVS940101120202045'),(20,'op4','AVS940101120202045'),(21,'op5','AVS940101120202045'),(22,'op6','AVS940101120202045'),(23,'tira 1','AVS763101120202030'),(24,'tira 2','AVS763101120202030'),(25,'tira 3','AVS763101120202030'),(26,'Samir','AVS193101120202006'),(27,'Smira','AVS193101120202006'),(28,'Samar','AVS193101120202006'),(29,'18','AVS720101120202047'),(30,'20','AVS720101120202047');
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `idquestion` varchar(35) NOT NULL,
  `question_body` varchar(100) NOT NULL,
  `question_status` int NOT NULL DEFAULT '1',
  `id_user_fk` int NOT NULL,
  PRIMARY KEY (`idquestion`),
  KEY `id_user_fk_idx` (`id_user_fk`),
  CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES ('1','Qual a viagem dos sonhos ?',1,1),('AVS002','O melhor lugar do mundo?',1,9),('AVS003','Quantos anos eu tenho?',1,1),('AVS193101120202006','Qual o nome do gato de casa ?',1,1),('AVS660101120202008','doce favorito ',1,1),('AVS720101120202047','Quantos anos de idade eu tenho ?',1,1),('AVS763101120202030','tira duv',1,1),('AVS915101120202011','Qual meu time favorito ?',1,1),('AVS917101120202025','Quantos anos eu tenho ?',1,1),('AVS940101120202045','seis opcs',1,1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(90) NOT NULL,
  `user_passl` varchar(10) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jhonny Estevam ','123','jhonnyimmbe@gmail.com'),(9,'Antonio Estevam da Silva Filho','uj7yj7j','jhonnyimmbe@hotmail.com'),(22,'Maria silva ','123456','ma@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-10 23:00:33

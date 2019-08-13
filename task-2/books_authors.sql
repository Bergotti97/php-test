-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: books_authors
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Владимир Набоков'),(2,'Скотт Фицджеральд'),(3,'Марсель Пруст'),(4,'Джеймс Джойс'),(5,'Габриеэль Гарсиа Маркес'),(6,'Уильям Фолкнер'),(7,'Вирджини Вулф'),(8,'Лев Толстой'),(9,'Гюстав Флобер'),(10,'Марк Твен'),(11,'Джордж Элиот');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_author`
--

DROP TABLE IF EXISTS `book_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_author`
--

LOCK TABLES `book_author` WRITE;
/*!40000 ALTER TABLE `book_author` DISABLE KEYS */;
INSERT INTO `book_author` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,2),(6,6,2),(7,8,3),(8,9,3),(9,10,3),(10,11,3),(11,12,3),(12,13,3),(13,14,3),(14,15,3),(15,16,3),(16,17,4),(17,18,4),(18,19,4),(19,20,5),(20,21,5),(21,22,5),(22,23,5),(23,24,5),(24,25,5),(25,26,5),(26,27,6),(27,28,6),(28,29,6),(29,30,6),(30,31,6),(31,32,6),(32,33,6),(33,34,6),(34,35,6),(35,36,7),(36,37,7),(37,38,8),(38,39,8),(39,40,9),(40,41,10),(41,42,10),(42,43,10),(43,44,10),(44,45,10),(45,46,11),(46,47,11),(47,48,11),(48,49,11);
/*!40000 ALTER TABLE `book_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Лолита'),(2,'Камера обскура'),(3,'Защита Лужина'),(4,'Приглашение на казнь'),(5,'Великий Гэтсби'),(6,'Ночь нежна'),(8,'В сторону Свана'),(9,'Под сенью девушек в цвету'),(10,'У Германтов'),(11,'Содом и Гоморра'),(12,'Пленница'),(13,'Обретенное время'),(14,'Беглянка'),(15,'Комбре'),(16,'Любовь Сванна'),(17,'Улисс'),(18,'Портрет художника в юности'),(19,'Герой Стивен'),(20,'Любовь во время чумы'),(21,'Сто лет одиночества'),(22,'Полковнику никто не пишет'),(23,'Осень патриарха'),(24,'Хроника одной смерти, объявленной заранее'),(25,'О любви и прочих бесах'),(26,'Вспоминая моих несчастных шлюшек'),(27,'Звук и ярость'),(28,'Свет в августе'),(29,'Когда я умирала'),(30,'Деревушка'),(31,'Особняк'),(32,'Авессалос,Авессалом!'),(33,'Осквернитель праха'),(34,'Город'),(35,'Святилище'),(36,'Миссис Дэллоуэй'),(37,'На маяк'),(38,'Анна Каренина'),(39,'Война и Мир'),(40,'Мадам Бовари'),(41,'Приключения Тома Сойера'),(42,'Приключения Гекльберри Финна'),(43,'Принц и нищий'),(44,'Янки из Коннектикута при дворе короля Артура'),(45,'Таинственный незнакомец'),(46,'Мидлмарч'),(47,'Мельница на Флоссе'),(48,'Адам Бид'),(49,'Ромола');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-11 18:25:34

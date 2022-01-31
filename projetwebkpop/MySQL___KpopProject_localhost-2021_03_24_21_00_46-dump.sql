-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: KpopProject
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_morceaux` int(11) NOT NULL,
  `date_sortie` date NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `affiche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39986E437A45358C` (`groupe_id`),
  CONSTRAINT `FK_39986E437A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'I am',6,'2018-05-02',1,'/img/logo/blackpink.png'),(2,'I made',5,'2019-02-26',1,NULL),(3,'I trust',5,'2020-04-06',1,NULL),(4,'I burn',6,'2021-01-11',1,NULL);
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `histoire` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9C07354F7A45358C` (`groupe_id`),
  CONSTRAINT `FK_9C07354F7A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artiste`
--

LOCK TABLES `artiste` WRITE;
/*!40000 ALTER TABLE `artiste` DISABLE KEYS */;
INSERT INTO `artiste` VALUES (1,1,'Soyeon',22,'Sud-coréenne','Bias',NULL),(2,1,'Miyeon',24,'Sud-coréenne','Love ya',NULL),(3,1,'Minnie',23,'Thailandaise','hhh',NULL),(4,1,'Soojin',23,'Sud-coréenne','soosoo',NULL),(5,1,'Yuqi',21,'Chinoise','Bluff Queen',NULL),(6,1,'Shuhua',21,'Taiwanaise','Shushu',NULL),(7,2,'Solar',30,'Sud-coréenne','Leader',NULL),(8,2,'Moonbyul',28,'Sud-coréenne','Rappeuse',NULL),(9,2,'Wheein',25,'Sud-coréenne','Chanteuse',NULL),(10,2,'Hwasa',25,'Sud-coréenne','Maknae / main dancer',NULL);
/*!40000 ALTER TABLE `artiste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chanson`
--

DROP TABLE IF EXISTS `chanson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chanson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` time NOT NULL,
  `langues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lyric` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_A2E637C21137ABCF` (`album_id`),
  CONSTRAINT `FK_A2E637C21137ABCF` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chanson`
--

LOCK TABLES `chanson` WRITE;
/*!40000 ALTER TABLE `chanson` DISABLE KEYS */;
INSERT INTO `chanson` VALUES (1,1,'Latata','00:03:22','Coréen','9mQk7Evt6Vs','기나긴 너와 이 밤을 너와 이렇게 너와\n기다린 너와 시간을 너와 이렇게 너와\n어둠 속 red light\n시선은 left right 불 위를 걷나\n시작의 점화 가까이 온다 누가 뭐 겁나\nUh oh 어디까지 더 깊이 빠져들지\n중독된 향기까지 그렇게 뒤섞여버리지\n그래 더 더 불태워 버려지게 \n내일은 우린 없는 거야 너 oh oh oh oh oh\nI love ya 널 위한 노래를 해 깊게 더 빠지게 lata\nI love ya 널 위한 춤을 춰 내게 널 갇히게 lata\nI love ya\nLatata latata latata latata\nLatata latata latata latata\n날 위해 불러줘 평생 널 못 잊게 lata\nI love ya\nI love ya\nEvery day every night latata\nI love ya\nEvery day every night latata\nDon\'t be lazy 다가와 baby\n시간은 너무 짧고 이건 아직 basic\n좀 더 깊은 곳으로 더 들어가 나를 머금고\n취해도 돼 중요치 않아 내일이\n아주 화려한 이 춤은 라따따\n뜨겁게 불태울 거야 다다다\n뭐 어려워 다 널 부러워해 좋아 이 밤을 불태워\nMuah muah muah\nUh oh 어디까지 더 그리 나빠질지\n이 밤은 아침까지 그렇게 더 미쳐버리지\n그래 더 더 불태워 버려지게\n내일은 우린 없는 거야 너 oh oh oh oh oh\nI love ya 널 위한 노래를 해 깊게 더 빠지게 lata\nI love ya 널 위한 춤을 춰 내게 널 갇히게 lata\nI love ya\nLatata latata… '),(2,1,'$$$','00:03:31','Coréen',NULL,'yolo\ng'),(3,1,'Maze','00:03:20','Coréen',NULL,NULL),(4,1,'Don\'t text me','00:03:36','Coréen',NULL,NULL),(5,1,'What\'s in your house','00:03:27','Coréen',NULL,NULL),(6,1,'Hear me','00:03:56','Coréen',NULL,NULL);
/*!40000 ALTER TABLE `chanson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210320104559','2021-03-20 11:46:41',109),('DoctrineMigrations\\Version20210321162510','2021-03-21 17:25:25',189),('DoctrineMigrations\\Version20210321181645','2021-03-21 19:16:57',107),('DoctrineMigrations\\Version20210321183537','2021-03-21 19:35:45',214),('DoctrineMigrations\\Version20210321184532','2021-03-21 19:45:37',130),('DoctrineMigrations\\Version20210321185915','2021-03-21 19:59:21',190),('DoctrineMigrations\\Version20210324183448','2021-03-24 19:34:58',212),('DoctrineMigrations\\Version20210324184002','2021-03-24 19:40:06',150);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_membres` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupe`
--

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
INSERT INTO `groupe` VALUES (1,'(G)I-dle',6,'2018-05-02','/img/logo/gidle.jpg','\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed blandit nulla, non malesuada metus. Proin eu sollicitudin turpis, eu rhoncus urna. Phasellus ut arcu quis quam aliquam faucibus. Nullam a erat vitae ligula fringilla finibus. Vivamus feugiat id est sagittis faucibus. Phasellus sollicitudin mi purus, non consectetur nisi vehicula ut. Nunc a semper nisi. Vivamus eget fermentum ipsum.\n\nDonec eget ante fermentum turpis varius pretium. In hac habitasse platea dictumst. Nulla varius quam et auctor accumsan. Maecenas non ex vel leo laoreet egestas ut sodales odio. Cras porta a sapien id mollis. Praesent vel erat pharetra, egestas nibh non, iaculis nisi. Etiam dolor mauris, tempus at tempor sit amet, fringilla eu leo. Donec ultricies nibh dui, in ultrices nulla lacinia ut. Duis iaculis enim elit, id feugiat elit bibendum eget.\n\nPhasellus sit amet magna tortor. Nunc eget ante a tortor mattis pulvinar. Vestibulum tincidunt purus ac ex tincidunt viverra. Sed nec orci lacinia, iaculis neque sed, dapibus metus. Mauris quis ipsum et elit lacinia molestie. Nam venenatis convallis ex, et tincidunt turpis mollis ac. Maecenas bibendum leo risus, et sagittis lectus eleifend et. Etiam consectetur libero et rhoncus ultricies. Donec elit ligula, iaculis et condimentum eu, posuere ut turpis.\n\nAenean laoreet maximus condimentum. Sed tincidunt volutpat iaculis. Integer tempus turpis suscipit tortor tincidunt interdum. Praesent facilisis rhoncus lacus eu interdum. Duis a volutpat dolor, quis blandit mauris. Aliquam at facilisis dui, at varius leo. Aenean sit amet ipsum ut ipsum lobortis bibendum. Vivamus faucibus pulvinar viverra. Nam et aliquet felis. '),(2,'Mamamoo',4,'2014-06-18','/img/logo/mamamoo.jpg',NULL),(3,'Blackpink',4,'2016-08-08','/img/logo/blackpink.png',NULL),(4,'a',5,'2016-08-08','/img/logo/blackpink.png',NULL),(5,'b',4,'2016-08-08','/img/logo/blackpink.png',NULL),(6,'c',3,'2016-08-08','/img/logo/blackpink.png',NULL);
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-24 21:00:47

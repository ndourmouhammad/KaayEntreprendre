-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: kaay-entreprendre
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accompagnement_personnalises`
--

DROP TABLE IF EXISTS `accompagnement_personnalises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accompagnement_personnalises` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `receiver_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accompagnement_personnalises_sender_id_foreign` (`sender_id`),
  KEY `accompagnement_personnalises_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `accompagnement_personnalises_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accompagnement_personnalises_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accompagnement_personnalises`
--

LOCK TABLES `accompagnement_personnalises` WRITE;
/*!40000 ALTER TABLE `accompagnement_personnalises` DISABLE KEYS */;
INSERT INTO `accompagnement_personnalises` VALUES (1,1,4,NULL,'2024-08-13 12:05:48','2024-08-13 12:05:48'),(2,1,3,NULL,'2024-08-13 12:07:01','2024-08-13 12:07:01'),(3,1,13,NULL,'2024-08-25 07:02:22','2024-08-25 07:02:22'),(4,4,3,NULL,'2024-08-25 07:25:17','2024-08-25 07:25:17');
/*!40000 ALTER TABLE `accompagnement_personnalises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('0hVJfqTuDIN1OJzL','a:1:{s:11:\"valid_until\";i:1724512628;}',1725722288),('1gzzATFEggV2WNBr','a:1:{s:11:\"valid_until\";i:1724520269;}',1725727229),('1h7D9H2pT5KExX9x','a:1:{s:11:\"valid_until\";i:1724496521;}',1725705881),('2iqSescUH0osBO1x','a:1:{s:11:\"valid_until\";i:1724492357;}',1725701657),('4Emw5wX5pZOBl7XG','a:1:{s:11:\"valid_until\";i:1724197188;}',1725406728),('73EmrijMC6MeiFWa','a:1:{s:11:\"valid_until\";i:1724492494;}',1725702034),('8brVN81C210cyHj0','a:1:{s:11:\"valid_until\";i:1724242836;}',1725451416),('9NgzkLjrZDGiFFNX','a:1:{s:11:\"valid_until\";i:1724101897;}',1725311557),('AcBxgAXTDatL8iaM','a:1:{s:11:\"valid_until\";i:1723980256;}',1725189916),('an5bVcpI5fFBPlYs','a:1:{s:11:\"valid_until\";i:1724401228;}',1725607588),('B2Zq3T0BkmQ68y9X','a:1:{s:11:\"valid_until\";i:1724491908;}',1725699648),('Bpyl5KdY6oZXIjOA','a:1:{s:11:\"valid_until\";i:1724412912;}',1725621912),('BRBmiGPbJ86eEy4u','a:1:{s:11:\"valid_until\";i:1724484715;}',1725694375),('d6X8vUNsIap27bWH','a:1:{s:11:\"valid_until\";i:1724073590;}',1725283190),('dlnIttDDFQruwBao','a:1:{s:11:\"valid_until\";i:1724409488;}',1725618848),('e071WqIV6oeSrNBr','a:1:{s:11:\"valid_until\";i:1724397882;}',1725607542),('EorReNxVv0xd74Fb','a:1:{s:11:\"valid_until\";i:1724083347;}',1725292707),('eRHzs0aMWQeR949v','a:1:{s:11:\"valid_until\";i:1724245367;}',1725454667),('fAJyMh3v4hBnJYyv','a:1:{s:11:\"valid_until\";i:1724166531;}',1725376191),('FPf69bNIwX6VPmp9','a:1:{s:11:\"valid_until\";i:1724409973;}',1725619153),('FURXqIGrkjzV5Wi3','a:1:{s:11:\"valid_until\";i:1724569432;}',1725777232),('GAle45I3GdBJRxNo','a:1:{s:11:\"valid_until\";i:1724431093;}',1725640213),('gQnK53ZHP3rAn0q6','a:1:{s:11:\"valid_until\";i:1724411739;}',1725621219),('hCXGv9nZdhRx7yXs','a:1:{s:11:\"valid_until\";i:1724412199;}',1725621439),('iDoy4R575NwMZVQb','a:1:{s:11:\"valid_until\";i:1724073479;}',1725283079),('iDU21oB0PpvCyxUr','a:1:{s:11:\"valid_until\";i:1724101872;}',1725311532),('JBKFrbl3ic7vKrHB','a:1:{s:11:\"valid_until\";i:1724512762;}',1725722422),('JtzHzLq13mP2494M','a:1:{s:11:\"valid_until\";i:1724409175;}',1725618235),('JZLWFZHpqeuekuke','a:1:{s:11:\"valid_until\";i:1724340168;}',1725549828),('JztSTmJqLEElmgAq','a:1:{s:11:\"valid_until\";i:1724104804;}',1725311764),('K2Hz01CqwCQgYkll','a:1:{s:11:\"valid_until\";i:1724323054;}',1725531754),('KA5pZBM7Ta4tazrR','a:1:{s:11:\"valid_until\";i:1724411175;}',1725619695),('KOhOd6bq0qhnSJUh','a:1:{s:11:\"valid_until\";i:1724072642;}',1725282242),('nQHvluFgxUaXiFsU','a:1:{s:11:\"valid_until\";i:1723986769;}',1725196429),('NxTQnBeo9LPc8p3z','a:1:{s:11:\"valid_until\";i:1724484630;}',1725694170),('q78doSrHQ2DFfwbO','a:1:{s:11:\"valid_until\";i:1724102102;}',1725311582),('QcbeWwyMlOraVPlM','a:1:{s:11:\"valid_until\";i:1724073877;}',1725283477),('qda8yenUBAqPcGoE','a:1:{s:11:\"valid_until\";i:1724159845;}',1725367465),('qoRGpXudsYtUNau4','a:1:{s:11:\"valid_until\";i:1724512727;}',1725722327),('Qtg7fbqJ62R1mYGs','a:1:{s:11:\"valid_until\";i:1724082510;}',1725290310),('rnCYaFhMyX6rxkBg','a:1:{s:11:\"valid_until\";i:1724432134;}',1725640834),('RnhWlePVnq2qwYb0','a:1:{s:11:\"valid_until\";i:1724244976;}',1725453436),('rs2FSFdY8k1ioxyy','a:1:{s:11:\"valid_until\";i:1724408523;}',1725617883),('spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:44:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:12:\"activer_user\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"desactiver_user\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"lister_users\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:14:\"supprimer_user\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"changer_role\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"lister_roles\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"ajouter_role\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"supprimer_role\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:13:\"modifier_role\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:18:\"lister_permissions\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:18:\"ajouter_permission\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:20:\"supprimer_permission\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:19:\"modifier_permission\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"ajouter_evenement\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"modifier_evenement\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:19:\"supprimer_evenement\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:28:\"lister_evenements_supprimés\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:29:\"restaurer_evenement_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:29:\"supprimer_evenement_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:20:\"supprimer_discussion\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:21:\"supprimer_commentaire\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:25:\"ajouter_retour_experience\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:26:\"modifier_retour_experience\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:27:\"supprimer_retour_experience\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"ajouter_guide\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:14:\"modifier_guide\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"supprimer_guide\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:19:\"lister_resersations\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:21:\"confirmer_reservation\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"refuser_reservation\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:37:\"lister_retours_experiences_supprimés\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:37:\"restaurer_retour_experience_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:37:\"supprimer_retour_experience_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:24:\"lister_guides_supprimés\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:25:\"restaurer_guide_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:25:\"supprimer_guide_supprimé\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"ajouter_etape\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:17:\"ajouter_ressource\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:18:\"modifier_ressource\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:19:\"supprimer_ressource\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:29:\"lister_ressources_supprimées\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:30:\"restaurer_ressource_supprimée\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:30:\"supprimer_ressource_supprimée\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:2;}}i:43;a:3:{s:1:\"a\";i:46;s:1:\"b\";s:8:\"TEST4558\";s:1:\"c\";s:3:\"api\";}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"api\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"coach\";s:1:\"c\";s:3:\"api\";}}}',1724599019),('T2baIVSDyRjAzngO','a:1:{s:11:\"valid_until\";i:1724057895;}',1725267555),('tPGUznoyWQ0Qjuxg','a:1:{s:11:\"valid_until\";i:1724431170;}',1725640830),('ugbWsVZ9CPeD1VNr','a:1:{s:11:\"valid_until\";i:1724245733;}',1725455333),('uQwbQMPLlfk6AOnF','a:1:{s:11:\"valid_until\";i:1724407702;}',1725615802),('uZRlHjTc4tzWPS4Q','a:1:{s:11:\"valid_until\";i:1723980119;}',1725189119),('vGJmycnpVu6UsUsd','a:1:{s:11:\"valid_until\";i:1724407746;}',1725617346),('vks1ydln8g5jTh0o','a:1:{s:11:\"valid_until\";i:1724408188;}',1725617608),('VlOAITlKVHnv3NBm','a:1:{s:11:\"valid_until\";i:1724484496;}',1725694156),('wdJusJn6D79jJV4z','a:1:{s:11:\"valid_until\";i:1724407930;}',1725617470),('Wi6wszdOlCZ4digw','a:1:{s:11:\"valid_until\";i:1724197031;}',1725406451),('y82lEzgzqC4VejmB','a:1:{s:11:\"valid_until\";i:1724479062;}',1725688182),('YWRyPoeT4zyD2jLE','a:1:{s:11:\"valid_until\";i:1724243775;}',1725452535),('z4MLScBDH8AUb2gs','a:1:{s:11:\"valid_until\";i:1724245586;}',1725455246),('ZCM6oCbAa8Gn5RYK','a:1:{s:11:\"valid_until\";i:1724072678;}',1725282338);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Informatique','test description',NULL,'2024-08-13 12:04:21',NULL),(2,'Immobilier','ceci est une desc',NULL,'2024-08-13 12:04:41',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `discussion_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaires_user_id_foreign` (`user_id`),
  KEY `commentaires_discussion_id_foreign` (`discussion_id`),
  CONSTRAINT `commentaires_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaires`
--

LOCK TABLES `commentaires` WRITE;
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;
INSERT INTO `commentaires` VALUES (1,'Pourriez-vous nous fournir plus de détails sur les types de partenariats que vous envisagez ? Nous aimerions également connaître les bénéfices mutuels attendus. Je suis disponible pour une réunion la semaine prochaine, si cela vous convient.',1,1,'2024-08-13 11:03:38','2024-08-13 11:03:38'),(3,'Pourriez-vous nous fournir plus de détails sur les types de partenariats que vous envisagez ? Nous aimerions également connaître les bénéfices mutuels attendus. Je suis disponible pour une réunion la semaine prochaine, si cela vous convient.',3,2,'2024-08-25 07:43:35',NULL),(7,'J\'ai bien aimé votre intervention sur ce sujet crucial.',4,2,'2024-08-25 07:54:02',NULL);
/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussions_user_id_foreign` (`user_id`),
  CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (1,'Revue trimestrielle des performances','Il est temps de faire le point sur les performances de l\'entreprise pour ce trimestre. Nous examinerons les résultats financiers, les objectifs atteints et les défis rencontrés. Merci de préparer les rapports nécessaires pour la réunion de demain.',1,'2024-08-13 10:55:20','2024-08-13 10:58:25'),(2,'Feedback sur le prototype','Merci d\'avoir testé notre prototype. Vos retours sont précieux pour nous. Pouvez-vous nous faire part de vos impressions sur l\'interface et la fonctionnalité ? Toute suggestion pour améliorer le produit serait grandement appréciée.',4,'2024-08-13 10:56:18',NULL),(21,'test','test',4,'2024-08-24 19:05:34','2024-08-24 19:05:34');
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etapes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pieces_jointes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guide_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etapes_guide_id_foreign` (`guide_id`),
  CONSTRAINT `etapes_guide_id_foreign` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapes`
--

LOCK TABLES `etapes` WRITE;
/*!40000 ALTER TABLE `etapes` DISABLE KEYS */;
INSERT INTO `etapes` VALUES (1,'Évaluation de l\'Idée et Recherche de Marché','pieces_jointes/RJIuRmjSl3EATxRjibSmk8lK5X6LL3VfKqd4Zfu1.pdf','Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée.',1,NULL,'2024-08-24 08:45:05','2024-08-24 08:45:05'),(2,'Élaboration d\'un Plan d\'Affaires','pieces_jointes/GIMPMhWl2U1pSPwMjgP8eu9tTbBhY2h9X8nz8tHW.pdf','Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée.',1,NULL,'2024-08-24 08:46:10','2024-08-24 08:46:10'),(3,'Enregistrement de l\'Entreprise','pieces_jointes/u9OKQhlFalDQ6G4zJm2LRY5kecgPIFx0eLskYN6d.pdf','Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée.',1,NULL,'2024-08-24 08:46:29','2024-08-24 08:46:29'),(4,'Obtentions des Autorisations et Licences','pieces_jointes/B4zqjfSPsieBkMDG28NneoJco9G9t5mPF2w4bijO.pdf','Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée.',1,NULL,'2024-08-24 08:46:44','2024-08-24 08:46:44'),(5,'Financement','pieces_jointes/wAnolqUr2hXdcRWGZ3SXwguwhDbbNOl668dtwmcd.pdf','Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée.',1,NULL,'2024-08-24 08:46:58','2024-08-24 08:46:58');
/*!40000 ALTER TABLE `etapes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_places` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `prix` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
INSERT INTO `evenements` VALUES (2,'Journée de l\'excellence','Durant cette journée, nous allons honorer l\'élite du département de Diourbel.','Diourbel','45','2024-09-17 08:41:50','2024-09-24 17:49:50',1500,'photos/EkYG0bQBFxCPXWgm8TWb9AzZm6NQ51ihDenrNYn9.jpg',NULL,'2024-08-13 11:16:18','2024-08-21 09:32:48'),(3,'L\'initialisation au monde de l\'entreprenariat','Durant cette journée, nous allons honorer l\'élite du département de Diourbel.','Dakar','25','2024-09-17 00:00:00','2024-09-24 00:00:00',5000,'photos/UJNRDrkmlG2PQmdTojRr0hXWfkgIx9xCfk0ELdlU.png',NULL,'2024-08-13 11:18:24','2024-08-22 11:10:12'),(4,'2020 Business conference','Durant cette journée, nous allons honorer l\'élite du département de Diourbel.','Mbour','100','2024-09-17 00:00:00','2024-09-24 00:00:00',15000,'photos/uOYpbDMugD0Biwb9L459Qx7VuWwG5KoDp7yGfCCt.jpg',NULL,'2024-08-19 17:16:48','2024-08-22 11:10:37'),(5,'test','test','Sea Plaza Dakar','25','2024-08-22 00:00:00','2024-08-23 00:00:00',1500,'photos/85eljul9Dy910dhIjsciLlyhmMY3KxRIjJiojQge.jpg',NULL,'2024-08-22 09:55:51','2024-08-22 11:09:39'),(6,'Cérémonie de mentorat','test','Sea Plaza Dakar','25','2024-08-22 00:00:00','2024-08-23 00:00:00',5000,'photos/syWP244GMfo88pBBkoVN1MLCDs7j77wEGloL7gEE.jpg',NULL,'2024-08-22 09:57:58','2024-08-22 15:22:43');
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guides`
--

DROP TABLE IF EXISTS `guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guides_user_id_foreign` (`user_id`),
  CONSTRAINT `guides_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guides`
--

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
INSERT INTO `guides` VALUES (1,'Guide générale','test etape',1,NULL,'2024-08-24 08:09:13','2024-08-24 08:09:13');
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (19,'0001_01_01_000000_create_users_table',1),(20,'0001_01_01_000001_create_cache_table',1),(21,'0001_01_01_000002_create_jobs_table',1),(22,'2024_08_08_182336_create_etapes_table',1),(23,'2024_08_08_182451_create_guides_table',1),(24,'2024_08_08_183212_create_categories_table',1),(25,'2024_08_08_185234_create_secteur_activites_table',1),(26,'2024_08_08_190435_ajout_attribut_to_users_table',1),(27,'2024_08_08_190909_create_ressources_table',1),(28,'2024_08_08_191828_create_discussions_table',1),(29,'2024_08_08_192006_create_commentaires_table',1),(30,'2024_08_08_192622_create_retour_experiences_table',1),(31,'2024_08_08_192922_create_evenements_table',1),(32,'2024_08_08_193253_create_reservations_table',1),(33,'2024_08_08_193731_create_notifications_table',1),(34,'2024_08_09_094532_create_personal_access_tokens_table',1),(35,'2024_08_09_144941_create_permission_tables',1),(36,'2024_08_13_052323_create_accompagnement_personnalises_table',1),(37,'2024_08_24_080015_guides',2),(38,'2024_08_24_080225_etapes',3),(39,'2024_08_24_084031_modify_etapes_table',4),(40,'2024_08_24_084338_etapes',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(1,'App\\Models\\User',3),(2,'App\\Models\\User',3),(3,'App\\Models\\User',4),(2,'App\\Models\\User',10),(3,'App\\Models\\User',11),(3,'App\\Models\\User',12),(2,'App\\Models\\User',13),(2,'App\\Models\\User',14);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evenement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_evenement_id_foreign` (`evenement_id`),
  CONSTRAINT `notifications_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'activer_user','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(2,'desactiver_user','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(3,'lister_users','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(4,'supprimer_user','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(5,'changer_role','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(6,'lister_roles','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(7,'ajouter_role','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(8,'supprimer_role','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(9,'modifier_role','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(10,'lister_permissions','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(11,'ajouter_permission','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(12,'supprimer_permission','api','2024-08-13 09:59:00','2024-08-13 09:59:00'),(13,'modifier_permission','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(14,'ajouter_evenement','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(15,'modifier_evenement','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(16,'supprimer_evenement','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(17,'lister_evenements_supprimés','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(18,'restaurer_evenement_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(19,'supprimer_evenement_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(20,'supprimer_discussion','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(21,'supprimer_commentaire','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(22,'ajouter_retour_experience','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(23,'modifier_retour_experience','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(24,'supprimer_retour_experience','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(25,'ajouter_guide','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(26,'modifier_guide','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(27,'supprimer_guide','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(28,'lister_resersations','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(29,'confirmer_reservation','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(30,'refuser_reservation','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(31,'lister_retours_experiences_supprimés','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(32,'restaurer_retour_experience_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(33,'supprimer_retour_experience_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(34,'lister_guides_supprimés','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(35,'restaurer_guide_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(36,'supprimer_guide_supprimé','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(37,'ajouter_etape','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(38,'ajouter_ressource','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(39,'modifier_ressource','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(40,'supprimer_ressource','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(41,'lister_ressources_supprimées','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(42,'restaurer_ressource_supprimée','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(43,'supprimer_ressource_supprimée','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(46,'TEST4558','api','2024-08-20 13:30:43','2024-08-20 14:05:37');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('en_attente','accepte','refuse') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `user_id` bigint unsigned NOT NULL,
  `evenement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_user_id_foreign` (`user_id`),
  KEY `reservations_evenement_id_foreign` (`evenement_id`),
  CONSTRAINT `reservations_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,'accepte',4,2,'2024-08-13 11:24:32','2024-08-21 13:20:00'),(2,'accepte',1,2,'2024-08-13 11:28:39','2024-08-22 09:23:17'),(3,'refuse',3,2,'2024-08-21 12:27:31','2024-08-23 16:53:07'),(4,'accepte',2,3,'2024-08-21 12:28:00','2024-08-21 13:25:24'),(5,'accepte',1,4,'2024-08-21 12:28:18','2024-08-22 09:12:08'),(6,'en_attente',13,2,'2024-08-23 10:15:01','2024-08-23 10:16:50'),(7,'accepte',13,2,'2024-08-23 16:39:11','2024-08-23 16:49:20'),(8,'en_attente',4,4,'2024-08-24 15:16:29','2024-08-24 15:16:29'),(9,'en_attente',4,5,'2024-08-24 15:23:46','2024-08-24 15:23:46');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ressources`
--

DROP TABLE IF EXISTS `ressources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ressources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ressources_categorie_id_foreign` (`categorie_id`),
  KEY `ressources_user_id_foreign` (`user_id`),
  CONSTRAINT `ressources_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ressources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ressources`
--

LOCK TABLES `ressources` WRITE;
/*!40000 ALTER TABLE `ressources` DISABLE KEYS */;
INSERT INTO `ressources` VALUES (1,'Les débuts d\'un entrepreneur','contenu/8oQE5rVjnIHtKbddKS4KSiJ983WL0PQtNfGNByG5.pdf','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','photos/Hbvv5nv8NwnVh2YFt0U0ZP3ngJajgiGXJEaqqksQ.jpg',1,3,NULL,'2024-08-13 12:13:46','2024-08-23 16:56:21'),(3,'Les méthodes à maîtriser pour bien entreprendre','contenu/zTKR6C6LK91FN1IqeggILwXw6E5fjgvMgdZ3ACmw.pdf','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','photos/3nJc6Ms4J9kdYIfvS05FqAqe8KnxOJLOHKKMDCCX.jpg',2,3,NULL,'2024-08-13 12:26:56','2024-08-22 16:06:45'),(5,'test Ressource','contenu/DQpJJyQCZzH9FwKUm4jxVBTKqy2crmjL4yRkkv5N.pdf','test description','photos/WWW6ki2Y53398cGACkyBLq829dqlMCk8GIwXarTK.jpg',1,2,NULL,'2024-08-23 07:44:58','2024-08-23 09:05:12'),(6,'test modif','contenu/vnvKruQxa5EbyWEHfwCoZShlcIzSoiCN7LS9gj0S.pdf','desc','photos/c5UL0TX1YObNOH6YDxqoaXcKubKWyiLScKvQS9pZ.png',1,2,NULL,'2024-08-23 07:47:48','2024-08-23 08:38:49'),(7,'test Ressource','contenu/D74FG1EZ8BCnpsuwL2ZtoI2nAG6yk22dcnVDKjba.pdf','test','photos/Wu9L22x6Vglo4Xp7nemtDvvBcnZ5rCnqZ29ssIvG.jpg',2,2,NULL,'2024-08-23 08:21:32','2024-08-23 08:21:32'),(8,'test Ressourcejj','contenu/0XqsZPpiUGyTE9uQgFVJBVp1nZ28E21lD5HWgiYv.pdf','test','photos/yJC39KzmFByJowzXiGbiJyWud9FoophV2TFIMb94.jpg',2,2,NULL,'2024-08-23 09:06:12','2024-08-23 09:06:12');
/*!40000 ALTER TABLE `ressources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retour_experiences`
--

DROP TABLE IF EXISTS `retour_experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retour_experiences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retour_experiences_user_id_foreign` (`user_id`),
  CONSTRAINT `retour_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retour_experiences`
--

LOCK TABLES `retour_experiences` WRITE;
/*!40000 ALTER TABLE `retour_experiences` DISABLE KEYS */;
INSERT INTO `retour_experiences` VALUES (1,'Babacar Ngom : Alimenteur sénégalais','photos/ItzOUYYAdHOK7r5eWzbSzqtBG1RR2ZskQeKQE1AN.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,',1,NULL,'2024-08-13 11:45:28','2024-08-21 09:03:47'),(3,'Témoignage d\'Anna Marone - Les clés de ma réussite dans le monde l’entreprenariat','photos/nhHWyDVwfvW2AbIP2BrHaqcOxAQrPQjr1kgzIWqM.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,',1,NULL,NULL,'2024-08-20 15:48:02'),(4,'test libellé','photos/9pghX29lhM1oDDPp1yb4nzu2ISaM1yfsgEuSBIu2.jpg','test contenu',1,'2024-08-20 22:41:52','2024-08-20 22:29:06','2024-08-20 22:41:52'),(5,'test libellé','photos/jGAtjMU4a72hGvPWfCAiqVTh9VmcPJ1tYk7SzoWb.png','test',1,'2024-08-20 22:44:09','2024-08-20 22:42:24','2024-08-20 22:44:09'),(6,'Sadio Mane le parcours d\'un homme incroyable','photos/gFdyaOXTWqVl8ic7EtdNKKTELCJc61nQf2fXD2sG.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,',1,NULL,'2024-08-20 22:54:36','2024-08-20 23:03:25'),(7,'test libellé','photos/yaIhPAV8vPm8Pp7IYZWdrIukYTnrCiPNKSto6uXf.png','test',1,'2024-08-20 23:05:08','2024-08-20 23:04:43','2024-08-20 23:05:08');
/*!40000 ALTER TABLE `retour_experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','api','2024-08-13 09:59:01','2024-08-13 09:59:01'),(2,'coach','api','2024-08-13 09:59:01','2024-08-13 10:49:46'),(3,'entrepreneur','api','2024-08-13 09:59:01','2024-08-13 09:59:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur_activites`
--

DROP TABLE IF EXISTS `secteur_activites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur_activites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur_activites`
--

LOCK TABLES `secteur_activites` WRITE;
/*!40000 ALTER TABLE `secteur_activites` DISABLE KEYS */;
INSERT INTO `secteur_activites` VALUES (1,'Technologie de l\'information (IT)','Ce secteur englobe les entreprises qui développent, fabriquent, ou maintiennent des systèmes informatiques, logiciels, et services. Il comprend des domaines comme le développement de logiciels, la cybersécurité, les télécommunications, et le cloud computing.',NULL,'2024-08-13 10:10:09',NULL),(2,'Santé et Bien-être','Ce secteur comprend les hôpitaux, cliniques, laboratoires de recherche, sociétés pharmaceutiques, et entreprises de produits de santé et de bien-être. Il se concentre sur la fourniture de soins médicaux, le développement de médicaments, et la promotion d\'un mode de vie sain.',NULL,'2024-08-13 10:10:39',NULL),(3,'Éducation et Formation','Englobant les établissements scolaires, universités, organismes de formation, et plateformes d\'apprentissage en ligne, ce secteur se concentre sur l\'enseignement, la formation continue, et le développement des compétences.',NULL,NULL,NULL),(4,'Finance et Assurance','Ce secteur comprend les banques, compagnies d\'assurance, sociétés de gestion d\'actifs, et autres institutions financières. Il est centré sur la gestion des investissements, la fourniture de crédits, les assurances, et autres services financiers.',NULL,NULL,NULL),(5,'Commerce de détail et Distribution','Le secteur du commerce de détail concerne les entreprises qui vendent des biens directement aux consommateurs. Il comprend des magasins physiques, des plateformes de commerce électronique, et des chaînes de distribution.',NULL,NULL,NULL),(6,'Agriculture et Agroalimentaire','Ce secteur comprend la production agricole, la transformation des aliments, et la distribution de produits alimentaires. Il englobe aussi les technologies agricoles, la pêche, et l\'élevage.',NULL,'2024-08-13 10:12:26',NULL),(7,'Bâtiment et Travaux Publics (BTP)','Ce secteur comprend les entreprises de construction, d\'ingénierie, et de travaux publics. Il est responsable de la construction de bâtiments, d\'infrastructures, et d\'autres projets de grande envergure.',NULL,NULL,NULL),(8,'Transport et Logistique','Ce secteur concerne les services de transport de marchandises et de personnes, ainsi que la gestion des chaînes d\'approvisionnement. Il inclut les compagnies aériennes, maritimes, ferroviaires, et les entreprises de livraison.',NULL,NULL,NULL),(9,'Immobilier','Le secteur immobilier concerne la vente, l\'achat, la location, et la gestion de biens immobiliers, tels que des terrains, des maisons, et des immeubles commerciaux.',NULL,'2024-08-13 10:13:31',NULL);
/*!40000 ALTER TABLE `secteur_activites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('kwvBuF1vIiYKMgB0LaVFdia3gw5t49LEt8YJuMh1',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:129.0) Gecko/20100101 Firefox/129.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoieFJIdlhTdGZGMDF6MVZmYlhuN3gxYzZSUTA2dEZvdFVtc1B4RmFpTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1724106356);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `secteur_activite_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_secteur_activite_id_foreign` (`secteur_activite_id`),
  CONSTRAINT `users_secteur_activite_id_foreign` FOREIGN KEY (`secteur_activite_id`) REFERENCES `secteur_activites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mouhammad','ndourmouhammad15@gmail.com',NULL,'$2y$12$HSWEtgJCEHFHFo0yTILiAOBfJrrulCuMtwjHTjafop7Iw8VeklySy','photos/9P7wzOyZkGH85hZBA33PTMRhD3bGDeFVc1Mh4qeM.png','Rufisque','767569711',1,'cvs/d8UTil1bt9eW78MGBM5uGCyPm0YGU4EzCAp5temU.pdf',NULL,'2024-08-13 10:13:53','2024-08-24 09:51:51',3),(2,'Babou Ndong','ndongba01@gmail.com',NULL,'$2y$12$Hm9aAvbsRh04tdn4YT4rEef8eSjXo.zPkyrqX/Z3R8MnmthuyPYCy','public/photos/YkBhO2CGehxkaEBPzygJd57FnMTXBaSCiUQsS1xz.jpg','Keur Mbaye Fall','775057484',1,'public/cv/l9ECWLYRwUT0RMrzOEcO8FRTdAd3rVdm6YjEksUZ.pdf',NULL,'2024-08-13 10:29:34','2024-08-13 10:29:34',3),(3,'Fatoumata Dansoko','fatoumatadansoko61@gmail.com',NULL,'$2y$12$lOfb6bNN9AyABYdeEmuISe3By/ZSse38MQnECFeY/gXI.basaJf2.','photos/2Ueb5rl9z5fTwCbJpl4DX92D5jJSbMQNuoZQZq7O.jpg','Rufisque','767569725',1,'cvs/J2krDchF4J3iraDVz5OThPuxL2uigIUW2pb1X4mV.pdf',NULL,'2024-08-13 10:32:16','2024-08-19 22:50:18',1),(4,'Anna Marone','annamarone72@gmail.com',NULL,'$2y$12$G5IoPxJWFFD6jTtNzTDj7uxf48iuhI6yLc9dkkErgLYnyyC16H4yG','photos/3ByNyuBrhQO533LhREc5fJBcFgmnt809eNPU7qft.jpg','Dakar','784615847',1,'public/cv/YuAznF95otWcoZEhbYusadMbrFgd5WmRt3W9ekAO.pdf',NULL,'2024-08-13 10:33:38','2024-08-24 10:44:48',9),(12,'bineta','binette@gmail.com',NULL,'$2y$12$lRjk6yYtxxj83/DYAzoDmu8goYsT7bmUNO15pwItzb.dXyXnhQVMq','photos/bYSczkUQefQ0hnAS9GKmNcdu4D2OUeqlfiqjyWCD.jpg','Thiawlene','784615842',1,'public/cv/XlGhqQ9yDukWEurgocOqzSl9K0sOgtuhdRPBEADI.pdf',NULL,'2024-08-19 23:29:06','2024-08-19 23:30:04',2),(13,'Mouhammad','mou.ndour@isepdiamniadio.edu.sn',NULL,'$2y$12$f22I7WI2UCTtUlxCtYG0RujWpe5TH38UCeedwhnsA56S.JayrhvAm','photos/T5j9nm8TeDw72ygaRf7Inb4KZd1rVUhnLe7AxHnC.jpg','Thiawlene','784615840',1,'cvs/pYSy6VI60ECWtIq4T4GEKNiVQxUWCmxYdASr5ZsS.pdf',NULL,'2024-08-23 10:11:45','2024-08-23 10:12:04',2),(14,'Aisse BA','ba@gmail.com',NULL,'$2y$12$bp38Cm.Vo5ebqGbrcazSquezb2X6EI.hgcojSLT2TT/coPWoaT.eu','photos/Ww7CEfnIjiJNYeU9HD9TjrWI8N58G3VDHUHROz9m.jpg','Yoff','780136587',0,'cvs/bv9WTooLkquUb9A0QGTxJL4gBXWNCtzkvJ9FUM1z.pdf',NULL,'2024-08-24 05:48:49','2024-08-24 05:48:49',1);
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

-- Dump completed on 2024-08-25  8:34:20

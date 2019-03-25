CREATE DATABASE  IF NOT EXISTS `127605_0` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `127605_0`;
-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: 127605_0
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_04_10_000000_create_users_table',1),(2,'2017_04_10_000001_create_password_resets_table',1),(3,'2017_04_10_000002_create_social_accounts_table',1),(4,'2017_04_10_000003_create_roles_table',1),(5,'2017_04_10_000004_create_users_roles_table',1),(6,'2017_06_16_000005_create_protection_validations_table',1),(7,'2017_06_16_000006_create_protection_shop_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(45) DEFAULT NULL,
  `size` varchar(5000) DEFAULT NULL,
  `wood` varchar(45) DEFAULT NULL,
  `glue` varchar(45) DEFAULT NULL,
  `bottomprint` varchar(45) DEFAULT NULL,
  `topprint` varchar(45) DEFAULT NULL,
  `engravery` varchar(45) DEFAULT NULL,
  `veneer` varchar(5000) DEFAULT NULL,
  `extra` varchar(5000) DEFAULT NULL,
  `cardboard` varchar(45) DEFAULT NULL,
  `carton` varchar(45) DEFAULT NULL,
  `perdeck` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `concave` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `submit` int(11) DEFAULT '0',
  `fixedprice` varchar(45) DEFAULT NULL,
  `saved_date` timestamp NULL DEFAULT NULL,
  `usenow` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (16,'100','7.875\" x 31.3\" (G2: WB14.02\": N6.75\", T6.36\")','American Maple Wood','Epoxy Glue',NULL,'img-cp-logo-full.png.png',NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'18.65','3392.5','Mediumn Concave','10','2019-03-18 17:51:48','2019-03-20 13:33:26',NULL,0,NULL,NULL,NULL),(17,'50','7.5\" x 31.25\" (D3: WB14.02\": N6.73\", T6.34\")','American Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'14.65','732.5','Deep Concave','10','2019-03-18 18:02:50','2019-03-19 08:48:17',NULL,0,NULL,NULL,NULL),(19,'100','7.5\" x 31\" (D2: WB14.02\": N6.59\", T6.20\")','European Maple Wood','American Glue',NULL,NULL,NULL,'[\"orange\",\"brown\",\"natural\",\"light blue\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'15.899999999999999','1589.9999999999998','Mediumn Concave','10','2019-03-21 04:12:00','2019-03-25 00:05:32',NULL,0,'0',NULL,NULL),(20,'50','7.375\" x 30\" (C1: WB12.81\" : N6.81\" , T6.18\" )','European Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'13.9','695','Mediumn Concave','10','2019-03-24 20:51:17','2019-03-25 00:27:42',NULL,0,'0','2019-03-25 00:27:42',0),(22,'50','7.375\" x 30\" (C1: WB12.81\" : N6.81\" , T6.18\" )','European Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'13.9','695','Mediumn Concave','10','2019-03-24 20:51:17','2019-03-25 01:34:25',NULL,1,'0','2019-03-25 01:34:25',0),(24,'50','7.375\" x 30\" (C1: WB12.81\" : N6.81\" , T6.18\" )','European Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'13.9','695','Mediumn Concave','10','2019-03-24 20:51:17','2019-03-25 01:40:03',NULL,0,'0','2019-03-25 01:40:03',0),(25,'100','7.375\" x 30\" (C1: WB12.81\" : N6.81\" , T6.18\" )','European Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'13.4','1340','Mediumn Concave','10','2019-03-24 20:51:17','2019-03-25 01:43:04',NULL,0,'0','2019-03-25 01:43:04',0),(26,'50','7.375\" x 30\" (C1: WB12.81\" : N6.81\" , T6.18\" )','European Maple Wood','Epoxy Glue',NULL,NULL,NULL,'[\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\",\"natural\"]','{\"fulldip\":{\"state\":true,\"color\":\"\"},\"transparent\":{\"state\":false,\"color\":\"\"},\"metallic\":{\"state\":false,\"color\":\"\"},\"blacktop\":{\"state\":false},\"blackmidlayer\":{\"state\":false},\"pattern\":{\"state\":false}}',NULL,NULL,'13.9','695','Mediumn Concave','10','2019-03-24 20:51:17','2019-03-25 00:27:42',NULL,0,'0',NULL,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protection_shop_tokens`
--

DROP TABLE IF EXISTS `protection_shop_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protection_shop_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pst_unique` (`user_id`,`success_url`,`cancel_url`),
  KEY `protection_shop_tokens_number_index` (`number`),
  KEY `protection_shop_tokens_expires_index` (`expires`),
  CONSTRAINT `pst_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protection_shop_tokens`
--

LOCK TABLES `protection_shop_tokens` WRITE;
/*!40000 ALTER TABLE `protection_shop_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection_shop_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protection_validations`
--

DROP TABLE IF EXISTS `protection_validations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protection_validations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ttl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validation_result` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user` (`user_id`),
  KEY `protection_validations_ttl_index` (`ttl`),
  CONSTRAINT `pv_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protection_validations`
--

LOCK TABLES `protection_validations` WRITE;
/*!40000 ALTER TABLE `protection_validations` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection_validations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator',0),(2,'authenticated',0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ship_infos`
--

DROP TABLE IF EXISTS `ship_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ship_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_company` varchar(45) DEFAULT NULL,
  `invoice_name` varchar(45) DEFAULT NULL,
  `invoice_country` varchar(45) DEFAULT NULL,
  `invoice_taxid` varchar(45) DEFAULT NULL,
  `shipping_company` varchar(45) DEFAULT NULL,
  `shipping_address` varchar(45) DEFAULT NULL,
  `shipping_city` varchar(45) DEFAULT NULL,
  `shipping_state` varchar(45) DEFAULT NULL,
  `shipping_postcode` varchar(45) DEFAULT NULL,
  `shipping_contactperson` varchar(45) DEFAULT NULL,
  `shipping_phone` varchar(45) DEFAULT NULL,
  `shipping_country` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ship_infos`
--

LOCK TABLES `ship_infos` WRITE;
/*!40000 ALTER TABLE `ship_infos` DISABLE KEYS */;
INSERT INTO `ship_infos` VALUES (1,'Test','Test Test','Test','TestTest123','Test To Test','test','test','teste','teste','test','230912830192','test',NULL,NULL,NULL,NULL),(2,'Test','Test Test','Test','TestTest123','Test To Test','test','test','teste','teste','test','230912830192','test',NULL,NULL,NULL,NULL),(3,'test','test','test','test','test','test','test','test','test','test','34234234','stes',NULL,NULL,NULL,NULL),(4,'tttt','ttt','ewer','qwerqewr','qwerq','qwer','qwer','qwer','qwer','qwer',NULL,'qwer','YkTXhUycFR8ILjtQeyXJLHAYvWMcswCZ2Hs5WHO2',NULL,'2019-03-14 05:48:05',NULL),(5,'Test','Test','Test','Test','Test','Test','Test','Test','Test','Test','2334234234','Test','10',NULL,NULL,NULL);
/*!40000 ALTER TABLE `ship_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_provider_provider_id_index` (`user_id`,`provider`,`provider_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin.laravel@labs64.com','$2y$10$J1rwtTEmxGzHE3TDsCi1n.P0U8z348o2xcVCP3OhcivvTxXYuTszu',1,'ed4c8483-feae-4d70-aae4-fdbe0674854f',1,NULL,'2019-03-11 13:23:13','2019-03-11 13:23:13',NULL,NULL,NULL,NULL),(2,'Demo','demo.laravel@labs64.com','$2y$10$OXl4eyUujEefQ9axTsagyu3mCIec8uaI/C24Mgv2V7aJb7/ZZSlA6',1,'3e6c6bcf-abd4-4d6b-8683-17332086717c',1,NULL,'2019-03-11 13:23:13','2019-03-11 13:23:13',NULL,NULL,NULL,NULL),(10,'Edy','luckygolden0505@gmail.com','$2y$10$mjdT08lYTfrM2h4a2bY5v.iMn0QFS2MFrTw4lf2ZMPzXeKJMuNnoW',1,'b90b0114-f4cc-4903-906a-abe8f525ed4b',1,'nwnz9Akee1hg4HXaDRi81dZYvGNS5nrUZlx674TRIkFMvAyUkzIMy3YczeWD','2019-03-15 14:41:04','2019-03-16 01:39:24',NULL,'Own','CEO','3423423423');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `users_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `foreign_role` (`role_id`),
  CONSTRAINT `foreign_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(1,2),(2,2),(10,2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-25  1:04:41

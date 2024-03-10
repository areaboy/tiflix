-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: livestream_db
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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'TV-Shows'),(2,'Movies'),(3,'Documentaries');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_like`
--

DROP TABLE IF EXISTS `comment_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentid` int(11) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `like_count` varchar(100) DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_like`
--

LOCK TABLES `comment_like` WRITE;
/*!40000 ALTER TABLE `comment_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `comment_approve` int(3) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `reply_count` varchar(20) DEFAULT NULL,
  `t_like` varchar(30) DEFAULT NULL,
  `verified` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,6,1,'nice video','1709932017','Friday, March 8, 2024, 5:06 pm','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','4','Richard More','https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/5068237865e9b6a83da901709815464.2426annball4.png',0,NULL,'0','0','no');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(255) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `user_rank` varchar(100) DEFAULT NULL,
  `reciever_id` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_seo` varchar(200) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'1','65e9abb3dfbc21709812659b8b07bfeae1efc35214002a40d2f3d72','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709812659','tit1','tit1-1709812659',NULL,NULL),(2,'2','65e9afa0414961709813664da6590196f7bbc4c97a86630ba624386','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709813664','tit2','tit2-1709813664',NULL,NULL),(3,'2','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','Richard More','https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/5068237865e9b6a83da901709815464.2426annball4.png','Member','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post_like','1709821067','tit2','tit2-1709813664',NULL,NULL),(4,'3','65eb45389b6f217099174964a9db1a90d2a4d125807b7ae9bc9be4f','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709917496','tit','tit-1709917496',NULL,NULL),(5,'3','65eb45389b6f217099174964a9db1a90d2a4d125807b7ae9bc9be4f','Esedo Fredrick','admin.png','Subscriber','65e9b32ca6eb7170981457219ed3d02e7f3492f126d7d57fe854643','unread','post','1709917496','tit','tit-1709917496',NULL,NULL),(6,'3','65eb45389b6f217099174964a9db1a90d2a4d125807b7ae9bc9be4f','Esedo Fredrick','admin.png','Subscriber','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','unread','post','1709917496','tit','tit-1709917496',NULL,NULL),(7,'3','65eb45389b6f217099174964a9db1a90d2a4d125807b7ae9bc9be4f','Esedo Fredrick','admin.png','Subscriber','65eafc0ecc9fc1709898766da1f305bff1b77efafca959b92811fdc','unread','post','1709917496','tit','tit-1709917496','afe92dc7-dab5-467c-86bb-6d76d36727f2/annball4.png','image/png'),(8,'3','65eb45389b6f217099174964a9db1a90d2a4d125807b7ae9bc9be4f','Esedo Fredrick','admin.png','Subscriber','65eafca878fd51709898920708e36c2b38a4cf66e8d8ecfd357bcc1','unread','post','1709917496','tit','tit-1709917496','fa2e806b-ec95-4b48-85a2-59612280c05c/video_bushfire.mp4','video/mp4'),(9,'4','65eb49d6a7e411709918678f72cdaefc0218e8a642c227b0d785aa0','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709918678','tit','tit-1709918678',NULL,NULL),(10,'4','65eb49d6a7e411709918678f72cdaefc0218e8a642c227b0d785aa0','Esedo Fredrick','admin.png','Subscriber','65e9b32ca6eb7170981457219ed3d02e7f3492f126d7d57fe854643','unread','post','1709918678','tit','tit-1709918678',NULL,NULL),(11,'4','65eb49d6a7e411709918678f72cdaefc0218e8a642c227b0d785aa0','Esedo Fredrick','admin.png','Subscriber','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','unread','post','1709918678','tit','tit-1709918678',NULL,NULL),(12,'4','65eb49d6a7e411709918678f72cdaefc0218e8a642c227b0d785aa0','Esedo Fredrick','admin.png','Subscriber','65eafc0ecc9fc1709898766da1f305bff1b77efafca959b92811fdc','unread','post','1709918678','tit','tit-1709918678',NULL,NULL),(13,'4','65eb49d6a7e411709918678f72cdaefc0218e8a642c227b0d785aa0','Esedo Fredrick','admin.png','Subscriber','65eafca878fd51709898920708e36c2b38a4cf66e8d8ecfd357bcc1','unread','post','1709918678','tit','tit-1709918678',NULL,NULL),(14,'5','65eb54258afeb1709921317e007e4586b21ba278b01b6029b3b7793','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709921317','vitttt','vitttt-1709921317',NULL,NULL),(15,'5','65eb54258afeb1709921317e007e4586b21ba278b01b6029b3b7793','Esedo Fredrick','admin.png','Subscriber','65e9b32ca6eb7170981457219ed3d02e7f3492f126d7d57fe854643','unread','post','1709921317','vitttt','vitttt-1709921317',NULL,NULL),(16,'5','65eb54258afeb1709921317e007e4586b21ba278b01b6029b3b7793','Esedo Fredrick','admin.png','Subscriber','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','unread','post','1709921317','vitttt','vitttt-1709921317',NULL,NULL),(17,'5','65eb54258afeb1709921317e007e4586b21ba278b01b6029b3b7793','Esedo Fredrick','admin.png','Subscriber','65eafc0ecc9fc1709898766da1f305bff1b77efafca959b92811fdc','unread','post','1709921317','vitttt','vitttt-1709921317',NULL,NULL),(18,'5','65eb54258afeb1709921317e007e4586b21ba278b01b6029b3b7793','Esedo Fredrick','admin.png','Subscriber','65eafca878fd51709898920708e36c2b38a4cf66e8d8ecfd357bcc1','unread','post','1709921317','vitttt','vitttt-1709921317',NULL,NULL),(19,'6','65eb57720a8001709922162c808c43e80c75302febfe77195c54770','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709922162','vi tit new','vi-tit-new-1709922162',NULL,NULL),(20,'6','65eb57720a8001709922162c808c43e80c75302febfe77195c54770','Esedo Fredrick','admin.png','Subscriber','65e9b32ca6eb7170981457219ed3d02e7f3492f126d7d57fe854643','unread','post','1709922162','vi tit new','vi-tit-new-1709922162',NULL,NULL),(21,'6','65eb57720a8001709922162c808c43e80c75302febfe77195c54770','Esedo Fredrick','admin.png','Subscriber','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','unread','post','1709922162','vi tit new','vi-tit-new-1709922162',NULL,NULL),(22,'6','65eb57720a8001709922162c808c43e80c75302febfe77195c54770','Esedo Fredrick','admin.png','Subscriber','65eafc0ecc9fc1709898766da1f305bff1b77efafca959b92811fdc','unread','post','1709922162','vi tit new','vi-tit-new-1709922162',NULL,NULL),(23,'6','65eb57720a8001709922162c808c43e80c75302febfe77195c54770','Esedo Fredrick','admin.png','Subscriber','65eafca878fd51709898920708e36c2b38a4cf66e8d8ecfd357bcc1','unread','post','1709922162','vi tit new','vi-tit-new-1709922162',NULL,NULL),(24,'6','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','Richard More','https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/5068237865e9b6a83da901709815464.2426annball4.png','Member','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','comment','1709932017','vi tit new','vi-tit-new-1709922162',NULL,NULL),(25,'7','65eb85c2c4f2e1709934018326ce6a33b2c97168659e7149bb606bf','Esedo Fredrick','admin.png','Subscriber','65e99c34491801709808692ad36c44fc4b110162941c960176f18a1','unread','post','1709934018','v22','v22-1709934018',NULL,NULL),(26,'7','65eb85c2c4f2e1709934018326ce6a33b2c97168659e7149bb606bf','Esedo Fredrick','admin.png','Subscriber','65e9b32ca6eb7170981457219ed3d02e7f3492f126d7d57fe854643','unread','post','1709934018','v22','v22-1709934018',NULL,NULL),(27,'7','65eb85c2c4f2e1709934018326ce6a33b2c97168659e7149bb606bf','Esedo Fredrick','admin.png','Subscriber','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','unread','post','1709934018','v22','v22-1709934018',NULL,NULL),(28,'7','65eb85c2c4f2e1709934018326ce6a33b2c97168659e7149bb606bf','Esedo Fredrick','admin.png','Subscriber','65eafc0ecc9fc1709898766da1f305bff1b77efafca959b92811fdc','unread','post','1709934018','v22','v22-1709934018',NULL,NULL),(29,'7','65eb85c2c4f2e1709934018326ce6a33b2c97168659e7149bb606bf','Esedo Fredrick','admin.png','Subscriber','65eafca878fd51709898920708e36c2b38a4cf66e8d8ecfd357bcc1','unread','post','1709934018','v22','v22-1709934018',NULL,NULL),(30,'8','65ed13c036f1317100359043d26ecc6d72c7db4bd6db23c026e184b','Richard Cool','admin.png','Subscriber','65ed134200ae617100357776b527ec4b6d7d7bab642315493f240bc','unread','post','1710035904','Bush Fire','Bush-Fire-1710035904',NULL,NULL);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_like`
--

DROP TABLE IF EXISTS `post_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `like_count` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_like`
--

LOCK TABLES `post_like` WRITE;
/*!40000 ALTER TABLE `post_like` DISABLE KEYS */;
INSERT INTO `post_like` VALUES (1,2,1,'1','1709821067','Thursday, March 7, 2024, 10:17 am','65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','4','Richard More','https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/5068237865e9b6a83da901709815464.2426annball4.png');
/*!40000 ALTER TABLE `post_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_seo` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `userphoto` text DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  `total_comments` varchar(100) DEFAULT NULL,
  `data_type` varchar(100) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `t_like` varchar(20) DEFAULT NULL,
  `t_share` varchar(20) DEFAULT NULL,
  `t_view` varchar(20) DEFAULT NULL,
  `verified` varchar(20) DEFAULT NULL,
  `ban` varchar(30) DEFAULT NULL,
  `video_category` varchar(100) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentid` int(11) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `reply_approve` int(3) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `verified` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bucketname_image` varchar(200) DEFAULT NULL,
  `bucketname_video` varchar(200) DEFAULT NULL,
  `aws_api_key` text DEFAULT NULL,
  `aws_api_secret` text DEFAULT NULL,
  `data_type` varchar(100) DEFAULT NULL,
  `square_accesstoken` text DEFAULT NULL,
  `square_business_location_id` varchar(100) DEFAULT NULL,
  `square_enviroment` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `smtp_email_host` varchar(100) DEFAULT NULL,
  `smtp_email_username` varchar(100) DEFAULT NULL,
  `smtp_email_password` varchar(100) DEFAULT NULL,
  `smtp_email_port` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'app-bucket-image1688213325','app-bucket-video1688213325','xxxx','xxxxx','Amazon_S3_Cloud_Storage',NULL,NULL,NULL,'us-east-2',NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,'Mail',NULL,NULL,NULL,NULL,'mail.fredjarsoft.com','xxx','xxxx','587'),(3,NULL,NULL,NULL,NULL,'Square_Payments','xxxxxxxxxxxx','L7TSN60GBF3DR','connect.squareupsandbox.com',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_site`
--

DROP TABLE IF EXISTS `settings_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` text DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `site_keywords` text DEFAULT NULL,
  `header_color` varchar(100) DEFAULT NULL,
  `footer_color` varchar(100) DEFAULT NULL,
  `day_pay` varchar(100) DEFAULT NULL,
  `month_pay` varchar(100) DEFAULT NULL,
  `year_pay` varchar(100) DEFAULT NULL,
  `site_display` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_site`
--

LOCK TABLES `settings_site` WRITE;
/*!40000 ALTER TABLE `settings_site` DISABLE KEYS */;
INSERT INTO `settings_site` VALUES (1,'https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/4209730365e9b288d18201709814408.8581logo.png','Tiflix','A Full Customizable Zero Code Video Streaming Payments Services that allow users to Pay and Watch Online Videos Powered by TiDB Cloud Database, Videojs P2p Video Javascript SDK , Amazon S3 Cloud Storage and Square Payment API System ','Video Streaming Site, Video Watching Site','#800080','#400040','10','20','30','horizontal');
/*!40000 ALTER TABLE `settings_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` text DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `sub_type` varchar(100) DEFAULT NULL,
  `sub_plan` varchar(100) DEFAULT NULL,
  `hour_convert` varchar(200) DEFAULT NULL,
  `day_convert` varchar(200) DEFAULT NULL,
  `start_timestamp` varchar(200) DEFAULT NULL,
  `end_timestamp` varchar(200) DEFAULT NULL,
  `sender_address` text DEFAULT NULL,
  `invoice_id` text DEFAULT NULL,
  `invoice_amount` varchar(100) DEFAULT NULL,
  `invoice_url` text DEFAULT NULL,
  `invoice_status` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `timing` varchar(30) DEFAULT NULL,
  `sub_status` varchar(30) DEFAULT NULL,
  `sub_value` varchar(30) DEFAULT NULL,
  `watch_video_count` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (1,'65e9b6a83da90170981546498e77784f7bcdcbbb6b78c3c07e96f32','Richard More','https://app-bucket-image1688213325.s3.us-east-2.amazonaws.com/5068237865e9b6a83da901709815464.2426annball4.png','Monthly Plan','month','728','30','2024-03-07 13:03:21','2024-04-06 21:45:21','Square Invoice Payments','inv:0-ChCa72rO_JCIcxnyEgN7Od7XEM4N','20','https://squareupsandbox.com/pay-invoice/inv:0-ChCa72rO_JCIcxnyEgN7Od7XEM4N','PAID','Paid','1709815526','Active','0','0');
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testing`
--

DROP TABLE IF EXISTS `testing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testing`
--

LOCK TABLES `testing` WRITE;
/*!40000 ALTER TABLE `testing` DISABLE KEYS */;
INSERT INTO `testing` VALUES (1,'$result'),(2,'../../data\\c375cc5b-500e-4e5e-a241-f64f5a305808\\Annball3.png'),(3,'083ff38e-19d3-4e84-88ce-10df7ce0b543/AnnBall.png'),(4,'b8f4f954-219c-4ab4-a976-3edeb87c9f7b/video_bushfire.mp4'),(5,'4dbce5b4-23e0-4ace-b350-0bdd522873db/AnnBall.png'),(6,'a26f8da5-ddde-4f6a-9b06-60583340b21b/AnnBall.png'),(7,'985d01fa-1f15-4fbd-a3ba-9517b926bf86/Annball3.png'),(8,'985d01fa-1f15-4fbd-a3ba-9517b926bf86/Annball3.png'),(9,'985d01fa-1f15-4fbd-a3ba-9517b926bf86/Annball3.png'),(10,'67db07bc-e365-4e8e-8b83-6b0f44b4c771/AnnBall.png');
/*!40000 ALTER TABLE `testing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_time` varchar(200) DEFAULT NULL,
  `timing` varchar(200) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `data` varchar(30) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `userid` varchar(300) DEFAULT NULL,
  `verified` varchar(30) DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  `user_banned` varchar(100) DEFAULT NULL,
  `t_like` varchar(30) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `token1` text DEFAULT NULL,
  `token2` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'admin@gmail.com','Richard Cool','$2y$04$qae/hQ5g58CbL50COw7gc..i0/syCzGLQC0McQoMzTGvc45JX4FtW','Saturday, March 9, 2024, 9:56 pm','1710035777','Admin',NULL,'20047980','admin.png','65ed134200ae617100357776b527ec4b6d7d7bab642315493f240bc','no','0',NULL,'0','NG','Nigeria','65ed1401b89fa17100359690c7772e04a79a82ca9769bde4bd1975d0c7772e04a79a82ca9769bde4bd1975dd41d8cd98f00b204e9800998ecf8427e','20b045ca4120d5ceae65edf0fa1b0e41953cf1d7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'livestream_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-10  3:27:59

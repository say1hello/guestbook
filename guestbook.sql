CREATE DATABASE  IF NOT EXISTS `guestbook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `guestbook`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: guestbook
-- ------------------------------------------------------
-- Server version	5.1.73-community-log

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'1419321629_617','upload/1419321629_617.jpg','2014-12-23 08:00:29',0);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userSite` varchar(255) NOT NULL,
  `userIp` int(10) unsigned NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed nunc eget enim mollis egestas ut nec felis. Donec tempor est in nulla euismod tincidunt. Nam ut sagittis ante. Maecenas mattis purus diam, quis finibus velit vulputate ac. Praesent consectetur ultricies libero, vel dignissim dolor rutrum et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer ac nibh consequat nibh blandit pretium. Vivamus in vestibulum lorem. Quisque dictum purus est, vitae ultrices quam suscipit sollicitudin. Quisque bibendum placerat dignissim. Etiam vitae viverra metus. Fusce ut placerat elit. ','John Smith','john@mail.ru','johnsmith.com',0,'','0000-00-00 00:00:00',0),(2,'Cras placerat sed enim ac sodales. Vestibulum dignissim interdum massa ut rutrum. Donec sed est massa. Integer faucibus, justo ac dictum blandit, neque nibh consectetur lacus, eget congue dolor dolor et erat. Donec commodo quam odio, nec laoreet neque rutrum ac. Ut efficitur viverra ex, ac imperdiet velit pretium at. Nulla tincidunt odio dictum consectetur suscipit. Donec venenatis ac sem et pellentesque. Maecenas maximus arcu sed rhoncus faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. ','Mike Doe','mike@mail.ru','mikedoe.com',0,'','0000-00-00 00:00:00',0),(5,'sdfnnsdmfnsd','qw123123eqweqw@mail.ru','fgdfgdfgdf','вапвапвапвапвапвапва\r\nп\r\nвап\r\nва\r\nп\r\nвап',0,'','0000-00-00 00:00:00',0),(31,'sdfsfsfsdf','dfg@sdf.ru','http://dsfsfs.ru','sdfsdsfsfsdf',0,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0','0000-00-00 00:00:00',0),(32,'sdfsfsfsdf','dfg@sdf.ru','http://asda','sdfsdsfsfsdf',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0','0000-00-00 00:00:00',0),(103,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(104,'sdfsdsfsfsdf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(105,'sdfsdsfsfsdf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(106,'sdfsdsfsfsdf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(107,'sdfsdsfsfsdf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(108,'sdfsdsfsfsdf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(109,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(110,'sdfsdsfsfsdf','admin1','admin@mail.ru','http://dddd.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(111,'dsfsdfsdfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(112,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(113,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','0000-00-00 00:00:00',0),(114,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-19 18:57:50',0),(115,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-19 19:00:01',0),(116,'sdfsdsfsfsdf','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-19 19:00:38',1),(117,'<p><span style=\"text-decoration: line-through;\"><em><strong>hhhhhhhhhhhhh</strong></em></span></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-19 19:34:33',0),(118,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:13:16',0),(119,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:13:59',0),(120,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:14:05',0),(121,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:15:08',0),(122,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:35:33',0),(123,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:36:15',0),(124,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:36:45',0),(125,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:37:28',0),(126,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:38:05',0),(127,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:39:27',0),(128,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:40:55',0),(129,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:41:21',0),(130,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:42:43',0),(131,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:47:19',0),(132,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:47:42',0),(133,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:54:30',0),(134,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:54:49',0),(135,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:55:27',0),(136,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:55:50',1),(137,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:56:24',1),(138,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:56:49',1),(139,'<p><em><span style=\"text-decoration: line-through;\"><strong>fdsfsddfsd</strong></span></em></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:56:54',1),(140,'<p><span style=\"text-decoration: line-through;\">sfsdf</span></p>\r\n<p><strong>sd</strong></p>\r\n<p><em>fsd</em></p>\r\n<p><a href=\"dsfsdfsdf\" target=\"_blank\">fd</a></p>\r\n<p>s</p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 22:57:09',0),(141,'<p>fssaddfdsf</p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 23:11:58',1),(142,'<p>dgfsdgdfg</p>\r\n<p>ролд</p>\r\n<p><strong>ролд</strong></p>\r\n<p><span style=\"text-decoration: line-through;\"><em>ро</em></span></p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 23:12:13',1),(143,'варпапрапра','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-21 23:40:19',0),(144,'<p>ыва</p>\r\n<p>выа</p>\r\n<p>sd</p>\r\n<p>fs</p>\r\n<p>df</p>','admin','admin@mail.ru','http://dddd.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 01:23:47',1),(149,'asdadadsad','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:01:45',0),(150,'asdadd','Ð¸Ð¼Ñ','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:02:18',0),(151,'sdfsfsf','sdfsfsfsdf','dfg@sdf.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:03:07',0),(154,'<p>sdfsdfsdfsdf</p>\r\n<p>sd</p>\r\n<p>fsd</p>\r\n<p>f</p>','John Doe','john@doe.com','http://johndoe.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:24:59',0),(155,'<p>Ð²Ð°Ð¿Ð²Ð°Ð¿Ð²Ð°Ð¿</p>','John Doe','john@doe.com','http://johndoe.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:25:26',0),(156,'<p>dsgfdsf</p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:43:39',0),(157,'<p>sdfsfsf</p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:44:20',0),(158,'<p>sdfsdfasdf</p>\n<p><strong><span style=\"text-decoration: line-through;\"><em>kkkkkkkkkkk</em></span></strong></p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 21:44:40',0),(160,'<p>fvgxcvdsfvxcv</p>','John Smith','john@smith.com','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 22:48:11',0),(161,'<p><em>asdasdadsaasdadad</em></p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 22:55:23',0),(162,'<p>iuoghoguilgiuglugi7 Ðº Ðº67</p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 23:04:02',0),(163,'<p>sdfsdfsdf</p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 23:11:34',0),(164,'<p>sdfsdf</p>','admin','admin@mail.ru','http://admin.com',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-22 23:11:47',0),(166,'<p>sdfsdfsdfsdfsdf</p>','admin22','admin22@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 06:59:04',0),(167,'<p>Ð²Ð°Ð¿Ñ‹Ñ€Ð°Ð¿Ñ€Ñ‚Ð²Ð¿Ð°Ñ‚ÑÐ¼Ñ‚Ð¸</p>','admin22','admin22@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 07:30:59',0),(168,'<p>Ð²Ð°ÑÑ‡Ð¼ÑÑ‡Ð¼Ð¸</p>','asdasd','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 07:31:39',0),(169,'<p>fghfghdfgh</p>','admin','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 07:55:53',0),(170,'<p>Ð²Ð¿Ð°Ñ€Ð²Ñ€Ð²Ð°Ñ€</p>','Ð¿Ð°Ð²Ñ€Ð²Ð°Ñ€','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 07:56:26',0),(172,'<p>fdgsdgsdfg</p>','John Smith','admin@mail.ru','',2130706433,'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0','2014-12-23 08:00:29',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages_has_files`
--

DROP TABLE IF EXISTS `messages_has_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages_has_files` (
  `message_id` int(10) unsigned NOT NULL,
  `file_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`message_id`,`file_id`),
  KEY `file_id_idx` (`file_id`),
  CONSTRAINT `file_id` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_id` FOREIGN KEY (`message_id`) REFERENCES `messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages_has_files`
--

LOCK TABLES `messages_has_files` WRITE;
/*!40000 ALTER TABLE `messages_has_files` DISABLE KEYS */;
INSERT INTO `messages_has_files` VALUES (172,1);
/*!40000 ALTER TABLE `messages_has_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@mail.ru','http://admin.com','698d51a19d8a121ce581499d7b701668','2014-12-19 18:26:26',0),(10,'asdasd','admin2@mail.ru','','202cb962ac59075b964b07152d234b70','2014-12-19 23:25:54',0),(11,'John Doe','john@doe.com','http://johndoe.com','698d51a19d8a121ce581499d7b701668','2014-12-22 21:04:28',0),(12,'admin22','admin22@mail.ru','','698d51a19d8a121ce581499d7b701668','2014-12-23 06:58:48',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_messages`
--

DROP TABLE IF EXISTS `users_has_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_messages` (
  `user_id` int(10) unsigned NOT NULL,
  `message_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`message_id`),
  KEY `message_id_idx` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_messages`
--

LOCK TABLES `users_has_messages` WRITE;
/*!40000 ALTER TABLE `users_has_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_has_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'guestbook'
--

--
-- Dumping routines for database 'guestbook'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-23 11:01:11

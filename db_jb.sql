-- MySQL dump 10.13  Distrib 5.5.20, for Win64 (x86)
--
-- Host: localhost    Database: db_jb
-- ------------------------------------------------------
-- Server version	5.5.20

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
-- Table structure for table `Article`
--

DROP TABLE IF EXISTS `Article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Article`
--

LOCK TABLES `Article` WRITE;
/*!40000 ALTER TABLE `Article` DISABLE KEYS */;
INSERT INTO `Article` VALUES (1,'Jerzy Budziszewski ur. xxxx','[left][img]foto/4b8e45b7c20cf5.49291622.jpeg[/img][/left]\r\n\r\n[font=verdana]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nibh velit, quis mollis urna. Vivamus vel lorem diam. Sed dictum risus ut sapien faucibus egestas. Pellentesque auctor tempus neque quis varius. Pellentesque eleifend hendrerit fermentum. Duis sollicitudin rutrum quam, sit amet dignissim mauris luctus eu. Pellentesque mi turpis, ornare et rhoncus dignissim, bibendum eu felis. Curabitur vitae commodo dui.\r\n\r\nSuspendisse potenti. Integer dapibus risus at massa vestibulum porttitor. Curabitur libero quam, laoreet non interdum quis, sollicitudin id quam. Donec diam augue, lacinia non lacinia sit amet, semper sit amet libero. Nam vitae urna sit amet dui volutpat malesuada in quis enim. Etiam gravida vestibulum lorem, ac scelerisque metus aliquam id. Duis nunc mi, ornare sed dictum quis, porta sed velit. Mauris viverra facilisis nibh, ac porta risus fermentum eu. Suspendisse ac velit in lectus venenatis tincidunt quis sit amet arcu. In risus diam, hendrerit id semper nec, feugiat eu nulla. Vestibulum varius sem vitae augue volutpat sed tristique lectus fringilla. Donec hendrerit molestie ante, rhoncus pretium eros pulvinar in. Suspendisse imperdiet sagittis varius. Sed lacinia leo quis dolor rutrum rhoncus. [/font]'),(3,'Archiwum','[img]foto/4b8e35694eeed6.36560775.jpeg[/img]\r\n\r\n[font=arial]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra ante id mauris consectetur eu malesuada ipsum scelerisque. Donec quis turpis sem. Sed ac sapien a justo scelerisque laoreet. Morbi ullamcorper condimentum ipsum, sit amet mattis lacus tincidunt sed. Quisque vitae ipsum sapien, non porttitor magna. Curabitur et est eros, ac feugiat metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/font]\r\n\r\n[right][img]foto/4b84ef85c66485.19168790.jpeg[/img][/right]\r\n\r\n[font=cursive]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed laoreet lorem quis nisi rhoncus sed dictum leo mattis. Morbi sed purus in enim rutrum semper. Duis eleifend nunc eu odio dapibus rhoncus. Nullam pellentesque, metus quis faucibus rhoncus, metus mi hendrerit nisi, vitae pellentesque ipsum massa eu dolor. Duis in pulvinar mi. Donec nec orci magna. Suspendisse varius aliquam ultrices. Aenean in rutrum nibh. Nullam egestas euismod augue, sed congue magna blandit ac. Integer hendrerit varius orci, nec laoreet elit molestie vel.\r\n[/font]\r\n\r\n[left][img]foto/4b8cf0044dfd04.30690157.jpeg[/img][/left]\r\n\r\n[font=verdana]Fusce dapibus facilisis nulla sed blandit. Maecenas mollis metus non enim malesuada ac congue felis pulvinar. Aliquam lectus odio, fringilla vel tincidunt interdum, sodales et metus. Ut et ligula in felis adipiscing vestibulum ac et neque. Ut pretium ultrices odio, ut molestie augue tincidunt ut. Donec ut nisl posuere massa volutpat dignissim dictum sed leo. Quisque quis mauris in metus semper venenatis ac sodales justo. In bibendum egestas tellus. Aenean cursus justo nec lorem congue vitae tempus diam semper. Sed bibendum molestie massa, eget tempus ante iaculis id. Cras arcu massa, egestas consequat tempus ut, tristique sit amet felis. Donec mattis dolor sed justo laoreet non scelerisque est tristique. Etiam semper hendrerit luctus.\r\n[/font]\r\n\r\n[url=foto/4b8cf42ca3c759.10052499.jpeg]4b8cf42ca3c759.10052499.jpeg[/url]\r\n\r\nSuspendisse sollicitudin tristique enim eu volutpat. Mauris orci enim, auctor quis mollis sit amet, accumsan a odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam consectetur rutrum diam, vel rhoncus ligula sodales non. Suspendisse potenti. Duis turpis ipsum, rhoncus eget sollicitudin dictum, posuere quis magna. Pellentesque elit dolor, posuere in semper sit amet, elementum non elit. Aliquam vitae nisl ipsum. Nulla sit amet semper risus. Nullam cursus convallis libero sit amet egestas. Integer id laoreet dui. Quisque vitae ligula velit, ac dapibus ligula. Cras pharetra condimentum sagittis. Donec eget lacus a tellus tincidunt rhoncus.\r\n\r\nNulla condimentum sem vitae libero vulputate sed tempor lectus pretium. In hac habitasse platea dictumst. Donec tempus aliquam convallis. Nullam ac orci eu odio fringilla pharetra. Donec consequat aliquet justo non varius. Phasellus eros quam, fringilla ultrices eleifend ac, vestibulum vel turpis. Curabitur at nisl quis turpis congue laoreet. Quisque egestas, nulla vulputate auctor condimentum, orci risus cursus lectus, non lacinia nibh ante sed nisl. Fusce tristique, massa a vehicula viverra, ante metus pellentesque velit, et posuere tortor justo in lorem. Sed pretium gravida turpis, a viverra dolor luctus nec. In scelerisque dui et mi feugiat mattis. In rhoncus, lectus ut feugiat imperdiet, eros est mattis elit, sodales aliquam mi nulla pulvinar risus. Nam euismod mattis velit ut lacinia. Duis tincidunt, enim eu varius consequat, augue nunc sollicitudin nisi, fringilla sollicitudin sapien diam at urna. Phasellus a velit sit amet massa porttitor faucibus sed eget nunc. Nulla dictum scelerisque accumsan.\r\n\r\n[img]foto/4b7e7aded5dc42.78487571.jpeg[/img]\r\n\r\n[right]Nam fringilla rhoncus arcu ut molestie. Donec a urna tellus, id vulputate elit. Integer nulla diam, eleifend et fermentum vitae, ornare quis felis. Donec nec eros elit. Aliquam in nulla ut eros tincidunt aliquam sed at urna. Sed mollis purus purus, in malesuada nisi. Sed id ligula et metus bibendum aliquet in id diam. Nullam in enim quis orci cursus venenatis. Etiam ut enim ac orci lacinia vehicula.[/right]\r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus ac purus tellus, in placerat arcu. Curabitur dignissim erat ut tortor varius hendrerit. Nulla tempor lectus id dui rhoncus eget commodo orci adipiscing. Nulla id quam risus. Donec eget dignissim orci. Nam viverra, risus eu luctus dapibus, eros tellus egestas arcu, quis pretium lorem eros sit amet nisl. Quisque venenatis, est eu sollicitudin tincidunt, tortor justo volutpat nisi, faucibus pharetra eros quam a dui. Maecenas in volutpat erat. Nullam vitae magna ipsum, ac suscipit nisi. Aliquam nibh lorem, malesuada sit amet aliquam sit amet, vestibulum eget libero. Aenean elementum enim placerat arcu rhoncus id semper risus mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eleifend mollis leo, sit amet pellentesque erat lacinia non. Curabitur ut urna metus. Nam lacus metus, elementum sed adipiscing sit amet, pharetra non lacus.\r\n\r\nNulla nec nisi urna. Etiam sit amet dictum metus. Sed rutrum aliquam mi, quis facilisis ante tincidunt id. Curabitur dictum ultricies mauris sit amet sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ac dolor orci. Aliquam erat volutpat. Nunc turpis orci, commodo id imperdiet ac, volutpat vel dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean non erat dolor.\r\n\r\nCras mollis, mi ut laoreet varius, velit enim viverra sem, quis iaculis sem odio sed odio. Nullam tempor suscipit auctor. Sed posuere imperdiet elit a ultrices. Fusce vehicula ipsum vel nulla sodales id facilisis elit commodo. Mauris quis nisl tellus, ut tempor felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nNam eget urna metus. Pellentesque at accumsan nisi. Proin blandit justo ac quam malesuada commodo. Curabitur ac tellus nunc, vel porttitor felis. Praesent interdum aliquet convallis. Nunc sit amet tortor ac dui tincidunt facilisis. Fusce laoreet dapibus convallis. '),(5,'Kontakt','[font=arial]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra ante id mauris consectetur eu malesuada ipsum scelerisque. Donec quis turpis sem. Sed ac sapien a justo scelerisque laoreet. Morbi ullamcorper condimentum ipsum, sit amet mattis lacus tincidunt sed. Quisque vitae ipsum sapien, non porttitor magna. Curabitur et est eros, ac feugiat metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/font]\r\n\r\n[font=arial]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed laoreet lorem quis nisi rhoncus sed dictum leo mattis. Morbi sed purus in enim rutrum semper. Duis eleifend nunc eu odio dapibus rhoncus. Nullam pellentesque, metus quis faucibus rhoncus, metus mi hendrerit nisi, vitae pellentesque ipsum massa eu dolor. Duis in pulvinar mi. Donec nec orci magna. Suspendisse varius aliquam ultrices. Aenean in rutrum nibh. Nullam egestas euismod augue, sed congue magna blandit ac. Integer hendrerit varius orci, nec laoreet elit molestie vel.[/font]\r\n[left]\r\n[img]foto/4b7e86633ae297.24367397.jpeg[/img]\r\nNulla nec nisi urna. Etiam sit amet dictum metus. [/left]\r\n\r\n[code]Fusce dapibus facilisis nulla sed blandit. Maecenas mollis metus non enim malesuada ac congue felis pulvinar. Aliquam lectus odio, fringilla vel tincidunt interdum, sodales et metus. Ut et ligula in felis adipiscing vestibulum ac et neque. Ut pretium ultrices odio, ut molestie augue tincidunt ut. Donec ut nisl posuere massa volutpat dignissim dictum sed leo. Quisque quis mauris in metus semper venenatis ac sodales justo. In bibendum egestas tellus. Aenean cursus justo nec lorem congue vitae tempus diam semper. Sed bibendum molestie massa, eget tempus ante iaculis id. Cras arcu massa, egestas consequat tempus ut, tristique sit amet felis. Donec mattis dolor sed justo laoreet non scelerisque est tristique. Etiam semper hendrerit luctus. [/code]'),(2,'Wystawy','[font=cursive]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra ante id mauris consectetur eu malesuada ipsum scelerisque. Donec quis turpis sem. Sed ac sapien a justo scelerisque laoreet. Morbi ullamcorper condimentum ipsum, sit amet mattis lacus tincidunt sed. Quisque vitae ipsum sapien, non porttitor magna. Curabitur et est eros, ac feugiat metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/font]\r\n\r\n[img]foto/4b82563cd52482.10692219.jpeg[/img]\r\n\r\n[quote]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed laoreet lorem quis nisi rhoncus sed dictum leo mattis. Morbi sed purus in enim rutrum semper. Duis eleifend nunc eu odio dapibus rhoncus. Nullam pellentesque, metus quis faucibus rhoncus, metus mi hendrerit nisi, vitae pellentesque ipsum massa eu dolor. Duis in pulvinar mi. Donec nec orci magna. Suspendisse varius aliquam ultrices. Aenean in rutrum nibh. Nullam egestas euismod augue, sed congue magna blandit ac. Integer hendrerit varius orci, nec laoreet elit molestie vel.[/quote]\r\n\r\n[right][img]foto/4b8cf07b11fd05.91513022.jpeg[/img][/right]\r\n\r\n[font=cursive]Fusce dapibus facilisis nulla sed blandit. Maecenas mollis metus non enim malesuada ac congue felis pulvinar. Aliquam lectus odio, fringilla vel tincidunt interdum, sodales et metus. Ut et ligula in felis adipiscing vestibulum ac et neque. Ut pretium ultrices odio, ut molestie augue tincidunt ut. Donec ut nisl posuere massa volutpat dignissim dictum sed leo. Quisque quis mauris in metus semper venenatis ac sodales justo. In bibendum egestas tellus. Aenean cursus justo nec lorem congue vitae tempus diam semper. Sed bibendum molestie massa, eget tempus ante iaculis id. Cras arcu massa, egestas consequat tempus ut, tristique sit amet felis. Donec mattis dolor sed justo laoreet non scelerisque est tristique. Etiam semper hendrerit luctus.[/font]'),(4,'Strona JerzyBudziszewski.pl','[font=arial]\r\n\r\n[img]foto/4b8d08180753c5.57817739.jpeg[/img]\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nibh velit, quis mollis urna. Vivamus vel lorem diam. Sed dictum risus ut sapien faucibus egestas. Pellentesque auctor tempus neque quis varius. Pellentesque eleifend hendrerit fermentum. Duis sollicitudin rutrum quam, sit amet dignissim mauris luctus eu. Pellentesque mi turpis, ornare et rhoncus dignissim, bibendum eu felis. Curabitur vitae commodo dui.\r\n\r\nSuspendisse potenti. Integer dapibus risus at massa vestibulum porttitor. Curabitur libero quam, laoreet non interdum quis, sollicitudin id quam. Donec diam augue, lacinia non lacinia sit amet, semper sit amet libero. Nam vitae urna sit amet dui volutpat malesuada in quis enim. Etiam gravida vestibulum lorem, ac scelerisque metus aliquam id. Duis nunc mi, ornare sed dictum quis, porta sed velit. Mauris viverra facilisis nibh, ac porta risus fermentum eu. Suspendisse ac velit in lectus venenatis tincidunt quis sit amet arcu. In risus diam, hendrerit id semper nec, feugiat eu nulla. Vestibulum varius sem vitae augue volutpat sed tristique lectus fringilla. Donec hendrerit molestie ante, rhoncus pretium eros pulvinar in. Suspendisse imperdiet sagittis varius. Sed lacinia leo quis dolor rutrum rhoncus.[/font]\r\n\r\n');
/*!40000 ALTER TABLE `Article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Painting`
--

DROP TABLE IF EXISTS `Painting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Painting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `dimensions` varchar(64) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `technique_id` tinyint(4) DEFAULT NULL,
  `order_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Painting`
--

LOCK TABLES `Painting` WRITE;
/*!40000 ALTER TABLE `Painting` DISABLE KEYS */;
INSERT INTO `Painting` VALUES (25,'4f35a527e96ce4.85233016','chłopiec','10 x 20 cm',1,1,0),(29,'4f386ca0a8ee54.49508454','rysunek','200 x 400cm',1,7,0),(21,'4f351403457774.24424269','krzesło','23 x 23cm',1,2,0),(22,'4f351456cde312.85960145','droga','22x33cm',1,3,1),(10,'4f351472839120.15663233','twarz','23 x 23cm',1,5,0),(23,'4f35165e080f26.89164573','park','22x33cm',1,1,7),(13,'4f345813c95c13.70318324','Martwa natura','1 x 1cm',1,1,3),(14,'4f3474a1a6b756.54728379','człowiek w ciemności','10 x 20 cm',1,1,1),(15,'4f351209cbc400.42783160','pałac','23 x 23cm',1,1,6),(16,'4f35121481f0b8.05435899','naczynia','10 x 20 cm',1,1,5),(18,'4f351232854a02.80422637','okularnik','23 x 23cm',1,1,9),(20,'4f35130d30f0a1.15240079','budynek','10 x 20 cm',1,1,4),(26,'4f35a5aa048779.91828559','kobieta','23 x 23cm',1,1,0);
/*!40000 ALTER TABLE `Painting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Technique`
--

DROP TABLE IF EXISTS `Technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Technique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Technique`
--

LOCK TABLES `Technique` WRITE;
/*!40000 ALTER TABLE `Technique` DISABLE KEYS */;
INSERT INTO `Technique` VALUES (1,'KOMPOZYCJE',1),(2,'RELIEFY',1),(3,'PAPIER TECZKA I',1),(4,'PAPIER TECZKA II',1),(5,'PAPIER TECZKA III',1),(7,'nowa technika',1);
/*!40000 ALTER TABLE `Technique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'043a05282759dff9d1295ec909e134926d87a04f6d1fda7d6','admin');
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

-- Dump completed on 2012-02-13  2:54:39

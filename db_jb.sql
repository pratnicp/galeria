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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'Jerzy Budziszewski ur. xxxx','[left][img]foto/4b8e45b7c20cf5.49291622.jpeg[/img][/left]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nibh velit, quis mollis urna. Vivamus vel lorem diam. Sed dictum risus ut sapien faucibus egestas. Pellentesque auctor tempus neque quis varius. Pellentesque eleifend hendrerit fermentum. Duis sollicitudin rutrum quam, sit amet dignissim mauris luctus eu. Pellentesque mi turpis, ornare et rhoncus dignissim, bibendum eu felis. Curabitur vitae commodo dui.\r\n\r\nSuspendisse potenti. Integer dapibus risus at massa vestibulum porttitor. Curabitur libero quam, laoreet non interdum quis, sollicitudin id quam. Donec diam augue, lacinia non lacinia sit amet, semper sit amet libero. Nam vitae urna sit amet dui volutpat malesuada in quis enim. Etiam gravida vestibulum lorem, ac scelerisque metus aliquam id. Duis nunc mi, ornare sed dictum quis, porta sed velit. Mauris viverra facilisis nibh, ac porta risus fermentum eu. Suspendisse ac velit in lectus venenatis tincidunt quis sit amet arcu. In risus diam, hendrerit id semper nec, feugiat eu nulla. Vestibulum varius sem vitae augue volutpat sed tristique lectus fringilla. Donec hendrerit molestie ante, rhoncus pretium eros pulvinar in. Suspendisse imperdiet sagittis varius. Sed lacinia leo quis dolor rutrum rhoncus. '),(3,'Archiwum','\r\n\r\n[b]MONOGRAFIA BOLESŁAWA BIEGASA[/b]\r\n\r\n[font=arial]Arial[/font]\r\n[font=verdana]Verdana[/font]\r\n[font=cursive]Cursive[/font]\r\n[right][img]foto/4b8e4d7a468ca8.81967136.jpeg[/img][/right]\r\n[b]Towarzystwo Historyczno-Literackie/Biblioteka Polska w Paryżu wraz z ARTgalerią.net wydała w marcu 2011 roku monografię Bolesława Biegasa autorstwa profesora Xaverego Deringa.[/b]\r\n\r\n[left][img]foto/portret.jpg[/img][/left]\r\n\r\n[font=arial]Jest to pierwsza monografia poświęcona temu artyście.[/font] Obszerny album z pracami  poprzedza równie ciekawa i barwna biografia Biegasa-Bolesława Biegalskiego. [font=cursive]Atutem monografii jest zbiór prac z poszczególnych kolekcji muzealnych oraz prywatnych w Polsce i na świecie, dokumentacja wszystkich wystaw, które były poświęcone twórczości Biegasa, a także bogata dokumentacja fotograficzna, która jest cennym źródłem informacji o życiu i twórczości Graczaka:[/font]\r\n [quote][/quote][i]Syn to Gracza, co tak słynął w okolicy... co to ludzie \r\n mówią o nim, że miał skrzypce tak dyabelskie, że \r\n za niego same grały  [/i][quote][/quote]\r\n\r\n[b]Promocja książki odbędzie się przy okazji otwarcia stałej ekspozycji prac Bolesława Biegasa 14  maja 2011 roku o godzinie 14 w Muzeum Mazowieckiem w Płocku. Serdecznie zapraszamy na wysłuchanie wystąpienia prof. Xaverego Derynga, znawcy i największego badacza życia i twórczości Bolesława Biegasa. [/b]\r\n\r\nOpis techniczny:\r\nOprawa: twarda \r\nIlość stron: 306\r\nFormat: 33 x 23 cm\r\nProjekt graficzny: Mateusz Kaniewski\r\n[b]\r\nPAŁAC SOBAŃSKICH -  WYSTAWA PRAC Z KOLEKCJI ARTGALERII.NET[/b]\r\n[img]foto/DSC00699.jpg[/img]\r\n[img]foto/DSC00700.jpg[/img]\r\n[img]foto/DSC00701.jpg[/img]\r\n[img]foto/DSC00702.jpg[/img]\r\n[right][img]foto/DSC00704.jpg[/img][/right]\r\n\r\n___________________________________________________________________________________________________[b][/b]\r\n\r\n[b]RELACJA Z WERNISAŻU W GALERII KATARZYNY CZAJKA - 28.07.2011[/b]\r\n[url]http://www.youtube.com/watch?v=b3ctTg6tlW8[/url]\r\n\r\n[b][font=cursive]ARTgaleria.net objęła patronat nad poniższym wydarzeniem. [/font]\r\nZapraszamy 28 lipca o 19.00 na Ząbkowską 27/31, budynek 24.[/b]\r\n[img]foto/4e2d21755fb78f5dcb635c734911a1d752a4d86787f2e.jpg[/img]\r\n\r\n[b]PAŁAC SOBAŃSKICH - WYSTAWA PRAC BARTOSZA FRĄCZKA[/b]\r\n\r\nBartosz Frączek , ur. 1974 w Częstochowie, studiował w Instytucie Plastyki WSP w Częstochowie, (obecnie Akademia im. Jana Długosza). Dyplom z malarstwa z wyróżnieniem obronił w pracowni prof. Wincentego Maszkowskiego. Doktorat na wydziale Malarstwa ASP w Krakowie 2009. Obecnie adiunkt na Wydziale Wychowania Artystycznego AJD w Częstochowie. Czterokrotnie uhonorowany stypendium prezydenta miasta Częstochowy. Otrzymał na konkursach malarskich wiele nagród i wyróżnień. Jest pomysłodawcą i [font=verdana]kuratorem Międzynarodowego Biennale Miniatury[/font]. Jego prace znajdują się w kolekcjach prywatnych w kraju i za granicą. Zajmuje się malarstwem i rysunkiem.\r\n\r\n[img]foto/DSC00689.jpg[/img]\r\n[img]foto/DSC00690.jpg[/img]\r\n[img]foto/DSC00691.jpg[/img]\r\n[img]foto/DSC00692.jpg[/img]\r\n[img]foto/DSC00693.jpg[/img]\r\n[img]foto/DSC00696.jpg[/img]\r\n[img]foto/DSC00697.jpg[/img]\r\n[img]foto/DSC00698.jpg[/img][i][/i][i][/i]\r\n[b]WYSTAWA PRAC ELŻBIETY KRÓL W PAŁACU SOBAŃSKICH MARZEC-CZERWIEC 2011 [/b]\r\n\r\nPałac Sobańskich stała przestrzeń wystawiennicza ARTgalerii.net\r\n\r\nELŻBIETA KRÓL\r\nUkończyła liceum im. Narcyzy Żmichowskiej w Warszawie, a następnie studiowała teologię małżeństwa i rodziny na Akademii Teologii Katolickiej. Edukację artystyczną zaczęła od lekcji rysunku, malowania na szkle, jedwabiu i poznawania innych technik, w tym ceramiki i rzeźby. Organizowała indywidualne wycieczki po najważniejszych muzeach Europy i Stanów Zjednoczonych. Po dwóch latach uczestniczenia w kursach przygotowawczych na Wydziale Fotografii warszawskiej ASP, w 2006 r. dostała się na Wydział Malarstwa Akademii Sztuk Pięknych. W 2011 roku zamierza zrobić dyplom w Pracowni Malarstwa prof. Leona Tarasewicza. Jako aneks do dyplomu wybrała malowanie na jedwabiu w Pracowni Tkaniny Artystycznej prof. Doroty Grynczel.\r\n\r\nCYKL AMERYKAŃSKI\r\nKażda część świata ma właściwe tylko sobie kolory powietrza, wody i ziemi. Wynikają z nich charakterystyczne walory naturalnego otoczenia oraz sztuka. Cykl amerykański to seria obrazów zainspirowana wielotygodniową podróżą po Stanach Zjednoczonych. Widać w nich inspirację krajobrazem, Parkami Narodowymi: Yellowstone, Yosemite, paletą barw sztuki Indian oraz amerykańskim malarstwem abstrakcyjnym. Patronem serii jest słynny malarz Barnett Newman (1905-1970), którego przodkowie trafili do Ameryki z Łomży. Artystyczne cytaty z jego dzieł poddane zostały dekonstrukcji ekspresjonistycznej.\r\n\r\n[img]foto/198538_103672643048596_100002175822984_35201_7043063_n.jpg[/img]\r\n[img]foto/200123_103673109715216_100002175822984_35208_3505491_n.jpg[/img]\r\n[img]foto/197286_103674406381753_100002175822984_35218_482176_n.jpg[/img]\r\n[img]foto/197286_103674409715086_100002175822984_35219_6649265_n.jpg[/img]\r\n[img]foto/197286_103674413048419_100002175822984_35220_76779_n.jpg[/img]\r\n[img]foto/4e26dc60094b6197286_103674419715085_100002175822984_35222_7873135_n.jpg[/img]\r\n[img]foto/198561_103675039715023_100002175822984_35229_5004796_n.jpg[/img]\r\n[img]foto/198561_103675043048356_100002175822984_35230_6193649_n.jpg[/img]\r\n\r\nCYKL AMERYKAŃSKI\r\nKażda część świata ma właściwe tylko sobie kolory powietrza, wody i ziemi. Wynikają z nich charakterystyczne walory naturalnego otoczenia oraz sztuka. Cykl amerykański to seria obrazów zainspirowana wielotygodniową podróżą po Stanach Zjednoczonych. Widać w nich inspirację krajobrazem, Parkami Narodowymi: Yellowstone, Yosemite, paletą barw sztuki Indian oraz amerykańskim malarstwem abstrakcyjnym. Patronem serii jest słynny malarz Barnett Newman (1905-1970), którego przodkowie trafili do Ameryki z Łomży. Artystyczne cytaty z jego dzieł poddane zostały dekonstrukcji ekspresjonistycznej. \r\n\r\n________________________________________________________________________________\r\n\r\nWYSTAWA zorganizowana na zlecenie szwajcarskiego banku SARASIN \r\n\r\n[u][i]KONFRONTACJE XX vs XXI[/i] [/u]\r\n\r\n18 marca 2010 Akademia Sztuk Pięknych w Warszawie[/b]\r\n\r\n[b]XX wiek[/b]\r\nZdzisław BEKSIŃSKI\r\nBolesław BIEGAS\r\nTytus CZYŻEWSKI\r\nXawery DUNIKOWSKI\r\nEugeniusz EIBISCH\r\nStanisław KAMOCKI\r\nJan LEBENSTEIN\r\nMela MUTER\r\nWŁODZIMIERZ PAWLAK\r\nAndrzej PRONASZKO\r\nHenryk STAŻEWSKI\r\nRyszard WINIARSKI\r\nWitold Stefan ZACZENIUK\r\nRajmund ZIEMSKI\r\noraz Marek NIEMIRSKI\r\n\r\n[b]XXI wiek[/b]\r\nJulia CURYŁO\r\nAgata DOBROWOLSKA\r\nBartek KIEŁBOWICZ\r\nAnita MAŃK\r\nAnna PISARSKA\r\nRóża Anna PUZYNOWSKA\r\nDominika SITARSKA\r\nAnna SOŁTYSIAK\r\nRobert WAŁĘKA\r\n\r\n[img]foto/palceeeeeeeeeeeeeee.JPG[/img]\r\n[img]foto/4bac6f1c7ca39DSC_0149.JPG[/img]\r\n[img]foto/000000000000000000000000000000000000.jpg[/img]\r\n[img]foto/small.JPG[/img]\r\n[img]foto/T5TTT.JPG[/img]\r\n[img]foto/KKKKKKKKK.JPG[/img]\r\n[img]foto/DSC_0046644.jpg[/img]\r\n[img]foto/lll.jpg[/img]\r\n[img]foto/555.jpg[/img]\r\n[img]foto/olp.jpg[/img]\r\n[img]foto/róza p..JPG[/img]\r\n[img]foto/DSC_00955000.jpg[/img]\r\n[br]\r\n         [b]_________________________________________________________________________________________________\r\n [/b]\r\n\r\n\r\n[u][b]WYDANIE KWARTALNIKA[/b] [i][b]ODKRYCIA W SZTUCE[/b][/i][/u]\r\n\r\n[b]Pierwszy numer[/b] kwartalnika [i][b]ODKRYCIA W SZTUCE[/b] [/i]poświęcony jest Bolesławowi Biegasowi.\r\n[img]foto/4baca388a35f5ows.JPG[/img]\r\nDodatek [i][b]OKOLICE[/b] [/i] prezentuje ciekawe tematy dotyczące rynku sztuki oraz przedstawia prace dyplomatów warszawskiej Akademii Sztuk Pięknych wyróżnionych przez rektora bądź dziekana w roku 2009.\r\n[img]foto/4baca3ad17fa2OKOLICE DO WRZUCENIA.JPG[/img]\r\n[br]\r\n\r\n[b]___________________________________________________________________________________________________[/b]\r\n\r\n[b]WYSTAWA [i]PORTRETY POLITYKÓW[/i] BOLESŁAWA BIEGASA[/b]\r\n\r\n[b]30 listopada 2009 - 30 kwietnia 2010 Muzeum Mazowieckie w Płocku\r\n[/b]\r\nWystawa prezentuje 17 portretów z lat 1945 - 46, na których pojawiają się najbardziej znani politycy I połowy XX wieku tacy jak Franklin Roosevelt, Francisco Franco, Charles De Gaulle, Winston Churchill, Józef Piłsudski, Józef Stalin.    \r\n\r\n[img]foto/PŁOCK FASADA.JPG[/img]\r\n[img]foto/ghandi.bmp.jpg[/img]\r\n[img]foto/franco.bmp.jpg[/img]\r\n[img]foto/roosSSSSSSSSSSSSSS.JPG[/img]\r\n[br]\r\n\r\n\r\n[b]___________________________________________________________________________________________________[/b]\r\n\r\n\r\n[b]MONOGRAFIA BOLESŁAWA BIEGASA[/b]\r\n\r\n[u][b]WYSTAWA[/b] [i][b]BOLESŁAW BIEGAS: WARSZAWA - PŁOCK - PARYŻ[/b][/i][/u]\r\n\r\n[b]24 września - 26 września 2009 Akademia Sztuk Pięknych w Warszawie[/b]\r\n\r\nWystawa miała na celu przybliżenie szerszej publiczności twórczości Bolesława Biegasa. Na wystawie pokazane zostały obrazy i rzeźby ze wszystkich okresów jego twórczości tzn. obrazy [i]Sferyczne[/i], cykl [i]Mistyka nieskończoności[/i] i [i]Wampiry wojny[/i].\r\n\r\n[img]foto/wernisażFOTO 01222222222222222222.JPG[/img]\r\n[img]foto/Kopia wernisażFOTO 001.jpg[/img]\r\n[img]foto/Kopia wernisażFOTO 002.jpg[/img]\r\n[img]foto/wernisażFOTO 048.jpg[/img]\r\n[img]foto/wernisażFOTO 03222222222222222222222222222222.JPG[/img]\r\n[img]foto/wernisażFOTO 057Y.jpg[/img]\r\n[img]foto/wernisażFOTO 0743.jpg[/img]\r\n[img]foto/wernisażFOTO 114.jpg[/img]\r\n[img]foto/wernisażFOTO 101.jpg[/img]\r\n[img]foto/wernisażFOTO 0733333.jpg[/img]\r\n[img]foto/wernisażFOTO 066.jpg[/img]\r\n[img]foto/wernisażFOTO 0248.jpg[/img]\r\n[img]foto/wernisażFOTO 110.jpg[/img]\r\n[img]foto/wernisażFOTO 11766.jpg[/img]\r\n[img]foto/wernisażFOTO 081V.jpg[/img]\r\n[img]foto/wernisażFOTO 080VV.jpg[/img]\r\n[img]foto/wernisażFOTO 12288.jpg[/img]\r\n[img]foto/wernisażFOTO 08388.jpg[/img]\r\n[img]foto/wernisażFOTO 127.jpg[/img]\r\n\r\n[br]\r\n[img]foto/4b8e4212c954a3.50612335.jpeg[/img]\r\n[b]___________________________________________________________________________________________________[/b]\r\n\r\n\r\n\r\n\r\n12 kwietnia 2007 - 05 maja 2007 wystawa Witolda Stafana Zaczeniuka w DESA MODERN w Warszawie\r\n\r\nWystawa prezentowała gwasze, akwarele i obrazy olejne na płótnie - pochodzące z kolekcji rodzinnej. Na wernisażu pojawiło się wielu wielbicieli twórczości malarza, który rzadko eksponował swoje prace, pokazując je jedynie przyjaciołom i kolekcjonerom. Nie był artystą powszechnie znanym czy popularnym, ale - głównie na zasadach relacji osobistych - stworzył grono odbiorców swojej sztuki. Grono to, powiększone o kolekcjonerów związanych z Desą, dziennikarzy i wielbicieli malarstwa pojawiło się na Koszykowej, aby zapoznać się z pracami artysty i posłuchać o nim wspomnień.\r\n\r\n[img]foto/Zaczeniuk.jpg[/img]\r\n[img]foto/Zaczeniuk 2.jpg[/img]\r\n[img]foto/Zaczeniuk 4.jpg[/img]\r\n[img]foto/Zaczeniuk 3.jpg[/img]\r\n\r\n'),(5,'Kontakt','\r\nARTgaleria.net prezentuje dzieła polskich artystów XIX i XX wieku, które odnajdujemy na całym świecie. Polska historia rozsiała naszych rodaków i ich twórczość po różnych zakątkach globu. Nierzadko wyobcowani, skupiali się na rozwoju swojego talentu, tworząc wybitne dzieła. \r\n\r\nARTgaleria.net dzieła ich prezentuje wirtualnie. Za naszym pośrednictwem mogą one realnie być w Państwa posiadaniu. Przy wykorzystaniu naszego doświadczenia znajdziemy lub wylicytujemy za granicą - na Państwa życzenie - obiekty wybitnych artystów. \r\n\r\nOpierając się na kooperacji z ekspertami - historykami sztuki, ARTgaleria.net koncentruje się również na promowaniu artystów poprzez organizację wystaw i prowadzenie działalności wydawniczej.\r\n\r\nBędziemy zaszczyceni współpracą z Państwem i możliwością zaspokojenia Państwa potrzeb w zakresie SZTUKI. \r\n\r\nRoman Gniewaszewski\r\n\r\nARTgaleria.net Odkrycia w sztuce\r\nul. Żurawia 26/2\r\n00-515 Warszawa\r\ntel./fax. 22-622-69-90\r\nart@artgaleria.net\r\nNIP: 521-118-71-56; \r\nREGON: 015440859;\r\nALIOR BANK S.A. Warszawa 30 2490 0005 0000 4500 7113 8668\r\n\r\n\r\n'),(2,'Wystawy','           ZAMÓWIENIA PROSIMY WYSYŁAĆ NA ADRES: [b]art@artgaleria.net[/b]\r\n\r\n[img]foto/Bez&nbsp;tytułu.jpg[/img]\r\n\r\n\r\n\r\n      [u][b]WYDANIE KWARTALNIKA[/b] [i][b]ODKRYCIA W SZTUCE[/b][/i][/u]\r\n\r\n[b]Pierwszy numer[/b] kwartalnika [i][b]ODKRYCIA W SZTUCE[/b] [/i]poświęcony jest Bolesławowi Biegasowi.\r\n[img]foto/4baca388a35f5ows.JPG[/img]\r\nDodatek [i][b]OKOLICE[/b] [/i] prezentuje ciekawe tematy dotyczące rynku sztuki oraz przedstawia prace dyplomatów warszawskiej Akademii Sztuk Pięknych wyróżnionych przez rektora bądź dziekana w roku 2009.\r\n[img]foto/4baca3ad17fa2OKOLICE DO WRZUCENIA.JPG[/img]\r\n[br]'),(4,'Strona JerzyBudziszewski.pl','\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel nibh velit, quis mollis urna. Vivamus vel lorem diam. Sed dictum risus ut sapien faucibus egestas. Pellentesque auctor tempus neque quis varius. Pellentesque eleifend hendrerit fermentum. Duis sollicitudin rutrum quam, sit amet dignissim mauris luctus eu. Pellentesque mi turpis, ornare et rhoncus dignissim, bibendum eu felis. Curabitur vitae commodo dui.\r\n\r\nSuspendisse potenti. Integer dapibus risus at massa vestibulum porttitor. Curabitur libero quam, laoreet non interdum quis, sollicitudin id quam. Donec diam augue, lacinia non lacinia sit amet, semper sit amet libero. Nam vitae urna sit amet dui volutpat malesuada in quis enim. Etiam gravida vestibulum lorem, ac scelerisque metus aliquam id. Duis nunc mi, ornare sed dictum quis, porta sed velit. Mauris viverra facilisis nibh, ac porta risus fermentum eu. Suspendisse ac velit in lectus venenatis tincidunt quis sit amet arcu. In risus diam, hendrerit id semper nec, feugiat eu nulla. Vestibulum varius sem vitae augue volutpat sed tristique lectus fringilla. Donec hendrerit molestie ante, rhoncus pretium eros pulvinar in. Suspendisse imperdiet sagittis varius. Sed lacinia leo quis dolor rutrum rhoncus.');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `painting`
--

DROP TABLE IF EXISTS `painting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `painting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `dimensions` varchar(64) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `technique_id` tinyint(4) DEFAULT NULL,
  `order_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `painting`
--

LOCK TABLES `painting` WRITE;
/*!40000 ALTER TABLE `painting` DISABLE KEYS */;
INSERT INTO `painting` VALUES (25,'4f35a527e96ce4.85233016','chłopiec','10 x 20 cm',1,1,0),(24,'4f3567ade9a157.10838394','Po imprezie','56 x 54',1,7,2),(21,'4f351403457774.24424269','krzesło','23 x 23cm',1,2,0),(22,'4f351456cde312.85960145','droga','22x33cm',1,3,1),(10,'4f351472839120.15663233','twarz','23 x 23cm',1,5,0),(23,'4f35165e080f26.89164573','park','22x33cm',1,1,7),(13,'4f345813c95c13.70318324','Martwa natura','1 x 1cm',1,1,3),(14,'4f3474a1a6b756.54728379','człowiek w ciemności','10 x 20 cm',1,1,1),(15,'4f351209cbc400.42783160','pałac','23 x 23cm',1,1,6),(16,'4f35121481f0b8.05435899','naczynia','10 x 20 cm',1,1,5),(17,'4f35122220f661.88501460','twarz kobieca','22x33cm',1,1,10),(18,'4f351232854a02.80422637','okularnik','23 x 23cm',1,1,9),(19,'4f3512e9568689.05729711','bezgłowy','22x33cm',1,1,8),(20,'4f35130d30f0a1.15240079','budynek','10 x 20 cm',1,1,4),(26,'4f35a5aa048779.91828559','kobieta','23 x 23cm',1,1,0);
/*!40000 ALTER TABLE `painting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technique`
--

DROP TABLE IF EXISTS `technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technique`
--

LOCK TABLES `technique` WRITE;
/*!40000 ALTER TABLE `technique` DISABLE KEYS */;
INSERT INTO `technique` VALUES (1,'KOMPOZYCJE',1),(2,'RELIEFY',1),(3,'PAPIER TECZKA I',1),(4,'PAPIER TECZKA II',1),(5,'PAPIER TECZKA III',1),(6,'PAPIER TECZKA IV',0),(7,'nowa technika',1);
/*!40000 ALTER TABLE `technique` ENABLE KEYS */;
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

-- Dump completed on 2012-02-11  1:09:59

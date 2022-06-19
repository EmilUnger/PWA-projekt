-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projekt
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
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8mb4_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (6,'Emil','Unger','admin','$2y$10$8XTpPQCOmt7z8kxB9IcQWOeTuLJFQDf9u5gpVxbmdn6Ms6.KMdxo.',1),(7,'Franjo','Tuđman','guest','$2y$10$GFNQS5VyHDY5V/rlmAyV4OZ06V91V0Xl5jCtZuj1F4pTr7JHZf3n2',0);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vijesti`
--

DROP TABLE IF EXISTS `vijesti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `naslov` varchar(30) COLLATE utf8mb4_croatian_ci NOT NULL,
  `ukratko` varchar(100) COLLATE utf8mb4_croatian_ci NOT NULL,
  `sadrzaj` text COLLATE utf8mb4_croatian_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8mb4_croatian_ci NOT NULL,
  `kategorija` varchar(10) COLLATE utf8mb4_croatian_ci NOT NULL,
  `arhivirano` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vijesti`
--

LOCK TABLES `vijesti` WRITE;
/*!40000 ALTER TABLE `vijesti` DISABLE KEYS */;
INSERT INTO `vijesti` VALUES (18,'2022-06-19','Sainz maiden victory?','Carlos Sainz held a big slide in the final corner in his pursuit of pole for the Canadian GP.','The Spaniard’s team mate Charles Leclerc will line up 19th after taking a suite of new engine components that have triggered hefty grid penalties, and that means Sainz carries Ferrari’s main hope of victory.\r\nHis initial target will be to get ahead of countryman and friend Fernando Alonso, who starts a superb second after mastering the wet conditions – with Sainz at risk of Verstappen racing off into the distance if he can\'t manage it.\r\n<br><br>\r\n“It will be important [to pass Alonso] so we can get behind Max as soon as possible,” he said. “And from there try and push Red Bull into a strategy or into something different. I think we have a good chance – we just need to make sure we get behind them as soon as possible, and if not, pass them at the start.”\r\n<br><br>\r\nSainz looked like he had the pace for the front row – but admitted he pushed too hard in the final sector.\r\n<br><br>\r\n“It was a moment,” he said. “Trying to get back that last tenth or two that Max had advantage on us during the whole day. I really wanted to get it but in the end it cost me probably more than what I was going for. But it is how it is.\r\n<br><br>\r\n“I did a very good sector one, then in sector two I started to feel the lap going away from me, and into sector three I decided to push really hard the last corner to see if I could get pole, but it ended up costing me more than half a second.”\r\n<br><br>\r\nLeclerc, meanwhile, called it a day after Q1, despite progressing to the next session, as he knew that he was destined to start at the back anyway because of the penalties.\r\n<br><br>','./images/1655653651.png','sport',0),(19,'2022-06-19','Alonso aiming to lead Lap 1','Fernando Alonso showed the importance of experience in tough, rainy conditions in qualifying','In the wet qualifying at the Circuit Gilles Villeneuve, Alonso – who led Free Practice 3 going into the session – was in sensational form, finishing P2 in Q1 and Q2 before staying there for Q3, as he ended up 0.645s adrift of pole-sitter Max Verstappen.\r\n<br><br>\r\n“It’s a surprise for sure,” said Alonso, who ran in the top five across Friday as well. “Yesterday was fast, but we’ve found sometimes we have a very fast car on Fridays and not on Saturdays, so we were not really excited about the performance yesterday. But today after being, in FP3, P1, we were like, okay, so if it keeps raining for qualifying it could be a good Saturday and it was, so happy for this.”\r\n<br><br>\r\nAsked whether he could match the Red Bulls and Ferraris on Sunday, meanwhile, Alonso replied: “They\'re in a different league for sure. It was not in our wildest dreams to be on pole position so we take the first row for sure, and that\'s maybe better than any expectations.”\r\n<br><br>\r\nStarting ahead of his compatriot Carlos Sainz in the Ferrari, Alonso revealed his goals for the race, saying: “The goal is to lead the race in Lap 1. Turn 1, maximum attack, and then after that they can go and they can fight, but it would be nice, sweet, to lead the race.\r\n<br><br>\r\n“I\'m not sure what the possibilities are for tomorrow, realistically,” he added. “I would say top five is what we should fight for. We have a very good starting position, but we know our limitations and we saw in many races already that Ferrari or Red Bull are starting last or having a puncture in Lap 1 or whatever, they still finish with a good margin in front of us. So I think the top four places are locked. So fifth is like a win for us and that\'s probably the spot would should aim for.”\r\n<br><br>\r\nEsteban Ocon made it two Alpines in the top 10 in qualifying in Canada – Mercedes and Haas the only other two teams to get both cars into Q3. But Ocon was a frustrated P7 at the end of qualifying, saying: “No, not very pleased. I’m extremely pleased for the team, delighted for Fernando.\r\n<br><br>\r\n“It’s beautiful to see him up there, he’s been driving brilliantly since the beginning of the weekend, that paid off in qualifying, so that’s fantastic. And it means that the performance is there with the car, and we are progressing.<br>','./images/1655654003.png','sport',0),(20,'2022-06-19','No regrets for Russell','George Russell believes that he had the opportunity to do “something extraordinary” in qualifying','Russell made the decision to switch to a set of soft tyres for his final run in Q3, but with parts of the track still wet, he was unable to get temperature into his tyres and failed to register a final lap, after spinning into the barrier at Turn 2.\r\n<br><br>\r\nWhile Russell admitted that he could have ended up as high as third had he stayed on the intermediate tyres, he backed his aggressive decision to try something different and shoot for pole.\r\n<br><br>\r\n“I\'m not all really,” said Russell, when asked if he was disappointed with how qualifying had played out. “Had I stayed on inters, I would have qualified P3, P4, which okay is not a bad result. But in a scenario like that, you’ve got the opportunity to maybe do something extraordinary and go for pole.\r\n<br><br>\r\n“In Sochi last year we did that with Williams and qualified P3 and it doesn’t take a lot for that just to change. So, glad I went for it, glad we tried it, obviously was not meant to be today but that’s what you’ve got to do sometimes.”\r\nRussell will now start the race on the fourth row alongside the Alpine of Esteban Ocon. And while he believes Mercedes should have good pace in the race, he says overtaking could be difficult for his team on Sunday.\r\n<br><br>\r\n“I think it might be a little bit tricky to overtake because we are lacking a bit of straight-line speed,” admitted Russell. “We’ve got good pace compared to the teams around us, so hopefully we can do something on the strategy to get ahead of Haas and Ocon.”\r\nRussell’s team mate Lewis Hamilton chose to stay out on the intermediate tyre for his last run and wound up in fourth – his highest qualifying position of the year. And while he was grateful to start so high, he said it could have been better.<br><br>','./images/1655654255.png','sport',0),(21,'2022-06-19','Ukraine and US-German bond','Russia\'s invasion of Ukraine has unified the West, with US-German relations at the forefront.','US-German relations are experiencing a renaissance. After a stressful two decades, which saw tensions between Germany and the United States rise due to the Iraq War, spying revelations, and former President Donald Trump\'s frequent taunts, that is no small feat.\r\n<br><br>\r\nRussia\'s war in Ukraine has given the relationship renewed purpose, but observers of the alliance say the rekindling was already underway before the invasion. The Cold War accompanied President Joe Biden\'s political ascent, and his foreign policy team and actions reflect Europe as his comfort zone.\r\n<br><br>\r\n\"[The war in Ukraine] has had a galvanizing effect on the entire Atlantic alliance, and Germany is no exception,\" Daniel Benjamin, a former State Department official and now president of the American Academy in Berlin, told DW. \"The new administration came in with a particular focus on Germany and a desire to repair the harm that had been done to the relationship.\".\r\nCommon cause to oppose Russia has hastened the repair work. US officials were delighted when Chancellor Olaf Scholz announced that his government was effectively killing the Nord Stream 2 gas pipeline, which President Joe Biden has called a \"bad deal for Europe.\"Instead, Germany says it is scrambling to expand liquid natural gas terminals that would increase the country\'s ability to import the fuel from the US.\r\n<br><br>\r\nThe US has thrown more at the fight against Russia, in both absolute terms and relative to GDP, and Germany has struggled to shake its reputation of not pulling its weight within the broader NATO alliance. Through June 7, Germany has delivered to Ukraine 35% of the military aid it has committed, according to the Kiel Institute for the World Economy. The US has made good on nearly half, while other countries, such as Poland and Baltic states are at or near 100%.\r\n<br><br>\r\nIn the Trump era, the lackluster figures may have prompted a public dressing down. The Biden administration has taken a different tack.\r\n<br><br>\r\n\"We applaud Germany\'s contributions and strongly encourage it and other countries to provide the necessary military equipment for Ukraine to defend itself against Russia,\" Joe Giordono-Scholz, the spokesperson for the US Embassy in Germany, told DW in a statement.\r\n<br><br>\r\nCooperation between the US and allies like Germany, which he called \"unprecedented,\" goes beyond Ukraine, and is \"designed to reinforce each other and intensify over time.\"','./images/1655654712.png','politik',0),(22,'2022-06-19','Zelenskyy visits front line','The Ukrainian president visited soldiers on the southern front line during a visit to Mykolaiv.','According to Russian General Mikhail Mizintsev, approximately two million Ukrainians have been brought to Russia since the invasion began on February 24.\r\n<br><br>\r\nMizintsev said the number includes 307,000 children. On Saturday, 29,730 people were taken by Russian forces out of Ukraine.\r\n<br><br>\r\nMoscow claims the mass movement is to evacuate people from areas of Donetsk and Luhansk in the Donbas where fighting is raging. Ukraine asserts that Russia is blocking access to lands controlled by Kyiv and in effect deporting people to Russia.\r\n<br><br>\r\nMany of those deported to Russia have reentered Ukraine through third countries after experiencing Russian \"filtration camps\" set up to process Ukrainians being \"evacuated\" to Russia.\r\nCivilians sheltering at the Azot chemical plant in Sievierodonetsk refused to evacuate, the governor of Ukraine\'s Luhansk region Serhiy Haidai said on Sunday.\r\n<br><br>\r\nHe also said that despite the destruction of all bridges leading to Sievierodonetsk, there are ways to evacuate people from the city and bring needed goods.\r\n<br><br>\r\nAccording to Haidai, Russia is sending all of its reserve troops to Sievierodonetsk to try and take full control of the eastern front-line city, but to no avail.\r\n<br><br>\r\nThe neighboring city of Lysychansk is fully under Ukrainian control, the governor said.\r\nBritish Prime Minister Boris Johnson thanked Ukrainian President Volodymyr Zelenskyy for hosting him during a visit to Ukraine on Friday.\r\n<br><br>\r\n\"It was incredibly moving to walk the streets of Kyiv with you once more, to pay tribute to your fallen soldiers whose sacrifice, unconquerable courage and bravery we will never forget,\" Johnson wrote on Twitter.\r\n<br><br>\r\nIt was Johnson\'s second trip to Kyiv since Russian invasion. He came a day after the leaders of Germany, France, Italy and Romania visited Kyiv where they offered their support for Ukraine\'s bid for EU candidate status.\r\n<br><br>\r\nJohnson said Britain would give Ukraine the \"strategic endurance\" needed to continue the war, by training up to 10,000 Ukrainian soldiers several times a year in an unspecified location outside the country.<br><br>','./images/1655655041.png','politik',0),(23,'2022-06-19','France\'s elections','Emmanuel Macron\'s centrist alliance barely edged out Jean-Luc Melenchon\'s NUPES in the first round','French voters are gearing up to vote once again on Sunday, after bestowing another mandate on Emmanuel Macron in April and taking part in the first round of the parliamentary elections last weekend.\r\n<br><br>\r\nThe principal second round battle will be fought between Macron\'s centrist Ensemble and Jean-Luc Melenchon\'s left-wing NUPES.\r\n<br><br>\r\nLast weekend\'s ballot put Ensemble ahead of NUPES, but the advantage was razor-thin: Ensemble secured 25.75% of the popular vote to NUPES\' 25.66% nationwide. Thanks to France\'s electoral system, however, the outcome will only be decided this Sunday when two top candidates from nearly all 577 constituencies go head-to-head.\r\nWhat\'s at stake for Macron?\r\n<br><br>\r\nMost analysts expect Macron\'s bloc to win the knockout round by luring more moderate voters away from far-left NUPES. Even some left-wingers might turn away from Melenchon, political science researcher Bruno Cautres told DW.\r\n<br><br>\r\n\"They think Melenchon is too far-left and are put off by his stance on international alliances and his historical proximity with Russian leader, Vladimir Putin,\" Cautres said ahead of the initial vote.\r\n<br><br>\r\nEven so, Macron could lose his parliamentary majority and possibly be forced into a coalition government with right-wing parties, dashing his plans for wide-reaching economic reforms.\r\n<br><br>\r\nThe 44-year-old president wants to raise retirement age from 62 to 65, cut taxes and further deregulate the labor market. He has also pledged to build more nuclear power plants, and build up an economy that aims to cut greenhouse gas emissions to net zero by 2050.','./images/1655655244.png','politik',0);
/*!40000 ALTER TABLE `vijesti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 18:46:33

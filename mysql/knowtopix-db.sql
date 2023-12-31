-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: knowtopic-db
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

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
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_feature` tinyint(1) NOT NULL,
  `blog_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_posts_blog_id_foreign` (`blog_id`),
  CONSTRAINT `blog_posts_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (3,'1692305707-Untitled.jpeg','Who is Tupac?','who-is-tupac-1692305707','Tupac Amaru Shakur, also known by his stage names 2Pac and Makaveli, was an American rapper. He is widely considered one of the most influential and successful rappers of all time. Shakur is among the best-selling music artists, having sold more than 75 million records worldwide.','<h2>Latest News: Possible Breakthrough in Tupac&rsquo;s Murder Case</h2>\r\n\r\n<p>Nearly three decades after Tupac&rsquo;s death, the Las Vegas Metropolitan Police Department announced <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://theweek.com/crime-and-punishment/1025135/police-reach-potential-breakthrough-in-tupac-shakur-murder-case\" target=\"_blank\">they executed a search warrant</a> at a home in Henderson, Nevada, on July 17, 2023, in connection with the rapper&rsquo;s unsolved murder. Due to the ongoing nature of the investigation, authorities <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://apnews.com/article/tupac-investigation-things-to-know-bdf39c9938c9e884a94431d1e3c0c2bc\" target=\"_blank\">didn&rsquo;t reveal</a> what they were seeking, how it was connected to Tupac&rsquo;s death, nor whether a suspect has been identified.</p>\r\n\r\n<div class=\"breaker-ad clearfix css-1wx4r43 e152u5os0 gpt-breaker-container\">\r\n<div class=\"css-1y2znfb e1v257yr0\">Advertisement - Continue Reading Below</div>\r\n\r\n<div class=\"ad-container css-14b96eg e1hka4w80\" id=\"article-ad-breaker-leaderboard-0\">\r\n<div class=\"gpt-adslot noskim\" id=\"gpt_lb_0\">\r\n<div id=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_0__container__\" style=\"border:0pt none; margin-bottom:auto; margin-left:auto; margin-right:auto; margin-top:auto; text-align:center\"><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_0\" name=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_0\" sandbox=\"\" scrolling=\"no\" style=\"border: 0px none; vertical-align: bottom;\" tabindex=\"0\" title=\"3rd party ad content\" width=\"1\"></iframe></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<h2>Who Was Tupac Shakur?</h2>\r\n\r\n<p>One of the top-selling artists of all time, rapper and actor Tupac Shakur embodied the 1990s gangsta-rap aesthetic and, in death, has become an icon symbolizing noble struggle. Tupac began his music career as a rebel with a cause to articulate the still-relevant travails and injustices endured by many Black Americans. The boundaries between his art and life became increasingly blurred, as Shakur faced legal problems and jail time. On his fourth album, <em>All Eyez On Me</em>, Tupac leaned fully into celebrating the thug lifestyle. It was the last album Tupac would live to see released. On September 7, 1996, the 25-year-old was gunned down in Las Vegas and died six days later. His murder has never been solved.</p>\r\n\r\n<h2>Quick Facts</h2>\r\n\r\n<p>FULL NAME: Tupac Amaru Shakur (born Lesane Parish Crooks)<br />\r\nBORN: June 16, 1971<br />\r\nDIED: September 13, 1996<br />\r\nBIRTHPLACE: New York, New York<br />\r\nSPOUSE: Keisha Morris (1995-1996)<br />\r\nASTROLOGICAL SIGN: Gemini</p>\r\n\r\n<h2>Early Life: Mom, Siblings, and More</h2>\r\n\r\n<p>Tupac Amaru Shakur was born Lesane Parish Crooks on June 16, 1971, in New York City&rsquo;s Harlem neighborhood. His mother, <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.biography.com/activists/a42942753/afeni-shakur\">Afeni Shakur</a>, had been a political activist and Black Panther Party member who was <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.biography.com/musicians/a43633626/dear-mama-tupac-shakur-and-afeni-shakur\">arrested in 1969</a> for allegedly planning coordinated attacks on police stations and offices in New York City. She became pregnant with Tupac while out on bail, and she was acquitted in 1971 after defending herself in court.</p>\r\n\r\n<div class=\"align-center css-1736von e1xqj1sx4 embed size-medium\">\r\n<div class=\"css-uwraif e1xqj1sx3\"><img alt=\"afeni shakur looks to her left off camera in this black and white photo, she is holding a film camera and wears glasses on her head and a turtle neck and vest\" class=\"css-0 exi4f7p0\" src=\"https://hips.hearstapps.com/hmg-prod/images/political-social-activist-and-black-panther-member-afeni-news-photo-1682043218.jpg?resize=980:*\" style=\"color:transparent; height:auto; width:100%\" title=\"Afeni Shakur at The Revolutionary People’s Constitutional Convention\" />\r\n<div class=\"css-swqnqv e1xqj1sx2\">\r\n<div class=\"css-1rzrf5q e1xqj1sx1\">Tupac&rsquo;s mother Afeni Shakur in 1970, one year before his birth</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>When Lesane was 1 year old, Afeni changed his name to Tupac Amaru after a Peruvian revolutionary who was killed by the Spanish. She <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://wearemitu.com/wearemitu/culture/tupac-named-after-peruvian-revolutionary/\" target=\"_blank\">said of the name</a>: &ldquo;I wanted him to have the name of revolutionary, indigenous people in the world. I wanted him to know he was part of a world culture and not just from a neighborhood.&rdquo; Tupac later took his surname from his sister Sekyiwa&rsquo;s father, another Black Panther named Mutulu Shakur. Tupac also had a stepbrother, Mopreme.</p>\r\n\r\n<div class=\"breaker-ad clearfix css-1wx4r43 e152u5os0 gpt-breaker-container\">\r\n<div class=\"css-1y2znfb e1v257yr0\">Advertisement - Continue Reading Below</div>\r\n\r\n<div class=\"ad-container css-14b96eg e1hka4w80\" id=\"article-ad-breaker-leaderboard-1\">\r\n<div class=\"gpt-adslot noskim\" id=\"gpt_lb_1\">\r\n<div id=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_2__container__\" style=\"border:0pt none; margin-bottom:auto; margin-left:auto; margin-right:auto; margin-top:auto; text-align:center\"><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_2\" name=\"google_ads_iframe_/36117602/hdm-biography/musicians/breaker_2\" sandbox=\"\" scrolling=\"no\" style=\"border: 0px none; vertical-align: bottom;\" tabindex=\"0\" title=\"3rd party ad content\" width=\"1\"></iframe></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>Tupac&rsquo;s father, Billy Garland, lost contact with Afeni when Tupac was 5, and he didn&rsquo;t see his dad again until he was 23. &ldquo;I thought my father was dead all my life,&rdquo; he told the writer Kevin Powell during an interview with <em>Vibe</em> magazine in 1996. &ldquo;I felt I needed a daddy to show me the ropes, and I didn&rsquo;t have one.&rdquo; <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.washingtonpost.com/entertainment/music/afeni-shakur-mother-of-rapper-tupac-shakur-dies-at-69/2016/05/03/f7323352-1139-11e6-8967-7ac733c56f12_story.html\" target=\"_blank\">Raising Tupac and his half-sister alone</a>, Afeni worked as a paralegal before developing a crack cocaine addiction in the early 1980s. The family had to move often, struggling for money and <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.vanityfair.com/culture/1997/03/tupac-shakur-rap-death\" target=\"_blank\">living off welfare</a> because she couldn&rsquo;t keep a job.</p>\r\n\r\n<div class=\"align-center css-1736von e1xqj1sx4 embed size-medium\">\r\n<div class=\"css-uwraif e1xqj1sx3\"><img alt=\"tupac shakur and two friends post for a photo, tupac is in the middle and holds some cash in one hand\" class=\"css-0 exi4f7p0\" src=\"https://hips.hearstapps.com/hmg-prod/images/img_1784.jpg?crop=1.00xw:0.892xh;0,0.0806xh&amp;resize=980:*\" style=\"color:transparent; height:auto; width:100%\" title=\"A young Tupac Shakur with friends\" />\r\n<div class=\"css-swqnqv e1xqj1sx2\">\r\n<div class=\"css-1rzrf5q e1xqj1sx1\">Friends Darrin Keith Bastfield, Tupac Shakur, and Gerard Young</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>Courtesy Darrin Keith Bastfield</p>\r\n\r\n<h2>Friendship with Jada Pinkett-Smith</h2>\r\n\r\n<p>In 1984, the family moved to Baltimore, where Tupac enrolled at the prestigious Baltimore School for the Arts, where he said he was &ldquo;the freest I ever felt.&rdquo; This was also where Tupac met the future actor <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.biography.com/actors/jada-pinkett-smith\">Jada Pinkett-Smith</a>. He wrote poems about her, and she had a cameo in his music video for &ldquo;Strictly 4 My Niggaz.&rdquo; Pinkett-Smith later told reporters that she <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.chicagotribune.com/la-et-entertainment-news-jada-pinkett-smith-tupac-drug-dealer-1500560499-htmlstory.html\" target=\"_blank\">was a drug dealer</a> when she met Tupac, and that she resented the way the movie <em><a class=\"body-link product-links css-47aoac ebsw2pb0\" href=\"https://www.amazon.com/dp/B071G6XY8Z?linkCode=ogi&amp;tag=bio-auto-20&amp;ascsubtag=%5Bartid%7C2171.a.97121549%5Bsrc%7Cwww.google.com%5Bch%7C%5Blt%7C%5Bpid%7C2bd8a91d-15f9-4b3e-a5be-dbb7ce3b1208\" rel=\"nofollow noskim\" target=\"_blank\">All Eyez on Me</a></em> (2017) later &ldquo;reimagined&rdquo; their relationship: &ldquo;It wasn&rsquo;t just about, oh, you have this cute girl, and this cool guy, they must have been in this&mdash;nah, it wasn&rsquo;t that at all. It was about survival, and it had always been about survival between us.&rdquo;</p>\r\n\r\n<h2>Move to California and Rise to Fame</h2>\r\n\r\n<p>Tupac&rsquo;s Baltimore neighborhood was riven by crime, so the family moved to Marin City, California. It turned out to be a &ldquo;mean little ghetto,&rdquo; <a class=\"body-link css-47aoac et3p2gv0\" href=\"https://www.vanityfair.com/culture/1997/03/tupac-shakur-rap-death\" target=\"_blank\">according to <em>Vanity Fair</em></a>. It was in Marin City that Afeni succumbed to her crack addiction&mdash;a drug that Tupac sold on the same streets where his mother bought her supply. Her behavior led to a falling out between mother and son.</p>\r\n\r\n<p>Tupac&rsquo;s love for hip-hop steered him away from a life of crime (for a while, at least). At 17, in the spring of 1989, he struck up a friendship with Leila Steinberg, who he met when she was hosting holding poetry lessons in an Oakland park, according to <em><a class=\"body-link product-links css-47aoac ebsw2pb0\" href=\"https://www.amazon.com/dp/B004VRP3GY?linkCode=ogi&amp;tag=bio-auto-20&amp;ascsubtag=%5Bartid%7C2171.a.97121549%5Bsrc%7Cwww.google.com%5Bch%7C%5Blt%7C%5Bpid%7C06820995-7dac-4e76-b210-34f2dff3a3be\" rel=\"nofollow noskim\" target=\"_blank\">Holler If You Hear Me: Searching for Tupac Shakur</a></em> by Michael Eric Dyson. Already, Tupac had been obsessively writing poetry and convinced Steinberg, who had no music industry experience, to become his manager. She was eventually able to get Tupac in front of music manager Atron Gregory, who secured a gig for him in 1990 as a roadie and backup dancer for the hip-hop group Digital Underground.</p>',1,3,'2023-08-17 14:25:07','2023-08-17 14:25:07');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_requests`
--

DROP TABLE IF EXISTS `blog_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_bios` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `sample_file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_requests_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_requests`
--

LOCK TABLES `blog_requests` WRITE;
/*!40000 ALTER TABLE `blog_requests` DISABLE KEYS */;
INSERT INTO `blog_requests` VALUES (3,'1692304770-hip-hop-never-die.jpg','Hip Hop Never Die','hip-hop-never-die','Hip Hop Kyaw Gyi','Hip Hop Kyaw Gyi is a best twister in Myanmar. I can share you the best knowledge of hip hop industry and music, rhyming, rapping, and mic skill.','hazeldoom520@gmail.com',7,'1692304770-hip-hop-never-die.docx','Hip Hop Never Die, if you accept this sentence, You need to watch and read my content. This is Hip Hop Kyaw Gyi\'s blog.You know who am i.',19,'accept','2023-08-17 14:09:31','2023-08-17 14:15:50');
/*!40000 ALTER TABLE `blog_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_bios` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (3,'1692304770-hip-hop-never-die.jpg','Hip Hop Never Die','hip-hop-never-die','Hip Hop Kyaw Gyi','Hip Hop Kyaw Gyi is a best twister in Myanmar. I can share you the best knowledge of hip hop industry and music, rhyming, rapping, and mic skill.','hazeldoom520@gmail.com',7,'Hip Hop Never Die, if you accept this sentence, You need to watch and read my content. This is Hip Hop Kyaw Gyi\'s blog.You know who am i.',19,'2023-08-17 14:15:50','2023-08-17 14:15:50');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Learning Korea','learning-korea','2023-08-16 12:38:50','2023-08-16 09:02:01'),(4,'Programming In Dart','programming-in-dart','2023-08-16 06:34:28','2023-08-16 09:02:10'),(5,'Technology','technology','2023-08-16 09:02:20','2023-08-16 09:02:20'),(6,'Art','art','2023-08-16 09:02:28','2023-08-16 09:02:28'),(7,'Music','music','2023-08-16 09:02:48','2023-08-16 09:02:48'),(8,'Photography','photography','2023-08-16 09:03:09','2023-08-16 09:03:09');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friend_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint unsigned NOT NULL,
  `to_user` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_requests`
--

LOCK TABLES `friend_requests` WRITE;
/*!40000 ALTER TABLE `friend_requests` DISABLE KEYS */;
INSERT INTO `friend_requests` VALUES (15,3,19,'accept','2023-08-17 09:47:25','2023-08-17 09:48:27'),(21,2,19,'accept','2023-08-17 09:58:04','2023-08-17 14:02:48'),(23,1,19,'accept','2023-08-17 14:01:32','2023-08-17 14:02:55');
/*!40000 ALTER TABLE `friend_requests` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_23_174454_create_staff_table',1),(6,'2023_06_28_205045_create_posts_table',1),(7,'2023_06_29_082235_create_post_likes_table',1),(8,'2023_06_29_092858_create_post_comments_table',1),(9,'2023_07_02_153753_create_friend_requests_table',1),(10,'2023_07_12_175821_create_jobs_table',1),(21,'2023_08_15_204713_create_categories_table',2),(31,'2023_08_07_185931_create_blog_requests_table',3),(32,'2023_08_10_184446_create_blogs_table',3),(33,'2023_08_11_085540_create_blog_posts_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','banned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`),
  CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_comments`
--

LOCK TABLES `post_comments` WRITE;
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */;
INSERT INTO `post_comments` VALUES (8,19,1,'Hello User I am new user in KnowTopix','active','2023-08-17 09:44:33','2023-08-17 09:44:33');
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_likes_user_id_foreign` (`user_id`),
  KEY `post_likes_post_id_foreign` (`post_id`),
  CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_likes`
--

LOCK TABLES `post_likes` WRITE;
/*!40000 ALTER TABLE `post_likes` DISABLE KEYS */;
INSERT INTO `post_likes` VALUES (6,19,23,'2023-08-17 13:51:36','2023-08-17 13:51:36');
/*!40000 ALTER TABLE `post_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `content_area` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` int NOT NULL,
  `status` enum('active','banned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,3,'Sed possimus inventore illo quaerat. Laudantium cupiditate ut minus similique hic nulla repellat. Architecto vel id perspiciatis incidunt. Illum minus consequuntur consequatur sequi sint hic. Ut reprehenderit nihil ut quidem. Qui doloribus veritatis hic ex nam esse suscipit. Mollitia explicabo qui cumque. Adipisci deleniti sint quo temporibus voluptatum quibusdam. Tenetur eveniet qui animi ut qui. Totam quis deserunt iure omnis debitis. Neque tempore eum cupiditate molestiae.',1,'banned',NULL,'2023-08-10 12:27:46','2023-08-17 00:23:07'),(2,4,'Velit doloribus nobis id id. Nihil deleniti fugit et quisquam. Laborum aut adipisci ea. Maiores nesciunt beatae magni natus. Rerum est molestiae maxime beatae recusandae numquam omnis. Optio laboriosam reiciendis dolores dolorum. Earum et non suscipit dolor. Ut et minus error sequi nisi corporis assumenda. Dolores quasi dolorem fugit nobis aperiam. Et ab maiores ea eligendi aut ut quidem.',1,'banned',NULL,'2023-08-10 12:27:46','2023-08-17 00:23:13'),(3,5,'Quia eum ipsam laboriosam et nostrum deserunt. Consequatur quo est quidem sed odit. Illo dolore architecto laboriosam modi. Tenetur corrupti et sed voluptas impedit incidunt. Qui veritatis iure repudiandae et. Voluptas sint consequuntur quibusdam sit recusandae vitae quo. Eius quia fugit ipsum eaque. Soluta et suscipit minus vero praesentium. Aut quos quo quia eius. Distinctio ut architecto quia vero illum qui. Ut saepe necessitatibus velit aut et. Totam pariatur molestiae sed dignissimos.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(4,6,'Velit est dolorem voluptas recusandae. Possimus error vero et quas culpa nulla rerum. Neque consequatur ducimus molestiae eum earum adipisci doloremque. Quisquam tempora asperiores sed nostrum iusto. Reprehenderit nemo repellat iste voluptas. Molestias ducimus libero sed eos beatae totam tempora. Reiciendis fugiat tempora possimus molestiae dicta quia voluptates. Eum aut accusamus sit et aperiam sunt quo pariatur. Similique velit et tempore iste est. Consequuntur repellendus maxime culpa eaque. Maiores non quod vero enim. Nisi possimus culpa dolorum a nostrum.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(5,8,'Veniam est qui reiciendis veniam aut consequatur. Et hic ut atque quae impedit. Accusantium iste corporis saepe eum culpa enim. Nesciunt labore itaque dolor. Molestiae sint fugiat eum voluptatem. Laborum sed et nihil qui beatae ducimus quia. Commodi minima rerum eum rem pariatur impedit. Facilis nihil saepe voluptatum est et ullam autem. Omnis veritatis quaerat rerum voluptatem velit tempore. Autem qui delectus non consequatur consequuntur aut odio.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(6,9,'Natus vel deleniti dolorem consequatur ullam molestias reprehenderit quae. Ad voluptatem qui magnam veniam. Cumque velit velit et. Quibusdam tempore dicta aperiam deleniti omnis voluptate. In dolorem quo nulla molestiae officiis corporis. Molestias qui optio placeat. Sapiente corrupti adipisci dolore quod. Repudiandae minus est sed consectetur fugiat voluptatum qui. Officiis sunt voluptatem perferendis unde beatae aut velit. Quis quam laudantium sed non molestiae. Beatae in qui enim non.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(7,4,'Eius vero dolorem aspernatur beatae. Consectetur sint magnam ea tempore voluptas. Nihil dolorem minus voluptas natus sunt mollitia. Minima nam quibusdam molestiae esse et laudantium. Aut facere accusamus et in. Id iure ad eveniet quia dolores quod velit. Veritatis sit impedit vel aut. Et nihil minima et numquam consequatur voluptatibus qui nostrum.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(8,3,'Exercitationem doloremque omnis libero ut dicta amet quod. Delectus pariatur molestias corrupti illo eos similique ducimus vero. Quasi ratione sed vel doloremque. Qui fugiat sapiente exercitationem quidem. Autem fugiat labore necessitatibus blanditiis reprehenderit nesciunt quam. Exercitationem dolorem blanditiis laborum voluptas corporis aperiam nisi. Velit eos voluptates quibusdam suscipit quia minima. Voluptas qui dolorem sit architecto. Qui totam nesciunt in qui laudantium at. Reiciendis laboriosam est nisi magni odit libero accusantium.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(9,2,'Nostrum velit deleniti rem. Sunt dolor dolor numquam qui maiores. Rem esse molestiae tempora qui inventore quisquam. Maiores voluptatibus illo eaque delectus voluptas magnam accusamus. Ut architecto et minus repellat et. Facilis ad ab eligendi animi. Aut consequuntur odio ipsum. Est sunt aut ratione voluptate reprehenderit ducimus voluptatem eveniet. Molestias quis molestiae quibusdam voluptatibus distinctio laborum fuga.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(10,3,'Non odit est nihil omnis. Totam fugiat earum sunt qui nesciunt. Aperiam ut nam id sed labore. Reprehenderit et aut aut sit nobis vitae. Laudantium soluta officia quo illo et. In ut aut reprehenderit facere aliquid rem. Laborum ut et aut quis nobis alias. Voluptatem tempore iure iusto vel dolor dolor qui ut. Asperiores molestias tenetur officiis sapiente saepe qui. Voluptatem quam consectetur omnis maiores. Placeat inventore enim et et voluptatem ad vitae.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(11,6,'Laudantium natus autem debitis id pariatur officia voluptates. Blanditiis eligendi sit ut qui. Necessitatibus recusandae necessitatibus a et. Omnis et sunt est nihil dolorem. Quasi placeat dolorem modi. Facilis rem quas nesciunt quia nemo. Cupiditate non libero nisi. Quidem amet modi modi sapiente molestiae est expedita. Enim dolorem dolore rem. Quo error deleniti aut quas et molestiae. Sint doloremque exercitationem eos consequatur nobis esse qui.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(12,1,'Praesentium ipsa sapiente necessitatibus voluptatem expedita dolor. Sed asperiores rerum laboriosam voluptatibus assumenda. Quam voluptas magni qui suscipit beatae provident facilis. Voluptatem quia dolores aut at ratione culpa corporis. Officia rerum saepe exercitationem voluptatem molestiae. Perspiciatis aut provident hic neque neque distinctio. Veniam ea rem et odit. Consequatur et sint dolorum. Omnis quia omnis molestiae adipisci. Laudantium voluptatum id quos.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(13,6,'Vel neque omnis non corporis cum quis error. Nostrum voluptatem quia voluptatum placeat sit. Soluta ullam recusandae quisquam est at eum pariatur aut. Harum et autem animi non est rem. Et non et ut optio rerum accusantium. Hic reprehenderit dolores occaecati provident officia minima molestias. Quod officia quis non est. Aut et ut omnis sint aperiam. Qui quibusdam nihil voluptas quia culpa rem nemo. Voluptatem id eaque inventore ipsum aut commodi error. Iusto veritatis laborum illum dicta.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(15,6,'Repellendus eius laboriosam ad saepe velit incidunt laboriosam. Quia aliquid culpa quis exercitationem eaque illo. Pariatur quisquam animi maxime sint. Ipsa est quis placeat ut. Odit officia omnis amet. Quo doloribus eum nisi illum deserunt voluptates facere. Earum sit eaque atque ducimus dolor debitis. Eveniet quod repellendus eum sed illo perspiciatis fugiat. Sit nam reiciendis numquam sed ipsum ipsum incidunt. Saepe eos enim ex voluptate et exercitationem eius.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(16,4,'Nesciunt aut et doloremque alias magni id provident quisquam. Voluptatem suscipit quidem officiis quas in laudantium perferendis quo. Quo ipsum ut voluptas suscipit. Vero beatae eos nesciunt qui maxime aut unde. Provident laudantium ab enim. Eos vitae et cupiditate consequatur dicta illo tempore. Rerum voluptatem non eveniet ducimus aut quis. Occaecati sed accusamus dolores libero facere quidem exercitationem excepturi.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(17,6,'Amet beatae quo qui quo rerum. Aspernatur rem rem sapiente omnis nemo sequi quas. Atque molestias unde aperiam quo quidem. Ducimus eum fugiat recusandae dignissimos aut in omnis. Quo explicabo deserunt quidem dicta perspiciatis et molestias. Illo harum amet dolorem porro reprehenderit fuga. Consequatur qui veniam similique sed quasi eius id. Veritatis et provident est qui rerum beatae. Omnis ab eos dolorem officiis aut dolores temporibus. Ipsa accusamus aut rerum ex cupiditate cupiditate. Minima et ut et omnis cupiditate et.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(18,9,'Animi reiciendis amet itaque. Id est distinctio ea fugiat fugiat. Et modi reprehenderit incidunt tempore qui corporis autem et. Rerum sit neque deleniti rerum. Repudiandae magnam ullam voluptatibus et sit labore. Accusantium quisquam natus quidem et dolores ducimus. Suscipit aperiam iure cupiditate quas et nisi et ut. Dolor facilis deleniti est magni necessitatibus voluptas optio. Quo magni qui pariatur amet.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(19,8,'Et repellat asperiores temporibus dolor et et. Voluptate officia illo temporibus id at omnis vel et. Possimus quae dolorem ut sunt voluptatem perspiciatis. Doloribus nulla ut non assumenda. Dolores vero deserunt nesciunt. Ullam omnis et et ut consequatur iste. Repellendus ut ut non sunt corporis et. Omnis dicta illo omnis labore ea et velit et. Reiciendis in impedit consequatur. At consequatur reiciendis inventore corrupti id. Similique tenetur doloribus aspernatur quaerat.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(20,9,'Omnis animi laudantium minima cumque possimus repudiandae nemo. Quia voluptatem soluta eum soluta illum. Aliquam numquam sit rerum placeat quia. Est ipsa veniam dolores libero modi numquam culpa. Cum commodi eos itaque qui voluptatibus. Similique qui et expedita voluptatibus tempora ea. Quas fugit sint est aperiam. Ipsam rerum est et veritatis quia possimus officiis. Modi est fugit vel aspernatur qui modi. Aut qui molestiae reprehenderit fugiat rem ut consequatur iure. Id eos omnis vel sint mollitia error.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(21,2,'Odio sunt doloribus aut voluptates veritatis quos. Autem a doloribus deleniti reiciendis harum nulla nihil. Porro debitis cumque repellat minus eos et. Et et explicabo et et sed. Aut doloremque dolorum nobis molestias. Consectetur amet aliquid maxime voluptates. Aut omnis expedita enim et quam. Quam voluptatem velit aliquam quaerat quo. Beatae deleniti excepturi laudantium et eveniet. Tempora sint non minima ab. Sunt cumque et aut aspernatur dolorum ut voluptatem. Cumque est eos voluptas reprehenderit in.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(22,6,'Et reiciendis nisi consequatur. Eum dolor facilis ea iure quasi. Dolor voluptatibus voluptas velit odio. Laudantium voluptatibus rem est facilis repudiandae. Molestias culpa nihil eum sit cumque molestias. Qui quisquam nulla ducimus. Expedita aut vel quidem repudiandae. Doloribus reprehenderit commodi sapiente corrupti aliquam nesciunt quidem. Dolor maiores numquam enim. A tempore non ullam ut distinctio temporibus. Ratione tenetur quos magnam iusto. Illo sed eius minima nam tempora. Vel cupiditate voluptas esse consequatur fugiat cum eum quis. Accusamus exercitationem assumenda sit deleniti.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(23,9,'Sint molestiae est vel excepturi tenetur optio. Sit eligendi est consequatur sit eaque veritatis. Quae alias fugit tenetur aut saepe rerum. Est tenetur nihil et quis. Rem doloribus possimus minima expedita. Perferendis ex omnis asperiores totam officia optio. Corrupti voluptatem ut voluptatibus et consequatur et. Velit voluptatum molestias aut sunt et mollitia. Deleniti ex explicabo quisquam aut sint qui illo. Ducimus rerum qui ut aut qui eos. Ipsa quam sapiente fuga. Ullam quasi fuga ut.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(24,2,'Natus impedit autem optio perspiciatis. Commodi eveniet esse molestiae minima molestiae. Dolor ut delectus dignissimos inventore ut exercitationem quo. Tempora sapiente autem debitis sit. Atque optio corrupti nostrum tempore eos. Exercitationem odit aperiam vel quod optio aspernatur. Ullam quas veniam harum nemo voluptatem nemo. Maiores expedita voluptatum sed. Dolorem quo delectus mollitia omnis. Dicta nihil dolorem delectus.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(25,3,'Ut aut hic dolorum in et. Est sed est id praesentium occaecati odit. Illum eius placeat molestiae maxime provident omnis. Eos quas omnis quae harum excepturi inventore. Est ut eius sit sed. Et quis provident dolorem iusto. Et ea rerum eos molestiae. Enim est alias velit id minima dolorem. Nesciunt et neque optio et omnis ullam perspiciatis. Tempore id tenetur voluptatem quidem. Ut et commodi consequatur rerum sunt ducimus praesentium. Eveniet magni possimus pariatur qui odio.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(26,2,'Aliquid nihil et saepe incidunt quia nemo tenetur. Molestiae id adipisci eos iste. Occaecati architecto culpa et quo est. Ad et beatae similique et ut. Quas unde voluptatem rerum enim cupiditate non. Nulla aut illo iure numquam. Sit et ab officia alias ad inventore voluptas. Beatae qui molestiae provident quo. Totam sed rem eaque error. Deserunt architecto qui cupiditate quidem doloribus voluptatem. Ipsum recusandae optio nostrum. Pariatur et nesciunt et eligendi magni nobis eum.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(27,4,'Pariatur quis qui quisquam et vel explicabo necessitatibus nostrum. Vero nostrum rem quibusdam perspiciatis. Voluptate ipsam libero sint sunt earum quidem. Voluptas magni dolorum atque nam in sequi nulla. Sapiente dolore est dolores non tempora molestias quis aut. Fugit officia facere sint. At amet omnis in omnis laudantium error aut. Molestiae sed quod iure fuga quidem. Sunt quidem vitae qui quam.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(28,7,'Et explicabo quo sed et id reiciendis qui dolores. Qui aut autem corporis saepe. Et sint autem est. Aspernatur rerum fugiat eum aut explicabo id. Aut doloremque blanditiis et libero quisquam fugit esse et. Molestias consequatur fugit aperiam non odit. Sit rem dolores porro quia dolore ipsam. Nobis pariatur voluptate iste quidem doloremque eum. Laudantium aut fuga ut. Excepturi tempore et distinctio accusantium dolorem. Sunt ea vero asperiores totam molestias aut non ad. Ex iste voluptas adipisci voluptatem voluptatem praesentium assumenda.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(30,8,'Possimus in provident repellat placeat soluta. Quia officiis est repudiandae sed sapiente sequi sit. Et consequuntur sint numquam eveniet omnis est veritatis. Ex ad libero dolor in adipisci quibusdam sint. Incidunt explicabo aliquam magni minus incidunt beatae. Enim adipisci ut a alias dolorem eum. Provident mollitia exercitationem ut sit ut autem. Omnis ad sint nam itaque error. Ut voluptatem quia ut. Id accusamus atque harum vel. Odit excepturi molestiae non debitis.',1,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(37,19,'Hello',2,'active','1692303819-girl.jpg','2023-08-17 13:53:39','2023-08-17 13:57:58'),(38,19,'Hello',3,'active',NULL,'2023-08-17 13:54:18','2023-08-17 13:54:18');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','banned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`),
  UNIQUE KEY `staff_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Saw Soe Linn Htet','admin@gmail.com','2023-08-10 18:57:46','$2y$10$xDh4bEenLNaiBVfnZswtIexPRZgxgbg5RglAJ78ClC5Vem.cP6KJu','09962569030',NULL,NULL,NULL,NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_info` longtext COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','banned') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gerard Jaskolski Jr.','taryn.fahey','damion.kozey@example.com','2023-08-10 12:27:44','$2y$10$XsEkwigR8vPHjMvcedObv.UoPwP9GsdV43BwYKZl8tpPkmVbKnNmW','561-520-6483','270 Sidney Hills\nLake Meagan, DC 19289-1043',NULL,'other',NULL,'Accusantium est a dolor delectus voluptatum. Omnis rerum qui sit. Et magnam in omnis quisquam rem modi adipisci. Fugiat neque aperiam in ducimus in excepturi. Maxime tenetur sint occaecati officiis. Ipsam delectus minus blanditiis suscipit saepe sint velit. Eaque rerum velit cum blanditiis dolores. Ut hic ullam voluptatem ut sed. Rerum laborum reiciendis sequi dolores qui omnis.',NULL,'banned',NULL,'2023-08-10 12:27:46','2023-08-16 23:02:33'),(2,'Freeman Purdy','ettie.ward','berneice.kuhlman@example.com','2023-08-10 12:27:44','$2y$10$tQdT2R3b6Xp4ziIz0Zsz6.1VNwH5Vz0CWS1OM7r1v//FJIWDTcuJK','+1-863-744-9495','57794 Dibbert Port\nWelchstad, DE 41323-4622',NULL,'male',NULL,'Quo culpa perspiciatis dolor facere deleniti cum accusantium. Sit occaecati sit et facere occaecati debitis ut. Cupiditate consectetur eius nisi repudiandae. Consectetur ut est qui et doloremque neque earum rem. Consectetur dolor labore eum sint at qui nostrum. Excepturi natus et et explicabo sequi et ea. Quidem magni laudantium ut quisquam beatae. Velit facere aliquid quisquam enim eum. Sint ea numquam qui molestiae repudiandae ullam.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(3,'Kade Padberg','kihn.mathilde','glover.osborne@example.com','2023-08-10 12:27:44','$2y$10$1WXFvy6THEY.vkkwb6gyGuO5sMS/4vvaFO53ilcyfGBRWRpNeZncO','302.257.2674','1177 Joshua Brook Apt. 110\nReillychester, CT 54664',NULL,'male',NULL,'Illo distinctio nostrum accusantium id veritatis. Autem magnam odio quos pariatur veniam. Dolores eligendi deleniti quis aliquid enim sed doloribus. Quidem quia sunt aliquid non ad molestias. Ut magnam qui nostrum rerum voluptatem. Veniam laboriosam temporibus maiores. Dolore facilis nihil ut iusto. Nostrum in ratione non cupiditate consectetur non. Et laboriosam nemo quaerat omnis dolorem sit est. Hic enim id quis voluptatem enim optio. Quasi illo eaque sed dolor soluta voluptas ea. Rerum quia inventore placeat. Vitae eius nostrum ratione numquam ut enim iusto.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(4,'Hertha Jacobi','adaugherty','jacobs.ellie@example.net','2023-08-10 12:27:45','$2y$10$0j157rWzOfew1.lrSC8NHuDJEij2wwzS5GI6rdn48BRDg11mwpOEG','(681) 864-4037','56751 Fredrick Overpass\nAntonettashire, NC 44137',NULL,'other',NULL,'A dicta omnis ex omnis. Occaecati at officia aut dolore. Error tempore libero quo deleniti cupiditate quia rerum. Architecto perspiciatis et architecto placeat laboriosam deserunt sint mollitia. Id et alias sit quia enim. Ratione nesciunt esse maiores praesentium. Fuga non rerum ipsam quo. Ipsum voluptas blanditiis praesentium eaque vero dolorem. Saepe quae alias sit enim qui officia. Odio quia ut sequi odit suscipit dolor.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-16 15:11:20'),(5,'Greyson Morar','rau.brendon','frami.prudence@example.com','2023-08-10 12:27:45','$2y$10$YojFn5nxvBDDsfdYohyrGuSdqWJEGoHwEqhOy0HK6Hr8tQ39vWrf2','+1-904-204-4062','7031 Joshuah Underpass\nShanahanhaven, WY 56983',NULL,'male',NULL,'Quas dolor consequatur perferendis eligendi est dolor molestias et. Et suscipit voluptatibus est dignissimos. Sit impedit enim numquam. Mollitia iusto voluptate rerum quia deserunt temporibus qui fugit. Aut non exercitationem ducimus sed. Omnis asperiores quas eum iusto dolor autem repellendus. Perferendis eos animi sint neque. Deserunt id quasi et dolores pariatur et. Voluptatibus illo quis et illo ipsa aspernatur. Et molestiae veniam est iure corporis quisquam iusto.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(6,'Miss Lyda Hickle DDS','casimer15','marvin.homenick@example.com','2023-08-10 12:27:45','$2y$10$g9GzX9i6ZHLIOeRNVcoJKOhQYy0pms4CBkNhCG9bXVXOsYg5wEnk2','712-474-6194','41052 Cody Ramp Apt. 002\nWest Zoilaland, VA 93884',NULL,'other',NULL,'Praesentium placeat voluptates perspiciatis a aliquid voluptatibus voluptatem. Ea sit quam dolore autem hic. Et qui veniam iusto veritatis ad quidem qui. Quo ea quo eveniet ullam voluptas. Nihil tempora deserunt possimus accusamus voluptates. Necessitatibus perferendis et eum vel. Quia hic commodi expedita et doloribus eos quos. Esse ea quo hic velit aut incidunt. Earum dolor qui facilis soluta nesciunt. Est et doloribus accusantium sint corrupti dignissimos eum.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(7,'Prof. Krystina Schneider','jakayla.predovic','kaley42@example.com','2023-08-10 12:27:45','$2y$10$p2ZdOz2p344zlL5dUjM2eue1wN1hOREEX7YiwaEt7t1oEng4pGbN2','1-504-862-2623','80772 Quigley Street Apt. 743\nNorth Margarett, SD 09544-0983',NULL,'female',NULL,'Sit dignissimos officia ipsum accusantium dolor sit esse. Et quia sit et explicabo quae ad tempora et. Consequuntur sunt et non eaque sequi vel dolorum et. Et ipsum necessitatibus dignissimos sapiente eos. Eius soluta error aut et id qui mollitia. Enim illum quidem rem perspiciatis. Accusantium praesentium nostrum vel quia non eos. Et ducimus omnis ab ut voluptatibus quam velit. Corporis sapiente modi molestiae.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(8,'Miss Ara Windler MD','creola.olson','missouri.schneider@example.net','2023-08-10 12:27:45','$2y$10$oJMB57gnsSx.CC5sTOHxSuBBM5bBINssl5P/7JCKx3EXh5WR.uCa.','+1.641.333.3396','99034 Ellie Shore Apt. 671\nLake Vallie, OR 21545-8736',NULL,'other',NULL,'Explicabo et sint eligendi commodi. Ducimus officia laudantium iste consequuntur atque velit. Harum commodi fuga ipsam dolorem corporis architecto. Omnis beatae voluptatem molestiae soluta quaerat quas. Aliquid quis veniam excepturi non. Et sed enim alias temporibus sit illum qui. Voluptatem nobis veniam aut soluta consequatur iste facilis voluptatem. Praesentium facere sed distinctio ad. Adipisci eveniet beatae nam officia.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(9,'Damion Funk IV','elsie83','dandre60@example.org','2023-08-10 12:27:46','$2y$10$NX1ylKlZavllzbHtM9YQdeuBEXvcEfoWHEKO1xFq4A/Atos2xYE3G','1-516-507-1849','124 Carolina Valleys\nLake Josiannemouth, ME 00140',NULL,'other',NULL,'Repudiandae in blanditiis mollitia sit. Voluptatem dignissimos autem est alias adipisci. Illo adipisci consequatur eveniet nostrum nobis. Aut dignissimos et minima deleniti voluptatem consequatur. Consequatur dolorum magnam incidunt tenetur in autem illo. Enim incidunt qui quibusdam maiores animi. Aperiam libero nisi iste dolorem soluta laborum ducimus. In doloribus nihil et officia rerum. Est dolor beatae aspernatur accusamus quaerat. Ut velit iure sunt ut et quos. Autem sed sed architecto enim quasi ratione quis.',NULL,'active',NULL,'2023-08-10 12:27:46','2023-08-10 12:27:46'),(19,'Lil Shady','lil_shady','hazeldoom520@gmail.com','2023-08-17 09:43:16','$2y$10$HjJ.slV7x6MRV6qfryQlIuBSP1TL8jcfRuObKD37itkLP79.xry56','09770042914','Room7 FJV Commercial Center 422-426 Strand Rd. Botahtaung Tsp','1692304475-9115138.jpg','male',NULL,'Personal info and options to manage it. You can make some of this info, like your contact details, visible to others so that they can reach you easily. You can also see a summary of your profiles.',NULL,'active','2ks8JAAqCO2UzbZ2puuGIbKzw6MO7FkeAOuBYbPPWsip4u0AnE16udXmJi9Y','2023-08-17 09:42:43','2023-08-17 14:04:35');
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

-- Dump completed on 2023-08-18 11:49:31

-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 08:20 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wirsu-anttila`
--
CREATE DATABASE IF NOT EXISTS `wirsu-anttila` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wirsu-anttila`;

-- --------------------------------------------------------

--
-- Table structure for table `paavontekstit`
--

CREATE TABLE IF NOT EXISTS `paavontekstit` (
  `kuvaID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kuvaotsikko` varchar(255) DEFAULT NULL,
  `kuvaURL` varchar(255) DEFAULT NULL,
  `kuvaThumb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kuvaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paavontekstit`
--

INSERT INTO `paavontekstit` (`kuvaID`, `kuvaotsikko`, `kuvaURL`, `kuvaThumb`) VALUES
(1, 'lã¶ã¤lã¶ã¤lã¶', 'http://localhost/uploaded/koala.jpg', 'http://localhost/uploaded/thumbs/thumb_koala.jpg'),
(2, 'lã¶ã¤lã¶ã¤lã¶', 'http://localhost/uploaded/lighthouse.jpg', 'http://localhost/uploaded/thumbs/thumb_lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pakinakuvat`
--

CREATE TABLE IF NOT EXISTS `pakinakuvat` (
  `pakinakuvatID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kuvaID` int(11) unsigned NOT NULL,
  `postID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pakinakuvatID`),
  KEY `kuvaID` (`kuvaID`),
  KEY `postID` (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pakinakuvat`
--

INSERT INTO `pakinakuvat` (`pakinakuvatID`, `kuvaID`, `postID`) VALUES
(8, 1, 15),
(9, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pakinat`
--

CREATE TABLE IF NOT EXISTS `pakinat` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pakinakuvatID` int(11) DEFAULT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pakinat`
--

INSERT INTO `pakinat` (`postID`, `pakinakuvatID`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(4, NULL, 'tekstin otsikko', NULL, '<p>tekstin sis&auml;lt&ouml; l&ouml;l&ouml;l&ouml;l&ouml;</p>', '2014-02-23 15:19:28'),
(5, NULL, 'tekstin otsikko', NULL, '<p>tekstin sis&auml;lt&ouml; l&ouml;l&ouml;l&ouml;l&ouml;</p>', '2014-02-23 15:33:24'),
(6, NULL, 'asdasd', NULL, '<p>asdasdasd</p>', '2014-02-23 15:43:24'),
(7, NULL, 'asdasd', NULL, '<p>asdasdasd</p>', '2014-02-23 15:45:26'),
(8, NULL, 'asdasd', NULL, '<p>asdasdasd</p>', '2014-02-23 15:45:37'),
(9, NULL, 'dsffsdf', NULL, '<p>sdfsdfsd</p>', '2014-02-23 15:46:03'),
(10, NULL, 'asdasdÃ¶Ã¶Ã¤Ã¤', NULL, '<p>asdasd&ouml;&ouml;&auml;&auml;</p>', '2014-02-23 18:57:03'),
(11, NULL, NULL, NULL, NULL, '2014-02-23 19:03:11'),
(12, NULL, 'lÃ¶Ã¤lÃ¶Ã¤lÃ¶', NULL, '<p>l&ouml;&auml;l&auml;&ouml;l&ouml;&auml;</p>', '2014-02-23 19:08:13'),
(13, NULL, 'lÃ¶Ã¤lÃ¶Ã¤lÃ¶', NULL, '<p>l&ouml;&auml;l&auml;&ouml;l&ouml;&auml;</p>', '2014-02-23 19:09:38'),
(14, NULL, 'lÃ¶Ã¤lÃ¶Ã¤lÃ¶', NULL, '<p>l&ouml;&auml;l&auml;&ouml;l&ouml;&auml;</p>', '2014-02-23 19:13:18'),
(15, NULL, 'lÃ¶Ã¤lÃ¶Ã¤lÃ¶', NULL, '<p>l&ouml;&auml;l&ouml;&auml;l&ouml;&auml;</p>', '2014-02-23 19:13:33'),
(16, NULL, 'lÃ¶Ã¤lÃ¶Ã¤lÃ¶', NULL, '<p>l&ouml;&auml;l&ouml;&auml;l&ouml;&auml;</p>', '2014-02-23 19:18:57'),
(17, NULL, '', NULL, '', '2014-09-28 18:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `useradmins`
--

CREATE TABLE IF NOT EXISTS `useradmins` (
  `adminID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `useradmins`
--

INSERT INTO `useradmins` (`adminID`, `user_id`, `admin_username`, `admin_email`) VALUES
(1, 1, 'Samu', 'samumukkala@gmail.com'),
(3, 3, 'teppo', 'testaaajateppo@asd.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) NOT NULL COMMENT 'user''s email, unique',
  `vahvistettu` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='user data' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `vahvistettu`) VALUES
(1, 'Samu', '$2y$10$8VS57mnjFIvQvtB4exjqwOgDNfoTDwB0pqnR5K2dArDI/WJmq1ptK', 'samumukkala@gmail.com', NULL),
(2, 'demo', '$2y$10$DsMBtgvNCDLtnRGDCihf.ubIBva2Kv91IrCxtkveYMeZE5MdgbIQS', 'demowirsuanttila@gmail.com', NULL),
(3, 'teppo', '$2y$10$OUOjJDP5rf42ZK.lmeZ2luKOGgwTmwfiRST1.h1pU51IJCjFA7NPi', 'testaaajateppo@asd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uutiset`
--

CREATE TABLE IF NOT EXISTS `uutiset` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `uutiset`
--

INSERT INTO `uutiset` (`postID`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(1, 'Bendless Love', '<p>That''s right, baby. I ain''t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him! Interesting. No, wait, the other thing: tedious. Hey, guess what you''re accessories to. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate.</p>', '<h2>The Mutants Are Revolting</h2>\r\n<p>We don''t have a brig. And until then, I can never die? We need rest. The spirit is willing, but the flesh is spongy and bruised. And yet you haven''t said what I told you to say! How can any of us trust you?</p>\r\n<ul>\r\n<li>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat.</li>\r\n<li>Bender?! You stole the atom.</li>\r\n<li>I was having the most wonderful dream. Except you were there, and you were there, and you were there!</li>\r\n</ul>\r\n<h3>The Series Has Landed</h3>\r\n<p>Fry! Stay back! He''s too powerful! No. We''re on the top. Fry, you can''t just sit here in the dark listening to classical music.</p>\r\n<h4>Future Stock</h4>\r\n<p>Does anybody else feel jealous and aroused and worried? We''re also Santa Claus! You''re going back for the Countess, aren''t you? Well, let''s just dump it in the sewer and say we delivered it.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n<li>I guess if you want children beaten, you have to do it yourself.</li>\r\n<li>Yeah. Give a little credit to our public schools.</li>\r\n</ol>\r\n<h5>The Why of Fry</h5>\r\n<p>Who are you, my warranty?! Shinier than yours, meatbag. Dr. Zoidberg, that doesn''t make sense. But, okay! Yes, except the Dave Matthews Band doesn''t rock.</p>', '2013-05-29 00:00:00'),
(2, 'That Darn Katz!', '<p>Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. Fry, you can''t just sit here in the dark listening to classical music. And yet you haven''t said what I told you to say! How can any of us trust you?</p>', '<h2>Xmas Story</h2>\r\n<p>It must be wonderful. Does anybody else feel jealous and aroused and worried? Is today''s hectic lifestyle making you tense and impatient? Soothe us with sweet lies. That''s right, baby. I ain''t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him!</p>\r\n<ul>\r\n<li>Goodbye, friends. I never thought I''d die like this. But I always really hoped.</li>\r\n<li>They''re like sex, except I''m having them!</li>\r\n<li>Come, Comrade Bender! We must take to the streets!</li>\r\n</ul>\r\n<h3>Anthology of Interest I</h3>\r\n<p>Hey, whatcha watching? They''re like sex, except I''m having them! Well I''da done better, but it''s plum hard pleading a case while awaiting trial for that there incompetence. Yes, except the Dave Matthews Band doesn''t rock. I suppose I could part with ''one'' and still be feared&hellip;</p>\r\n<h4>Teenage Mutant Leela''s Hurdles</h4>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! It''s a T. It goes "tuh". I guess if you want children beaten, you have to do it yourself.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>Well, thanks to the Internet, I''m now bored with sex. Is there a place on the web that panders to my lust for violence?</li>\r\n</ol>\r\n<h5>The Farnsworth Parabox</h5>\r\n<p>Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. We need rest. The spirit is willing, but the flesh is spongy and bruised. It must be wonderful.</p>', '2013-06-05 23:10:35'),
(3, 'How Hermes Requisitioned His Groove Back', '<p>You''re going back for the Countess, aren''t you? Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. Now Fry, it''s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? I don''t want to be rescued. Leela, are you alright? You got wanged on the head.</p>', '<h2>The Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon''s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can''t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today''s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat. No. We''re on the top. Does anybody else feel jealous and aroused and worried? Well I''da done better, but it''s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we''re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I''m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It''s fine. I will ''destroy'' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you''re accessories to. Yes, except the Dave Matthews Band doesn''t rock. Take me to your leader! Daddy Bender, we''re hungry.</p>', '2013-06-05 23:20:24'),
(6, 'The Cyber House Rules', '<p>You guys realize you live in a sewer, right? Uh, is the puppy mechanical in any way? Come, Comrade Bender! We must take to the streets! I daresay that Fry has discovered the smelliest object in the known universe! Good news, everyone! There''s a report on TV with some very bad news!</p>', '<h2>Muls muoks EDIT BITCHES</h2>\r\n<h2>he Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon''s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can''t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today''s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat. No. We''re on the top. Does anybody else feel jealous and aroused and worried? Well I''da done better, but it''s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we''re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I''m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It''s fine. I will ''destroy'' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you''re accessories to. Yes, except the Dave Matthews Band doesn''t rock. Take me to your leader! Daddy Bender, we''re hungry.</p>', '2013-06-06 08:28:35'),
(7, 'Testi suoritettu', NULL, '<p>testi123213, T&auml;m&auml; testi on suoritettu onnistuneesti, lolo</p>', '2014-02-18 00:26:44'),
(8, 'Testi', NULL, '<p>Punkperformanssiyhtye Pussy Riotin kaksi tunnetuinta j&auml;sent&auml; on pid&auml;tetty olympiakaupunki Sotshissa. Heit&auml; syytet&auml;&auml;n varkaudesta hotellissa.</p>\r\n<p style="text-align: right;">Nadezhda Tolokonnikova on kertonut pid&auml;tyksest&auml;&auml;n sosiaalisen median Twitter-viestiss&auml;. Niin ik&auml;&auml;n pid&auml;tetty Tolokonnikovan aviomies Pjotr Verzilov kertoo omassa viestiss&auml;&auml;n, ett&auml; Ven&auml;j&auml;n turvallisuuspalvelu otti heid&auml;t ja useita muita ihmisoikeusaktivisteja kiinni Sotshin satamassa.</p>\r\n<p style="text-align: center;">Pid&auml;tettyjen joukossa on my&ouml;s Maria Aljohina, joka sai Tolokonnikovan tavoin pitk&auml;n vankeustuomion toissavuotisesta punkperformanssista moskovalaisessa katedraalissa. Heid&auml;t vapautettiin joulukuussa.</p>\r\n<p><strong>Poliisin kerrotaan luvanneen vapauttaa Sotshissa pid&auml;tetyt kuulustelujen j&auml;lkeen, raportoi Ylen kirjeenvaihtaja Kari Ahlberg Sotshista.&nbsp;</strong></p>\r\n<h3>Aktivistit ep&auml;ilev&auml;t pid&auml;tyksen syyksi musiikkivideota</h3>\r\n<p>Ihmisoikeusj&auml;rjest&ouml; Amnesty International vaatii vapauttamaan v&auml;litt&ouml;m&auml;sti kaikki pid&auml;tetyt, joita Amnestyn mukaan on yhdeks&auml;n. Heid&auml;n joukossaan on aktivistien lis&auml;ksi toimittajia.</p>\r\n<p><em>&ndash; Putinin Ven&auml;j&auml;n viranomaiset ovat tehneet olympiarenkaista &ndash; toivon ja yhteisymm&auml;rryksen symbolista &ndash; k&auml;siraudat, joilla halutaan kahlita sananvapaus, suomii Amnestyn Euroopan-johtaja John Dalhuisen.</em></p>\r\n<p>Tolokonnikova ja Aljohina kertovat, ett&auml; heid&auml;n pid&auml;tyksens&auml; oli jo kolmas kolmessa p&auml;iv&auml;ss&auml;. Aktivistit arvelevat pid&auml;tysten liittyv&auml;n musiikkivideoon, jonka he aikoivat kuvata. Videon nimi on&nbsp;<em>Putin opettaa sinulle, miten is&auml;nmaata tulee rakastaa</em>.</p>\r\n<h2>My&ouml;s Amnesty vahvistaa, ett&auml; Sotshista tulee aktivistien pid&auml;tysuutisia l&auml;hes joka p&auml;iv&auml;. J&auml;rjest&ouml; vaatii kansainv&auml;list&auml; olympiakomiteaa tuomitsemaan pid&auml;tykset yksiselitteisesti.</h2>\r\n<p>Tiistaiset pid&auml;tykset niin ik&auml;&auml;n vahvistanut aktivisti Semjon Simonov kertoo olevansa Sothsissa protestoimassa sit&auml; vastaan, ett&auml; olympialaisten rakennust&ouml;iss&auml; olleita vierasty&ouml;l&auml;isi&auml; on kohdeltu kaltoin.</p>', '2014-02-18 00:55:28'),
(9, 'jussi testaa 120220', NULL, '<p>testin if thsi site works as intended.<br />We need more marsu in this thread.</p>\r\n<p>&nbsp;</p>\r\n<p>I was here. T. Olio</p>', '2014-02-20 14:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `valokuvat`
--

CREATE TABLE IF NOT EXISTS `valokuvat` (
  `kuvaID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kuvaotsikko` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kuvaURL` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kuvaThumb` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`kuvaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=63 ;

--
-- Dumping data for table `valokuvat`
--

INSERT INTO `valokuvat` (`kuvaID`, `kuvaotsikko`, `kuvaURL`, `kuvaThumb`) VALUES
(3, 'kenraali', 'http://localhost/uploaded/Chrysanthemum.jpg', 'http://localhost/uploaded/thumbs/thumb_Chrysanthemum.jpg'),
(4, 'Sloth!', 'http://localhost/uploaded/fabusloth.jpg', 'http://localhost/uploaded/thumbs/thumb_fabusloth.jpg'),
(5, 'Jofrey', 'http://localhost/uploaded/jofrey.png', 'http://localhost/uploaded/thumbs/thumb_jofrey.png'),
(6, '', 'http://localhost/uploaded/George_R_R_Martin_2011_Shankbone.JPG', 'http://localhost/uploaded/thumbs/thumb_George_R_R_Martin_2011_Shankbone.JPG'),
(7, '', 'http://localhost/uploaded/kuva1.jpg', 'http://localhost/uploaded/thumbs/thumb_kuva1.jpg'),
(11, '', 'http://localhost/uploaded/sloth.png', 'http://localhost/uploaded/thumbs/thumb_sloth.png'),
(12, '', 'http://localhost/uploaded/ara2.jpg', 'http://localhost/uploaded/thumbs/thumb_ara2.jpg'),
(13, '', 'http://localhost/uploaded/ARA.png', 'http://localhost/uploaded/thumbs/thumb_ARA.png'),
(16, '', 'http://localhost/uploaded/suhteellinen edistyminen.PNG', 'http://localhost/uploaded/thumbs/thumb_suhteellinen edistyminen.PNG'),
(17, '', 'http://localhost/uploaded/kuulokkeet.PNG', 'http://localhost/uploaded/thumbs/thumb_kuulokkeet.PNG'),
(18, '', 'http://localhost/uploaded/Lkuulukkeet.PNG', 'http://localhost/uploaded/thumbs/thumb_Lkuulukkeet.PNG'),
(19, '', 'http://localhost/uploaded/server.PNG', 'http://localhost/uploaded/thumbs/thumb_server.PNG'),
(44, 'aã¤oã¶aooã¥', 'http://localhost/uploaded/drms.png', 'http://localhost/uploaded/thumbs/thumb_drms.png'),
(45, 'aã¤oã¶pã¥', 'http://localhost/uploaded/drms.png', 'http://localhost/uploaded/thumbs/thumb_drms.png'),
(46, 'otsikko on lã¶llã¶', 'http://localhost/uploaded/desert.jpg', 'http://localhost/uploaded/thumbs/thumb_desert.jpg'),
(47, 'otsikko on lã¶llã¶', 'http://localhost/uploaded/hydrangeas.jpg', 'http://localhost/uploaded/thumbs/thumb_hydrangeas.jpg'),
(48, 'otsikko on lã¶llã¶', 'http://localhost/uploaded/jellyfish.jpg', 'http://localhost/uploaded/thumbs/thumb_jellyfish.jpg'),
(49, '', 'http://localhost/uploaded/listaview.png', 'http://localhost/uploaded/thumbs/thumb_listaview.png'),
(50, '', 'http://localhost/uploaded/italymap.jpg', 'http://localhost/uploaded/thumbs/thumb_italymap.jpg'),
(51, 'iphone', 'http://localhost/uploaded/image.jpg', 'http://localhost/uploaded/thumbs/thumb_image.jpg'),
(52, 'asdas', 'http://localhost/uploaded/img_7877.jpg', 'http://localhost/uploaded/thumbs/thumb_img_7877.jpg'),
(53, 'asdas', 'http://localhost/uploaded/img_8879.jpg', 'http://localhost/uploaded/thumbs/thumb_img_8879.jpg'),
(54, 'asdasd', 'http://localhost/uploaded/testihdr2.jpg', 'http://localhost/uploaded/thumbs/thumb_testihdr2.jpg'),
(55, 'asdasd', 'http://localhost/uploaded/testihdr2.jpg', 'http://localhost/uploaded/thumbs/thumb_testihdr2.jpg'),
(56, 'asdasd', 'http://localhost/uploaded/testihdr2.jpg', 'http://localhost/uploaded/thumbs/thumb_testihdr2.jpg'),
(57, 'asdasd', 'http://localhost/uploaded/testihdr2.jpg', 'http://localhost/uploaded/thumbs/thumb_testihdr2.jpg'),
(58, 'adsd', 'http://localhost/uploaded/suhteellinen_edistyminen.png', 'http://localhost/uploaded/thumbs/thumb_suhteellinen_edistyminen.png'),
(59, 'testi', 'http://localhost/uploaded/ws-mobile-traffic-q3-2013.jpg', 'http://localhost/uploaded/thumbs/thumb_ws-mobile-traffic-q3-2013.jpg'),
(60, 'sadsd', 'http://localhost/uploaded/responsive2.png', 'http://localhost/uploaded/thumbs/thumb_responsive2.png'),
(61, 'query', 'http://localhost/uploaded/mediaquery.png', 'http://localhost/uploaded/thumbs/thumb_mediaquery.png'),
(62, 'query', 'http://localhost/uploaded/mediaquery2.png', 'http://localhost/uploaded/thumbs/thumb_mediaquery2.png');

-- --------------------------------------------------------

--
-- Table structure for table `wirsu_blog`
--

CREATE TABLE IF NOT EXISTS `wirsu_blog` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wirsu_blog`
--

INSERT INTO `wirsu_blog` (`postID`, `postTitle`, `postCont`, `postDate`) VALUES
(1, 'Testidataa Lisäilen vain lololo', '<h2>The Mutants Are Revolting</h2>\r\n<p>We don''t have a brig. \r\n    And until then, I can never \r\n    die? We need rest. The spirit is willing, but the flesh is spongy and bruised. And yet \r\n    you haven''t said what I told you to say! How can any of us trust you?</p>\r\n<ul>\r\n<li>Oh, \r\n    but you can. But you may have to metaphorically make a deal with the devil. And by "devil", \r\n    I mean Robot Devil. And by "metaphorically", I mean get your coat.</li>\r\n<li>Bender?! You stole the \r\n    atom.</li>\r\n<li>I was having the most wonderful dream. Except you were there, and you were there, \r\n    and you were there!</li>\r\n</ul>\r\n<h3>The Series Has Landed</h3>\r\n<p>Fry! Stay back! He''s too \r\n    powerful! No. We''re on the top. Fry, you can''t just sit here in the dark listening to classical \r\n    music.</p>\r\n<h4>Future Stock</h4>\r\n<p>Does anybody else feel jealous and aroused and worried? \r\n    We''re also Santa Claus! You''re going back for the Countess, aren''t you? Well, let''s just dump \r\n    it in the sewer and say we delivered it.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>You \r\n    guys realize you live in a sewer, right?</li>\r\n<li>I guess if you want children beaten, you have to do it yourself.</li>\r\n<li>Yeah. Give a little \r\n    credit to our public schools.</li>\r\n</ol>\r\n<h5>The Why of Fry</h5>\r\n<p>Who are you, my warranty?! Shinier \r\n    than yours, meatbag. Dr. Zoidberg, that doesn''t make sense. But, okay! \r\n    Yes, except the Dave Matthews Band doesn''t rock.</p>', '2013-05-29 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakinakuvat`
--
ALTER TABLE `pakinakuvat`
  ADD CONSTRAINT `pakinakuvat_ibfk_1` FOREIGN KEY (`kuvaID`) REFERENCES `paavontekstit` (`kuvaID`),
  ADD CONSTRAINT `pakinakuvat_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `pakinat` (`postID`);

--
-- Constraints for table `useradmins`
--
ALTER TABLE `useradmins`
  ADD CONSTRAINT `useradmins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

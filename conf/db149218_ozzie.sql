-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- 主機: internal-db.s149218.gridserver.com
-- 產生日期: 2015 年 02 月 09 日 09:21
-- 伺服器版本: 5.1.63-rel13.4
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `db149218_ozzie`
--

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_catalog_project`
--
-- 建立時間: 2015 年 02 月 08 日 21:44
-- 最後更新: 2015 年 02 月 09 日 11:02
--

CREATE TABLE IF NOT EXISTS `ozzie_catalog_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `engtitle` varchar(255) NOT NULL,
  `sequ` tinyint(4) NOT NULL,
  `dates` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 轉存資料表中的資料 `ozzie_catalog_project`
--

INSERT INTO `ozzie_catalog_project` (`id`, `title`, `engtitle`, `sequ`, `dates`) VALUES
(8, 'Curating', '', 4, '2015-02-08 14:14:20'),
(5, 'Art Direction', 'Network Report', 5, '2014-09-29 22:06:54'),
(7, 'Exhibition Design', 'TV Report', 6, '2014-10-02 15:43:46'),
(11, 'Space', '', 3, '2015-02-08 14:38:30'),
(12, 'Visual Communication', '', 2, '2015-02-08 14:38:36'),
(13, 'Education', '', 1, '2015-02-08 14:38:42');

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_events`
--
-- 建立時間: 2015 年 02 月 09 日 11:07
-- 最後更新: 2015 年 02 月 09 日 16:04
--

CREATE TABLE IF NOT EXISTS `ozzie_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog` tinyint(4) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `img` tinytext NOT NULL,
  `isnew` tinyint(4) NOT NULL,
  `islink` tinyint(4) NOT NULL,
  `link` tinytext NOT NULL,
  `content` text NOT NULL,
  `morelink` tinytext NOT NULL,
  `link_blank` tinyint(1) NOT NULL DEFAULT '0',
  `sdates` datetime NOT NULL,
  `edates` datetime NOT NULL,
  `sequ` tinyint(4) NOT NULL,
  `dates` datetime NOT NULL,
  `img1` tinytext NOT NULL,
  `location` varchar(255) NOT NULL,
  `brick_size` varchar(2) NOT NULL DEFAULT '0',
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sdates` (`sdates`,`edates`),
  KEY `dates` (`dates`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 轉存資料表中的資料 `ozzie_events`
--

INSERT INTO `ozzie_events` (`id`, `catalog`, `title`, `subtitle`, `img`, `isnew`, `islink`, `link`, `content`, `morelink`, `link_blank`, `sdates`, `edates`, `sequ`, `dates`, `img1`, `location`, `brick_size`, `color`) VALUES
(19, 0, 'Disclaimer', '', '', 0, 0, '', '<p>&nbsp;<span style=\\"font-family: \\''Trebuchet MS\\'', \\''Heiti TC\\'', Arial, sans-serif, \\''儷黑 Pro\\'', 微軟正黑體; font-size: 15px; letter-spacing: 1px; line-height: 27px;\\">This Agreement constitutes the entire agreement between Company and you with respect to your use of the Company Web Site. Any cause of action you may have with respect to your use of the Company Web Site must be commenced within one (1) year after the claim or cause of action arises. If for any reason a court of competent jurisdiction finds any provision of the Agreement, or portion thereof, to be unenforceable, that provision shall be enforced to the maximum extent permissible so as to effect the intent of the Agreement, and the remainder of this Agreement shall continue in full force and effect. Company disclaims any and all responsibility for content contained in any third party materials provided through links from the Company Internet site.</span></p>', '', 0, '2015-02-09 00:00:00', '2015-04-18 00:00:00', 0, '2015-02-09 00:00:00', '', 'AO', '21', '#ffcd37'),
(18, 0, 'Impossible Instant Lab拍立得相機組開箱報導', '', '', 0, 0, '', '<p><span style=\\"font-family: sans-serif; line-height: 24px;\\">Polaroid停產的拍立得底片，由粉絲帶領的Impossible Project團隊集資重生，讓一票愛死Polaroid的人欣喜若狂，10╳9的大底片尺寸，再加上內建電池、以傳統底片技術顯影的迷人魅力能繼續發燒，但只能在早就停產的Polaroid拍立得上使用，讓很多過去來不及參與，想一親芳澤的人都苦惱不已，不過大家要得救了，去年他們在Kickstarter集資的Instant Lab，使用iPhone（目前僅限iOS系統的手機）就能得到Impossible Project底片獨家色調顯影的正宗拍立得魅力，這麼誘人的新玩意，你怎麼能錯過？&nbsp;</span></p>', 'http://www.gq.com.tw/whats-in/features/content-15952.html', 0, '2015-02-06 00:00:00', '2015-02-28 00:00:00', 0, '2015-02-09 00:00:00', '', 'SI', '11', '#8c69ff');

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_news`
--
-- 建立時間: 2015 年 02 月 09 日 11:06
-- 最後更新: 2015 年 02 月 09 日 15:47
--

CREATE TABLE IF NOT EXISTS `ozzie_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog` tinyint(4) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `img` tinytext NOT NULL,
  `isnew` tinyint(4) NOT NULL,
  `islink` tinyint(4) NOT NULL,
  `link` tinytext NOT NULL,
  `content` text NOT NULL,
  `morelink` tinytext NOT NULL,
  `link_blank` tinyint(1) NOT NULL DEFAULT '0',
  `sdates` datetime NOT NULL,
  `edates` datetime NOT NULL,
  `sequ` tinyint(4) NOT NULL,
  `dates` datetime NOT NULL,
  `img1` tinytext NOT NULL,
  `location` varchar(255) NOT NULL,
  `brick_size` varchar(2) NOT NULL DEFAULT '0',
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sdates` (`sdates`,`edates`),
  KEY `dates` (`dates`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 轉存資料表中的資料 `ozzie_news`
--

INSERT INTO `ozzie_news` (`id`, `catalog`, `title`, `subtitle`, `img`, `isnew`, `islink`, `link`, `content`, `morelink`, `link_blank`, `sdates`, `edates`, `sequ`, `dates`, `img1`, `location`, `brick_size`, `color`) VALUES
(4, 5, '精湛工藝，醇釀人文旨趣 －－ 以創意重現經典韓劇設計元素！', '設計家 Searchome報導', '001.jpg', 1, 0, '', '<p>本案為地段好、格局採光也一流的新成屋，而它的擁有者；是位有主見且事業成功的傑出女性，有鑑於屋主對於新宅的高度期待，星葉設計 執行長林峰安和 總監廖毓卿在接手後，特別用心去聆聽、揣摩使用端的喜好與需求，運用細膩的格局微調，打造流暢的生活動線與轉折皆美的大器景深，其中包括公私領域多處連續面的經營、空間性格的塑造以及軟硬體高質感的呈現，處處都有令人驚艷的設計亮點。</p>', 'http://www.searchome.net/article.aspx?id=25518', 0, '2014-10-07 00:00:00', '2016-04-02 00:00:00', 0, '2015-02-09 00:00:00', '9-20140719SL09C41 (2).jpg', 'TW', '21', '#fdff69'),
(5, 5, '空間超放大！7坪小宅樓中樓 住2人還有2隻毛小孩', '設計家 Searchome報導', '002.jpg', 1, 0, '', '<p>走進 7 坪的小宅中，可見到客廳以大片落地增添居宅高度，在陽光下呈現挑高的感受，並採用內嵌電視牆打造俐落的居家風格，牆面的細緻橫紋在無形中加寬立面，延伸了空間視覺；廚房壁面與天花內嵌燈光互映成清爽的空間質感，並在上方設計夾層，加強小坪數的地坪運用；梯階利用木質色調與白色調的相互交錯，延伸出層次感，電視牆後方配置內嵌燈光照射，加強上下樓的安全機能性...</p>', 'http://www.searchome.net/article.aspx?id=25101', 0, '2014-10-06 00:00:00', '2016-01-30 00:00:00', 0, '2015-02-09 00:00:00', '5 (10).jpg', 'NP', '11', '#FF47AF'),
(6, 5, '清新自然好古典，清爽高雅的新古典居家', '設計家 Searchome報導', '003 (1).jpg', 0, 0, '', '<p>屋主喜歡古典風格的典雅高貴，但又不喜歡過於繁瑣的設計，因此期望能藉由設計師的規劃，營造一個看起來幽雅同時也簡單清爽的居家空間。本案以淺色系為主要的色調，結合各式的古典設計元素，營造出屋主期望的居家。 公共空間的設計上，設計師巧妙地藉由櫃體和各種機能性的設計手法來創造空間格局。如玄關與餐廳之間利用雙面櫃區隔，而閱讀區和客廳則藉由具有收納機能的木作矮牆區分。這些機能結合具有視覺美感的元素設計，創造出開放寬廣的新古典居家空間。</p>', 'http://www.searchome.net/article.aspx?id=21594', 0, '2014-10-05 00:00:00', '2017-03-31 00:00:00', 0, '2015-02-09 00:00:00', '4(封面) (4).jpg', 'DZ', '22', '#125b00'),
(18, 0, 'Form validation with jQuery', '', '', 0, 0, '', '<h1 class=\\"toc-linked\\" id=\\"link-validate-forms-like-you-ve-never-validated-before\\" style=\\"margin: 1.714285714rem 0px; padding: 0px; border: 0px; font-size: 1.5rem; vertical-align: baseline; clear: both; line-height: 1.5; color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif;\\">&nbsp;Validate forms like you&#39;ve never validated before!</h1>\r\n\r\n<p style=\\"margin: 0px 0px 1.714285714rem; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif;\\"><strong style=\\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\\">&quot;But doesn&#39;t jQuery make it easy to write your own validation plugin?&quot;</strong><br />\r\nSure, but there are still a lot of subtleties to take care of: You need a standard library of validation methods (such as emails, URLs, credit card numbers). You need to place error messages in the DOM and show and hide them when appropriate. You want to react to more than just a submit event, like keyup and blur.<br />\r\nYou may need different ways to specify validation rules acc</p>', '', 0, '2015-02-13 00:00:00', '2015-03-13 00:00:00', 0, '2015-02-09 00:00:00', '', 'VE', '11', '#41ffcf'),
(9, 5, '用反射和光影照亮迷幻黑白空間', '設計家 Searchome報導', '006.jpg', 0, 0, '', '<p>喜歡現代風格的人，一定不會錯過黑、白兩色的運用，以黑白色彩拼湊出各種的空間語彙，但在此案中，設計師大量運用了反射感極佳的亮面材質，大玩空間中光影的變幻光彩，豐富整個居家生命力，讓每一個角落空間都能帶出不同的空間表情。</p>', 'http://www.searchome.net/article.aspx?id=21342', 0, '2014-10-01 00:00:00', '2016-02-19 00:00:00', 0, '2015-02-09 00:00:00', '006-2.jpg', 'TD', '11', '#FF47AF'),
(12, 7, '偶像劇場景再現 人文時尚空間', '幸福空間', 'AAA (1).jpg', 1, 1, 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1781', '', 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1781', 0, '2014-10-07 00:00:00', '2017-01-01 00:00:00', 0, '2015-02-09 00:00:00', 'AAA (2).jpg', 'DZ', '21', '#9bedff'),
(13, 7, '東森亞洲台-寶島自由行2014/08/27播出 Part2', '幸福空間', '7-20140719SL22AC41.jpg', 1, 1, 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1790', '<p><strong style=\\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; line-height: 24px;\\">&quot;But doesn&#39;t jQuery make it easy to write your own validation plugin?&quot;</strong><br style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\" />\r\n<span style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\">Sure, but there are still a lot of subtleties to take care of: You need a standard library of validation methods (such as emails, URLs, credit card numbers). You need to place error messages in the DOM and show and hide them when appropriate. You want to react to more than just a submit event, like keyup and blur.</span><br style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\" />\r\n<span style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\">You may need different ways to specify validation rules according to the server-side enviroment you are using on different projects. And after all, you don&#39;t want to reinvent the wheel, do you?</span></p>', 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1790', 1, '2014-10-08 00:00:00', '2017-01-01 00:00:00', 0, '2015-02-09 00:00:00', '7-20140719SL22AC41 (1).jpg', 'SZ', '12', '#f3cdff'),
(15, 3, '偶像劇場景再現 人文時尚空間2', '幸福空間雜誌', 'MX-2310U_20150113_112644_001.jpg', 1, 0, '', '<p>從事旅遊業的七年級女生，對於生活品味有著過於常人的敏銳嗅覺。星葉室內裝修設<br />\r\n計，平衡美感與機能的比例拿捏，以屋主嚮往的經典偶像劇作為基底設定，佐以豐富媒材<br />\r\n的鋪陳刻劃，呈現出人文時尚的空間氣質，重新詮釋開敞格局的視界關係。</p>', 'http://www.books.com.tw/exep/prod/magazine/mag_retail.php?item=R030045955', 0, '2015-01-13 11:26:40', '2017-02-01 00:00:00', 0, '2015-02-09 00:00:00', 'MX-2310U_20150113_112644_001 (1).jpg', 'AS', '11', '#FF47AF'),
(16, 3, '愛上韓風居家?創意混搭的美學體驗', '瘋設計', 'MX-2310U_20150113_175450_001.jpg', 1, 0, '', '<p>愛上韓風居家?創意混搭的美學體驗</p>', 'http://www.books.com.tw/exep/prod/magazine/mag_retail.php?item=R030045955', 0, '2015-01-13 17:45:30', '2016-06-13 00:00:00', 0, '2015-02-09 00:00:00', 'MX-2310U_20150113_175450_001 (1).jpg', 'AF', '11', '#e3ff9b'),
(17, 0, 'Exhibition/Space Design', '', '', 0, 0, '', '<ul style=\\"margin: 0px; padding-top: 15px; padding-right: 0px; padding-left: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: FuturaBK; vertical-align: baseline; list-style: none; color: rgb(0, 0, 0); line-height: 16px;\\">\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Content Design</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Visual Communication</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Exhibition/Space Design</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Art Direction</li>\r\n</ul>', 'http://ozzie-art.com/dev/projects.php', 1, '2015-02-11 00:00:00', '2015-02-19 00:00:00', 0, '2015-02-07 00:00:00', '', 'KR', '0', '');

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_photo`
--
-- 建立時間: 2015 年 02 月 07 日 17:23
-- 最後更新: 2015 年 02 月 09 日 16:06
-- 最後檢查: 2015 年 02 月 07 日 17:23
--

CREATE TABLE IF NOT EXISTS `ozzie_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `parent` tinyint(4) NOT NULL,
  `dates` datetime NOT NULL,
  `target` tinyint(4) NOT NULL COMMENT '1=news,2=events,3=projects',
  `sequ` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `target` (`target`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- 轉存資料表中的資料 `ozzie_photo`
--

INSERT INTO `ozzie_photo` (`id`, `img`, `parent`, `dates`, `target`, `sequ`) VALUES
(17, '03150_perthsunset_1920x1080 (1).jpg', 18, '2015-02-07 00:00:00', 1, 3),
(16, '03217_towardthesea_1920x1080.jpg', 0, '2015-02-07 00:00:00', 1, 11),
(14, '03211_kapaluasunset_1920x1080.jpg', 13, '2015-02-07 00:00:00', 1, 10),
(15, '03216_skyonfire_1920x1080.jpg', 0, '2015-02-07 00:00:00', 1, 9),
(11, '03150_perthsunset_1920x1080.jpg', 17, '2015-02-07 00:00:00', 1, 12),
(12, '03152_zwergeule_1920x1080.jpg', 17, '2015-02-07 00:00:00', 1, 13),
(13, '03154_steelsea_1920x1080.jpg', 17, '2015-02-07 00:00:00', 1, 14),
(18, '03144_albionfalls_1920x1080.jpg', 16, '2015-02-07 00:00:00', 1, 7),
(19, '03149_sunriserequiem_1920x1080.jpg', 13, '2015-02-07 00:00:00', 1, 6),
(20, '03146_intothelight_1920x1080.jpg', 13, '2015-02-07 00:00:00', 1, 5),
(21, '03146_intothelight_1920x1080.jpg', 13, '2015-02-07 00:00:00', 2, 4),
(22, '03149_sunriserequiem_1920x1080 (1).jpg', 13, '2015-02-07 00:00:00', 2, 8),
(23, '1 (6).jpg', 18, '2014-10-02 15:43:46', 3, 2),
(24, '1 (7).jpg', 18, '2014-10-02 15:43:46', 3, 1),
(26, '1 (26).jpg', 4, '2014-10-02 15:43:46', 3, 0),
(27, '1 (27).jpg', 4, '2014-10-02 15:43:46', 3, 0),
(28, '02054_1000ftabovethealps_2560x1600.jpg', 17, '2014-10-02 15:43:46', 3, 0),
(29, '02055_haveaseatenjoytheview_2560x1600.jpg', 17, '2014-10-02 15:43:46', 3, 0),
(30, '1_4e93ffccb8125.jpg', 4, '2015-02-09 00:00:00', 1, 0),
(31, '03252_milkywayoverlakewilliam_2880x1800.jpg', 4, '2015-02-09 00:00:00', 1, 0),
(32, '03139_amadablamwatchesoverthepathtopheriche_1920x1080 (1).jpg', 6, '2015-02-09 00:00:00', 1, 0),
(33, '03220_widerspiritsinyosemite_1920x1080.jpg', 6, '2015-02-09 00:00:00', 1, 0),
(34, '03195_upintheairsunset_1920x1080.jpg', 5, '2015-02-09 00:00:00', 1, 0),
(35, '03196_carinanebula_1920x1080.jpg', 5, '2015-02-09 00:00:00', 1, 0),
(36, '03202_kaanapalishoressunset_1920x1080.jpg', 9, '2015-02-09 00:00:00', 1, 0),
(37, '03203_eastforkfalls_1920x1080.jpg', 9, '2015-02-09 00:00:00', 1, 0),
(38, '03204_topoftherock_1920x1080.jpg', 9, '2015-02-09 00:00:00', 1, 0),
(39, '03215_goodmorningyosemite_1920x1080.jpg', 12, '2015-02-09 00:00:00', 1, 0),
(40, '03216_skyonfire_1920x1080 (1).jpg', 12, '2015-02-09 00:00:00', 1, 0),
(41, '03212_waimeabay_1920x1080.jpg', 15, '2015-02-09 00:00:00', 1, 0),
(42, '02927_altitude_1920x1080.jpg', 4, '2015-02-09 00:00:00', 2, 0),
(43, '02928_endlessvastness_1920x1080.jpg', 4, '2015-02-09 00:00:00', 2, 0),
(44, '02941_adam9straatjes_1920x1080.jpg', 17, '2015-02-09 00:00:00', 2, 0),
(45, '02945_paradiserockii_1920x1080.jpg', 17, '2015-02-09 00:00:00', 2, 0),
(46, '02938_skipperscanyon_1920x1080.jpg', 13, '2014-10-02 15:43:46', 3, 0),
(47, '02939_stairwaytoserenity_1920x1080.jpg', 13, '2014-10-02 15:43:46', 3, 0),
(48, '02973_fjorddream_1920x1080.jpg', 16, '2014-10-02 15:43:46', 3, 0),
(49, '02975_italiansiberia_1920x1080.jpg', 16, '2014-10-02 15:43:46', 3, 0),
(50, '02980_kingoftheskies_1920x1080.jpg', 16, '2014-10-02 15:43:46', 3, 0),
(51, '02965_archonthewater_1920x1080.jpg', 15, '2014-10-02 15:43:46', 3, 0),
(52, '02966_pugetsoundatdusk_1920x1080.jpg', 15, '2014-10-02 15:43:46', 3, 0),
(53, 'Waterville, Vermont.jpg', 0, '2015-02-09 00:00:00', 2, 0),
(54, 'Wedge Pond, Alberta, Canada.jpg', 0, '2015-02-09 00:00:00', 2, 0),
(55, 'Zakinthos, Ionian Islands, Greece.jpg', 0, '2015-02-09 00:00:00', 2, 0),
(56, 'Zao National Park, Yamagata Prefecture, Japan.jpg', 0, '2015-02-09 00:00:00', 2, 0),
(57, 'Wheeler Crest, Eastern Sierra, California.jpg', 19, '2015-02-09 00:00:00', 2, 0),
(58, 'Waterville, Vermont (1).jpg', 18, '2015-02-09 00:00:00', 2, 0),
(59, 'Wedge Pond, Alberta, Canada (1).jpg', 18, '2015-02-09 00:00:00', 2, 0);

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_projects`
--
-- 建立時間: 2015 年 02 月 09 日 11:06
-- 最後更新: 2015 年 02 月 09 日 16:02
--

CREATE TABLE IF NOT EXISTS `ozzie_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog` varchar(255) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `img` tinytext NOT NULL,
  `isnew` tinyint(4) NOT NULL,
  `islink` tinyint(4) NOT NULL,
  `link` tinytext NOT NULL,
  `content` text NOT NULL,
  `morelink` tinytext NOT NULL,
  `link_blank` tinyint(1) NOT NULL DEFAULT '0',
  `sdates` datetime NOT NULL,
  `edates` datetime NOT NULL,
  `sequ` tinyint(4) NOT NULL,
  `dates` datetime NOT NULL,
  `img1` tinytext NOT NULL,
  `location` varchar(255) NOT NULL,
  `brick_size` varchar(2) NOT NULL DEFAULT '0',
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sdates` (`sdates`,`edates`),
  KEY `catalog` (`catalog`),
  KEY `sequ` (`sequ`),
  KEY `dates` (`dates`),
  FULLTEXT KEY `catalog_2` (`catalog`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 轉存資料表中的資料 `ozzie_projects`
--

INSERT INTO `ozzie_projects` (`id`, `catalog`, `title`, `subtitle`, `img`, `isnew`, `islink`, `link`, `content`, `morelink`, `link_blank`, `sdates`, `edates`, `sequ`, `dates`, `img1`, `location`, `brick_size`, `color`) VALUES
(4, 'a:1:{i:0;s:2:"11";}', '帆布鞋的文藝復興', '設計家 Searchome報導', '1 (106).jpg', 1, 0, '', '<p>本案為地段好、格局採光也一流的新成屋，而它的擁有者；是位有主見且事業成功的傑出女性，有鑑於屋主對於新宅的高度期待，星葉設計 執行長林峰安和 總監廖毓卿在接手後，特別用心去聆聽、揣摩使用端的喜好與需求，運用細膩的格局微調，打造流暢的生活動線與轉折皆美的大器景深，其中包括公私領域多處連續面的經營、空間性格的塑造以及軟硬體高質感的呈現，處處都有令人驚艷的設計亮點。</p>', 'http://www.searchome.net/article.aspx?id=25518', 0, '2014-10-07 00:00:00', '2015-04-25 00:00:00', 6, '2014-10-02 15:43:46', '9-20140719SL09C41 (2).jpg', '', '21', '#ffd5b9'),
(18, 'a:3:{i:0;s:2:"13";i:1;s:2:"12";i:2;s:1:"5";}', '時尚廣告中最能展現生命美的不老女神', '', '01885_halfmoonbaysunset_2560x1600.jpg', 0, 0, '', '<p><span style=\\"color: rgb(0, 0, 0); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; line-height: 22.2857151031494px;\\">我想先從我的名字介紹起好了，我的中文名字音譯會叫做波夏，是來自於「Port Charlotte」。Port Charlotte 其實是艾雷島上一個村莊的名字，這個村莊建立於 1828 年，自那時起這村落就住著不少釀酒人，但隨著歷史的轉變，1929 年村內的酒廠關閉，這裡也曾一度陷入無人狀態。可是艾雷島的精神就是如此，能在海風中活下來的，就能在島嶼上復活。到了今天，波夏村莊依然完整保留了當時 的建築風貌。眼看這裡有些房舍轉型成為青年旅館，逐步轉變，布萊迪蒸餾廠決定買下 Port Charlotte 歇業已久的舊酒廠。也因為 Port Charlott 距離自己只有兩英里遠，他們更能將艾雷島蒸餾廠的歷史和功能都一併保留。</span></p>', '', 0, '2014-12-01 00:00:00', '2015-08-29 00:00:00', 4, '2014-10-02 15:43:46', '', '', '11', '#DDDDDD'),
(13, 'a:1:{i:0;s:1:"5";}', '小紅豆Angeline．是我的幸福感泉源', '幸福空間', '1 (23).jpg', 1, 1, 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1790', '<p><strong style=\\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; line-height: 24px;\\">&quot;But doesn&#39;t jQuery make it easy to write your own validation plugin?&quot;</strong><br style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\" />\r\n<span style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\">Sure, but there are still a lot of subtleties to take care of: You need a standard library of validation methods (such as emails, URLs, credit card numbers). You need to place error messages in the DOM and show and hide them when appropriate. You want to react to more than just a submit event, like keyup and blur.</span><br style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\" />\r\n<span style=\\"color: rgb(68, 68, 68); font-family: \\''Open Sans\\'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 24px;\\">You may need different ways to specify validation rules according to the server-side enviroment you are using on different projects. And after all, you don&#39;t want to reinvent the wheel, do you?</span></p>', 'http://www.hhh.com.tw/modules/gs/video-play.php?hvideo_id=1790', 0, '2014-10-08 00:00:00', '2015-06-27 00:00:00', 1, '2014-10-02 15:43:46', '7-20140719SL22AC41 (1).jpg', 'SZ', '21', '#9b9eff'),
(15, 'a:2:{i:0;s:2:"13";i:1;s:2:"12";}', '捲髮V.S 直髮 潮女的時尚態度', '幸福空間雜誌', '1 (17).jpg', 1, 0, '', '<p>從事旅遊業的七年級女生，對於生活品味有著過於常人的敏銳嗅覺。星葉室內裝修設<br />\r\n計，平衡美感與機能的比例拿捏，以屋主嚮往的經典偶像劇作為基底設定，佐以豐富媒材<br />\r\n的鋪陳刻劃，呈現出人文時尚的空間氣質，重新詮釋開敞格局的視界關係。</p>', 'http://www.books.com.tw/exep/prod/magazine/mag_retail.php?item=R030045955', 0, '2015-01-13 11:26:40', '2015-05-14 11:26:40', 5, '2014-10-02 15:43:46', 'MX-2310U_20150113_112644_001 (1).jpg', '', '22', '#ffd7ea'),
(16, 'a:1:{i:0;s:1:"8";}', 'H&M瑞典總部探秘', '瘋設計', '1 (33).jpg', 1, 0, '', '<p>愛上韓風居家?創意混搭的美學體驗</p>', 'http://www.books.com.tw/exep/prod/magazine/mag_retail.php?item=R030045955', 0, '2015-01-13 17:45:30', '2015-06-13 17:45:30', 3, '2014-10-02 15:43:46', 'MX-2310U_20150113_175450_001 (1).jpg', '', '12', '#DDDDDD'),
(17, 'a:2:{i:0;s:1:"5";i:1;s:1:"7";}', '王怡人：『就喜歡…優雅的反骨', '', '1 (21).jpg', 0, 0, '', '<ul style=\\"margin: 0px; padding-top: 15px; padding-right: 0px; padding-left: 0px; border: 0px; outline: 0px; font-size: 16px; font-family: FuturaBK; vertical-align: baseline; list-style: none; color: rgb(0, 0, 0); line-height: 16px;\\">\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Content Design</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Visual Communication</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Exhibition/Space Design</li>\r\n	<li style=\\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-size: 13px; font-family: inherit; vertical-align: baseline; line-height: 22px;\\">Art Direction</li>\r\n</ul>', 'http://ozzie-art.com/dev/projects.php', 0, '2015-02-03 00:00:00', '2015-04-30 00:00:00', 2, '2014-10-02 15:43:46', '', 'KR', '22', '#DDDDDD');

-- --------------------------------------------------------

--
-- 表的結構 `ozzie_site_conf`
--
-- 建立時間: 2015 年 02 月 07 日 16:11
-- 最後更新: 2015 年 02 月 09 日 17:15
--

CREATE TABLE IF NOT EXISTS `ozzie_site_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `pw` varchar(128) NOT NULL,
  `about_en` text NOT NULL,
  `about_zhTW` text NOT NULL,
  `contact` text NOT NULL,
  `organization` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `ozzie_site_conf`
--

INSERT INTO `ozzie_site_conf` (`id`, `username`, `pw`, `about_en`, `about_zhTW`, `contact`, `organization`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '<div class=\\"text_EN \\">\r\n<p>Ozzie Art Consultants attracted international attention with its new style art curating and its content design, its curatorial work receiving the prestigious German iF Award as well as many other domestic and international awards. We regard &quot;art content&quot; as a commercial unit, cultural institutions and CSR to upgrade transformation and the creation of value. Our target group includes the integration of internationally oriented museums, creative units, foundations, financial institutions, traditional industry, brand charity, Creative City and interdisciplinary industry. Ozzie Art Consultants seeks to combine close and lasting cooperation projects of the most progressive work teams in different fields, with the purpose of attaining cultural depth and realizing the possibility and a future for the social function of creative art.</p>\r\n\r\n<p>Recent projects include a cooperation with architect Tadao Ando at the Aurora Museum in Shanghai; &quot;1 DayMuseum&quot; which encompasses a contemporary and global curating plan based on a new concept; &quot;Future Education Expo&quot;, Asia&#39;s largest exhibition about education; &quot;Crystal Design Center&quot; in Bangkok, a commercial curatorial plan; &quot;W Hotel&quot; in Taipei; St. Regis Museum Hotel; Los Angeles Art Collection and its exhibition plan; curating and consulting of transformation upgrading in different fields of industry both in and outside Taiwan.</p>\r\n</div>\r\n\r\n<div class=\\"text_EN \\">\r\n<p>Ozzie Art Consultants Group, led by Su Yang-Chih, aims at efficient &quot;cultural output&quot; through art content and design, and strives for integration and recreation by means of gathering knowledge within the concept of the World City. Our work often includes the management of internationally oriented projects and plans on different scales with various degrees of difficulty. We often design an overall planning for a museum, design of content, artistic/commercial curating, design of an exhibition, cultural and creative planning and execution, brand planning, visual communication, artistic management and planning of art education.</p>\r\n\r\n<p>Ozzie Art Consultants firmly believe that following the evolution of time, the industry should be ready to face future changes with high level cultural input and commercial sensitivity. Through topography of contemporary art and culture we are able to achieve an integration of content and creativity, as well as a thorough understanding as to our customer&#39;s needs, to create a maximum value for our customer or our partner; many times our period of cooperation was extended, and the effect of our work often lasts much longer than expected and can be applied in a more extensive way.</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>', '<div class=\\"text\\">\r\n                            <p> 奧茲藝術顧問是以新形態的藝術策展與內容設計受到國際矚目，策展作品獲得德國IF Award設計大獎等許多國內外獎項的肯定。我們專注於以\\"藝術內容\\"為商業單位， 文化機構以及社會企業(CSR)作提升轉型以及價值的創造。我們的服務對象包含國際性之博物館，藝文單位，基金會，金融機構，傳統產業，品牌公益以及創意城市的跨領域產業的整合等。奧茲藝術顧問結合各個領域最先進的工作團隊持續緊密合作，目的在探索文化創意的內容深度以及創造藝術社會功能的可能性與未來性。 </p>\r\n                            <p> 近期作品包含與建築大師安藤忠雄合作策劃的上海震旦博物館，新觀念的全球性當代策展計畫\\"一日美術館\\"，亞洲最大之教育內容策展\\"Future Education Expo/未來教育展\\"，曼谷Crystal Design Center的商業策展規劃，W hotel台北, St.Regis Museum hotel/洛杉磯的藝術品收藏與展示規劃，以及國內外不同領域之產業的提升轉型策略及顧問。 </p>\r\n                        </div>\r\n                        <div class=\\"text\\">\r\n                            <p> 奧茲藝術顧問團隊由蘇仰志領軍，旨在透過藝術內容與設計作有效的&quot;文化產出&quot;，企圖在世界城市（World City/Mega city)概念下透過知識聚集作整合與再創造。我們的工作常在本地與國際間處理不同規模與複雜度的項目與計劃。工作內容多為博物館整體規劃，內容設計，藝術/商業策展，展覽設計，文化創意策劃執行， 品牌規劃與視覺溝通，藝術經紀以及藝術教育規劃等整體性規劃。<br>\r\n                                <br>\r\n                                奧茲藝術顧問深信，隨著時代的演進，產業必須要有著面對未來的變化具備文化高度與商業靈敏度; 透過當代藝術文化地誌學(Topography)作內容的整合與創造，以及針對客戶需求的深刻的理解與清晰的對話，創造客戶/合作夥伴的最大化價值，每一次的經驗都延續着長期合作關係，而我們的作品往往都起到超乎預期的成效以及更廣泛地策略作用。<br>\r\n                            </p>\r\n                        </div>', '<div class=\\"info_a\\">\r\n<p>Ozzie Art Consultants Corp.</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div class=\\"info_a\\">\r\n<p>奧茲藝術顧問有限公司</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div style=\\"clear: both;\\">&nbsp;</div>\r\n\r\n<div class=\\"info_a\\">\r\n<p>25F., No.159, Songde Rd., Xinyi Dist.<br />\r\nTaipei City 110, Taiwan</p>\r\n\r\n<p>台北市信義區松德路159號25樓</p>\r\n</div>\r\n\r\n<div class=\\"info_a\\">\r\n<p>T. &nbsp;02-2346-7122<br />\r\nF. &nbsp;02-2346-7133</p>\r\n\r\n<p><a href=\\"mailto:ozziesu.art@gmail.com\\">ozziesu.art@gmail.com</a></p>\r\n</div>\r\n\r\n<div class=\\"info_a\\">\r\n<p><img src=\\"images/fb.svg\\" /> <a href=\\"#\\">Visit us on Facebook</a></p>\r\n\r\n<p><img src=\\"images/Weibo.svg\\" /> <a href=\\"#\\">Visit us on Weibo</a></p>\r\n</div>\r\n\r\n<div style=\\"clear: both;\\">&nbsp;</div>', '<div class=\\"group\\">\r\n                        <h1 class=\\"g_1\\"><a href=\\"#\\">奧茲藝術顧問</a></h1>\r\n                        <h3>Ozzie Art<br>\r\n                            Consultants</h3>\r\n                        <p>\r\n                            Curating<br>\r\n                            Content Design<br>\r\n                            Visual Communication<br>\r\n                            Exhibition/Space Design<br>\r\n                            Art Direction\r\n                        </p>\r\n                        <h3>奧茲藝術顧問</h3>\r\n                    </div>\r\n\r\n                    <div class=\\"group\\">\r\n                        <h1 class=\\"g_2\\"><a href=\\"#\\">氛圍空間設計</a></h1>\r\n                        <h3>Ambience Atmosphere<br>\r\n                            Architecture &amp; Interior Design</h3>\r\n                        <p>\r\n                            Alternative Space Design<br>\r\n                            Arch/Interior Construction<br>\r\n                            Development of Land<br>\r\n                            Cultural Projects Planning\r\n                        </p>\r\n                        <h3>氛圍空間設計</h3>\r\n                    </div>\r\n\r\n                    <div class=\\"group\\">\r\n                        <h1 class=\\"g_3\\"><a href=\\"#\\">人內教育</a></h1>\r\n                        <h3>Learnext<br>\r\n                            Education Corp., </h3>\r\n                        <p>\r\n                            Education Institutes<br>\r\n                            Education Strategy Franchising<br>\r\n                            Education Curation<br>\r\n                            Alternative Education Projects.\r\n                        </p>\r\n                        <h3>人內教育</h3>\r\n                    </div>\r\n\r\n                    <div class=\\"group\\">\r\n                        <h1 class=\\"g_4\\"><a href=\\"#\\">一日美術館</a></h1>\r\n                        <h3>1 Day Museum</h3>\r\n                        <p>\r\n                            A future concept of Art Museum<br>\r\n                            a team always doing”upgrade art” mission.\r\n                        </p>\r\n                        <h3>一日美術館</h3>\r\n                    </div>\r\n\r\n                    <div class=\\"group\\">\r\n                        <h1 class=\\"g_5\\"><a href=\\"#\\">未來教育博覽会</a></h1>\r\n                        <h3>FEE<br>\r\n                            Future Education Expo </h3>\r\n                        <p>\r\n                            Free Education fair<br>\r\n                            FEE Talk Forum<br>\r\n                            FEE Foundation<br>\r\n                            FEE new education platform\r\n                        </p>\r\n                        <h3>未來教育博覽会</h3>\r\n                    </div>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
